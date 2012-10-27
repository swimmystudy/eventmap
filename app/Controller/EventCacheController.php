<?php

App::uses('AppController', 'Controller');
App::uses('Atnd', 'Model');
App::uses('Tweet', 'Model');
App::uses('Connpass', 'Model');
App::uses('HttpSocket', 'Network/Http');

/**
 * EventCache Controller
 *
 *
 */
class EventCacheController extends AppController {
    
    public $uses = array('Atnd', 'Connpass', 'EventCache');
    
    public $events_target = array(
        'Atnd' => 'http://api.atnd.org/events/',
        'Connpass' => 'http://connpass.com/api/v1/event/',
        'Zusaar' => 'http://www.zusaar.com/api/event/'
    );
    
    public function get() {
        $result = $this->EventCache->custom_find($this->request->query);
        
        pr("ヒット　：　" . count($result));
        foreach ($result as $event) {
            pr('------------------------------');
            pr('イベントID : ' . $event['EventCache']['event_id']);
            pr('タイトル : ' . $event['EventCache']['title']);
            pr('URL : ' . $event['EventCache']['event_url']);
            pr('場所 : ' . $event['EventCache']['place']);
            //pr('内容' . $event['EventCache']['description']);
            pr('登録サイト : ' . $event['EventCache']['service_provider']);
            pr('開始 : ' . $event['EventCache']['started_at']);
            pr('終了 : ' . $event['EventCache']['ended_at']);
        }
        
        return new CakeResponse(array('body' => true));
    }

    public function update() {
        foreach($this->events_target as $sp => $url){
            $this->EventCache->update($sp, $url);
        }
        
        // 過去のイベント情報も保持しておく
        //$this->EventCache->delete_old_cache();
        
        return new CakeResponse(array('body' => true));
    }
    
}
