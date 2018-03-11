<?php

$resp = ['err' => true];

    // read the raw post data 
    $post_data= file_get_contents("php://input");
    $data = Json_decode($post_data);
    
    $email = "sakthi@gmail.com";
    $password = "abc123";
    $age="25";
    
    if($email == $data->email && $password == $data->password){

        $resp['err'] = false;

    }else{
        $resp['msg'] = 'invalid username/password';
    }

    echo json_encode($resp);


?>