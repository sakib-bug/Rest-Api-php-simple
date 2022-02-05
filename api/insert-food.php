<?php

    //headers 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


    //initializing  our  api
        include_once('../core/initialize.php');

    //instantiante food
        $food = new Food($db);

    //Get raw posted data
        $data = json_decode(file_get_contents("php://input"));

        $food->title       = $data->title;
        $food->description = $data->description;
        $food->price       = $data->price;
        $food->image_name  = $data->image_name;
        $food->category_id = $data->category_id;
        $food->featured    = $data->featured;
        $food->active      = $data->active;

    //create food
            
        if($food->insertFood())
        {
            echo json_encode(array('message'=>'Food created'));
        }else{
            echo json_encode(array('message'=>'Food not be created.'));
        }
?>
