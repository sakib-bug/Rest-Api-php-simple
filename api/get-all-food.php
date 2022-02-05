<?php

    //headers 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json');

    //initializing  our  api
        include_once('../core/initialize.php');

    //instantiante post
        $food = new Food($db);

    //blog post query
        $result = $food->getAllFood();

    //get the row count
        $num = $result->rowCount();

        if($num > 0)
        {
            $food_arr = array();
            $food_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                extract($row);

                $food_item = array(
                    'title' => $title,
                    'description' => $description,
                    'price' => $price,
                    'image_name' => $image_name,
                    'category_id' => $category_id,
                    'featured' => $featured,
                    'active' => $active
                );

                array_push($food_arr['data'],$food_item);
            }

            //convert to json and output
                echo json_encode($food_arr);

        }else{
            echo json_encode(array('message' => 'No food found.'));
        }

        
?>