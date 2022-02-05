<?php

//headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

//initializing  our  api
include_once('../core/initialize.php');


    //instantiante post
    $food = new Food($db);

    //get id
        $food->id = isset($_GET['id']) ? $_GET['id'] : die();

    //blog post query
        $result = $food->getSingleFood();

        
        $food_arr = array(
                'title' => $food->title,
                'description' => $food->description,
                'price' => $food->price,
                'image_name' => $food->image_name,
                'category_id' => $food->category_id,
                'featured' => $food->featured,
                'active' => $food->active 
            );
            
    //convert to json and output
        echo json_encode($food_arr);
        

    

?>