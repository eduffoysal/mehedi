<?php
class Router{

    private $SERVER_URIS = [];
    private $SERVER_METHOD = '';

    private $matched = false;
    private $callback;
    private $params = [];

    private $trim = '/\^$';

    function __construct(){
        $URI = trim($_SERVER['REQUEST_URI'],'/\^$');
        $this->SERVER_METHOD = strtolower($_SERVER['REQUEST_METHOD']);
        $this->SERVER_URIS = explode('/',$URI);
        // print_r($this->SERVER_URIS);
    }

    
    function patch($uri, $callback){

        $this->match('patch',$uri,$callback);

    }

    function put($uri, $callback){

        $this->match('put',$uri,$callback);

    }

    function delete($uri, $callback){

        $this->match('delete',$uri,$callback);

    }
    
    function post($uri, $callback){

        $this->match('post',$uri,$callback);

    }
    
    function get($uri, $callback){

        $this->match('get',$uri,$callback);

    }

    function add($method, $uri, $callback){

        $this->match($method,$uri,$callback);

    }

    private function match($method, $uri, $callback) {
        if($this->matched){
            return;
        }
        if(strtolower($method) != $this->SERVER_METHOD){
            return;
        }

        $uri = trim($uri,$this->trim);
        $uris = explode('/',$uri);

        // print_r($uris);

        if(count($uris) != count($this->SERVER_URIS)){
            return;
        }

        $matched = true;
        for($i=0; $i<count($uris); $i++){
            if($uris[$i] == $this->SERVER_URIS[$i]){
                continue;
            }
            if($uris[$i][0]==':'){
                $this->params[substr($uris[$i],1)] = $this->SERVER_URIS[$i];
                continue;
            }
            $matched = false;
            break;
        }

        if($matched){
            $this->matched = true;
            $this->callback = $callback;
        }
    }

    function listen(){
        if(!$this->matched){
            echo "404 Error";
            // print_r($this->SERVER_URIS);
            return;
        }
        // print_r($this->params);
        call_user_func($this->callback,$this->params);
    }

}

?>