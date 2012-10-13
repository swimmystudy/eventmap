<?php
App::uses('HttpSocket', 'Network/Http');

class AtndSource extends DataSource {


    public $format = 'json';


/**
 * [$params description]
 * @link http://api.atnd.org/#events-url
 * @var array
 */
    public $params = array(
        'event_id',
        'keyword',
        'keyword_or',
        'ym',
        'ymd',
        'user_id',
        'nickname',
        'twitter_id',
        'owner_id',
        'owner_nickname',
        'owner_twitter_id',
        'start',
        'count',
        'format',
    );
/**
 * [$user_params description]
 * @link http://api.atnd.org/#users
 * @var array
 */
    public $user_params = array(
        'event_id',
        'user_id',
        'nickname',
        'twitter_id',
        'owner_id',
        'owner_nickname',
        'owner_twitter_id',
        'start',
        'count',
        'format',
    );
/**
 * Create our HttpSocket and handle any config tweaks.
 */
    public function __construct($config) {
        parent::__construct($config);
        $this->Http = new HttpSocket();
    }

/**
 * Since datasources normally connect to a database there are a few things
 * we must change to get them to work without a database.
 */

/**
 * listSources() is for caching. You'll likely want to implement caching in
 * your own way with a custom datasource. So just ``return null``.
 */
    public function listSources() {
        return null;
    }

/**
 * API用に配列を整形
 * @param  [type] $conditions [description]
 * @return [type]
 */
    public function buildQuery($conditions){
        $return = array();
        //キーワード
        if(isset($conditions['keyword']) && !empty($conditions['keyword'])){
            //複数キーワードをスペースで配列に
            $keyword = urldecode($conditions['keyword']);
            $keyword = mb_convert_kana($keyword,'rns','utf-8');
            $keyword = preg_split("/[\s,]+/",$keyword);
            if($conditions['type']=='or'){
                $return['keyword_or'] = $keyword;
            }
            if($conditions['type']=='and'){
                $return['keyword'] = $keyword;
            }
        }
        //日付
        if(isset($conditions['start_day']) && !empty($conditions['start_day'])){
            $start = $this->prepareDateFormat($conditions['start_day']);
            if($start){
                if(count($start) == 2){
                    $return['ym'][] = $start['y'].$start['m'];
                }
                if(count($start) == 3){
                    $return['ymd'][] = $start['y'].$start['m'].$start['d'];
                }
            }
        }
        //終わりも指定されている
        if(isset($conditions['end_day']) && !empty($conditions['end_day'])){
            $end = $this->prepareDateFormat($conditions['end_day']);
            if($end){
                if(count($end) == 2){
                    $return['ym'][] = $end['y'].$end['m'];
                }
                if(count($end) == 3){
                    $return['ymd'][] = $end['y'].$end['m'].$end['d'];
                }
            }
        }
        if(array_key_exists('format',$conditions)){
            $this->format = $conditions['format'];
        }
        $return['format'] = $this->format;

        //最大値も固定?
        $return['count'] = 10;

        return $return;
    }
/**
 * 日付の処理を整形する
 * @return array('y'=>'','m'=>'','d'=>'') or false
 */
    public function prepareDateFormat($string){
        $tmp = explode('/',$string);
        if(!is_array($tmp)) return false;
        if(count($tmp) == 2){
            return array(
                'y'=>$tmp[0],
                'm'=>$tmp[1],
            );
        }
        if(count($tmp) == 3){
            return array(
                'y'=>$tmp[0],
                'm'=>$tmp[1],
                'd'=>$tmp[2],
            );
        }
    }


/**
 * Implement the R in CRUD. Calls to ``Model::find()`` arrive here.
 */
    public function read(Model $Model, $data = array()) {
        /**
         * Here we do the actual count as instructed by our calculate()
         * method above. We could either check the remote source or some
         * other way to get the record count. Here we'll simply return 1 so
         * ``update()`` and ``delete()`` will assume the record exists.
         */
        if ($data['fields'] == 'COUNT') {
            return array(array(array('count' => 1)));
        }
        /**
         * Now we get, decode and return the remote data.
         */
        // $data['conditions']['apiKey'] = $this->config['apiKey'];

        //パラメーター整形
        $params = $this->buildQuery($data['conditions']);
        $response = $this->Http->get('http://api.atnd.org/events/', $params);
        $body = $response->body();
        if($this->format ==='json'){
            return json_decode($body,true);
        }
        return $body;
    }

}
