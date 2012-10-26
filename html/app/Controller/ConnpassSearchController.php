<?php

class ConnpassSearchController extends AppController {
    
    public $uses = array("Connpass");
    
    public function index() {
        if($this->request->is("Ajax")) {
            $keyword = $this->request->data["keyword"];
        } else {
            $keyword = "ruby";
        }
        
        $conditions = array('conditions' => array(
            'keyword' => $keyword,
            'count' => 100
        ));
        $connpass = $this->Connpass->find('all', $conditions);
        
        //var_dump(json_decode($connpass['Connpass']['body']));
        return new CakeResponse(array('body' => $connpass['Connpass']['body']));
    }
    
}
