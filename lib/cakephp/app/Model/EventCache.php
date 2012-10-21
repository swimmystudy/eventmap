<?php
App::uses('AppModel', 'Model');

class EventCache extends Model {
    public $useTable = 'event_cache';
    
    public function custom_find($request = null) {
        //{ ["keyword"]=>"aaaa" ["type"]=>"or" ["start_day"]=>"2012/10/01" ["end_day"]=>"2012/11/01" }
        
        $sql = 'SELECT * FROM event_cache as EventCache ';
        
        if(isset($request['keyword']) && !empty($request['keyword'])){
            $keyword = urldecode($request['keyword']);
            $keyword = mb_convert_kana($keyword, 'rns','utf-8');
            $keyword = preg_split("/[\s,]+/", $keyword);
            foreach($keyword as $i => $k){
                $or = "(title like '%$k%' OR description like '%$k%' OR " .
                      "place like '%$k%' OR service_provider like '%$k%') ";
                if($i > 0){
                    $sql = $sql . " AND $or";
                } else {
                    $sql = $sql . " WHERE $or ";
                }
            }
        }
        if(isset($request['start_day']) && !empty($request['start_day'])){
            $start_day = $request['start_day'];
            if(preg_match('/WHERE/', $sql, $matches)){
                $sql = $sql . " AND started_at > '$start_day' ";
            } else {
                $sql = $sql . " WHERE started_at > '$start_day' ";
            }
        }
        if(isset($request['end_day']) && !empty($request['end_day'])){
            $end_day = $request['end_day'];
            if(preg_match('/WHERE/', $sql, $matches)){
                $sql = $sql . " AND started_at < '$end_day' ";
            } else {
                $sql = $sql . " WHERE started_at < '$end_day' ";
            }
        }
        
        $sql = $sql . ' ORDER BY started_at ;';
        
        
//        $options = array('order' => 'started_at');
//        $conditions = array('conditions' => array(
//            'OR' => array(
//                'title like' => "%$keyword%",
//                'description like' => "%$keyword%",
//                'place like' => "%$keyword%",
//                'service_provider like' => "%$keyword%"
//            ),
//            'started_at >' => $start_day,
//            'started_at <' => $end_day
//        ));
//        $options = array_merge($options, $conditions);
        
        return $this->query($sql);
        //return $this->EventCache->find('all', $options);
    }


    public function update($sp, $url, $term = 4) {
        if($term == 0){return true;}
        $events = $this->get_events($url, $term);
        foreach ($events as $event){
            $result = $this->find('first', array('conditions' => array(
                    'event_id' => $event['event_id'],
                    'service_provider' => $sp
                    )));
            if($result){
                $this->id = $result['EventCache']['id'];
            } else {
                $event['service_provider'] = $sp;
            }
            $this->save(array('EventCache' => $event));
            $this->create();
        }
        return true;
    }
    
    public function delete_old_cache($previous_to = 1) {
        $delete_at = date("Y-m-d", strtotime("-$previous_to month"));
        $conditions = array('ended_at <' => $delete_at);
        $this->deleteAll($conditions);
        
        // TODO サイトから削除されたイベントをデータベースから削除する作業が必要か検討
        
        return true;
    }

    private function get_events($target, $term) {
        $this->Http = new HttpSocket();
        $now_month = date('Ym');
        $params = "format=json&ym=$now_month";
        for ($i = 1; $i < $term; $i++) {
            $ym = date("Ym", strtotime("$now_month +$i month"));
            $params = $params . ",$ym";
        }
        $params = $params . "&count=100";
        
        $events = array();
        while(true){
            $result = $this->request_sp($params, $target);
            if(isset($result['events'])){
                $events = array_merge($events, $result['events']);
            } elseif($result['event']) {
                $events = array_merge($events, $result['event']);
            }
            if ($result['results_returned'] == 100) {
                $matches = null;
                if (preg_match('/start=([0-9])/', $params, $matches)) {
                    $start = $matches[1] + 100;
                    $params = preg_replace('/start=([0-9])/', "start=$start", $params);
                } else {
                    $params = $params . '&start=101';
                }
            } else {
                break;
            }
        }
        
        return $events;
    }
    
    private function request_sp($params, $target) {
        $response = $this->Http->get("$target?", $params);
        $body = $response->body();
        return json_decode($body, true);
    }
    
}
