<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Categories</a>
                    </li>
                    <li>
                        <a href="#">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

<div class="main-content">
    <div class="wrapper">
        <h1>Manage-Food</h1>

        <br/><br/>

        <br/><br/>

<!-- button to add admin -->

<a href="#" class="btn-primary">Add Food</a>

<br/><br/><br/><br/>

<table class="tbl-full">
            <tr>
                   <th>Number</th>
                   <th>Title</th>
                   <th>Description</th>
                   <th>Price</th>
                   <th>Image</th>
                   <th>Category</th>
                   <th>Featured</th>
                   <th>Active</th>
                   <th>Actions</th>
            </tr>

            
            <?php 
                include_once('request-to-api.php');

                     if($response->data>0)
                     {
                            $sn = 1;

                            foreach($response->data as $row)
                            {
                                  // $id = $row->id;
                                   $title = $row->title;
                                   $description = $row->description;
                                   $price = $row->price;
                                   $image_name = $row->image_name;
                                   $category_id = $row->category_id;
                                   $featured = $row->featured;
                                   $active = $row->active;

              ?>

                            <tr>
                                   <td><?php echo $sn++; ?></td>
                                   <td><?php echo $title;?></td>
                                   <td><div style="max-width:120px;"><?php echo $description; ?></div></td>
                                   <td><?php echo $price . " $"; ?></td>
                                   <td>
                                          <?php
                                                 if($image_name != "")
                                                 {
                                           ?>
                                                        <img src="images/food/<?php echo $image_name; ?>" alt="" width="100px">
                                          <?php
                                                 }
                                                 else
                                                 {
                                                        echo "<div class='error'>Image not added.</div>";
                                                 }
                                          ?>
                                   </td>
                                   <td> <?php echo $category_id; ?></td>
                                   <td><?php echo $featured; ?></td>
                                   <td><?php echo $active; ?></td>
                                   <td>
                                          <a href="" class="btn-seccondary">Update Food</a>
                                          <a href="" class="btn-danger">Delete Food</a>
                                   </td>
                            </tr>

              <?php

                            }
                     }
                     else
                     {
              ?>
                            <tr>
                                   <td colspan='9'>
                                          <div class="error">No food addes.</div>
                                   </td>
                            </tr>
               <?php
                     }
        
            ?>



     </table>


    </div>
        </div>
    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Sakib Korenic</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>
