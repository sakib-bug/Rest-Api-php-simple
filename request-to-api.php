<?php
    // API URL
        $url = 'localhost/food-order-phprestapi/api/get-all-food.php';

        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        
        $foods = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        
        $response = json_decode($foods);
?>	