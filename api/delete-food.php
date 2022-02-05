<?php
    
    //headers 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


    //initializing  our  api
        include_once('../core/initialize.php');

    //instantiante post
        $food = new Food($db);

    //get id 
        $food->id = isset($_GET['id']) ? $_GET['id'] : die();

    //delete food 
        if($food->deleteFood())
        {
            echo json_encode(array('message'=>'Food successfully deleted.'));
        }else
        {
            echo json_encode(array('message'=>'Erro:Food does not deleted.'));
        }
?>