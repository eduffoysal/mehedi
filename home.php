<?php
    spl_autoload_register(function ($class) {
        include $class . '.php';
        // echo $class;
    }); 
    // print_r($_SERVER);

    $router = new Router();
    $name = '';
    $router->get('/edu_mehedi/id/:id',function($params){
        echo $params['id'];
    });
    $router->get('/edu_mehedi/id/:id/:me',function($params){
        echo $params['me'];
    });
    echo $name;
    // $router->get('/edu/id/:id/:me',function($params){
    //     echo $params['me'];
    // });

    $router->get('/edu_mehedi/profile/:phone',function($params){
        echo $params['phone'];
    });

    $router->listen();

?>