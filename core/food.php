<?php

class Food{
    //information about database
        private $conn;
        private $table = 'tbl_food';

    //food properties
        public $id;
        public $title;
        public $description;
        public $price;
        public $image_name;
        public $category_id;
        public $featured;
        public $active;

    
     //contructor with db connectiion 
        public function __construct($db){
            $this ->conn = $db;
        }
    
    //function for geting all food from db
        public function getAllFood()
        {
            //create query
                $query = "SELECT * FROM {$this->table}";

            //prepare statement
                $stmt = $this->conn->prepare($query);

            //execute the query
                $stmt->execute();
                
            return $stmt;
        }

    //function for get one food from db by id
        public function getSingleFood()
        {
            //create query
                $query = "SELECT * FROM {$this->table} WHERE id=?";

            //prepare statement
                $stmt = $this->conn->prepare($query);

            //bindding param
                $stmt->bindParam(1,$this->id);

            //execute the query
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->title = $row['title'];
            $this->description = $row['description'];
            $this->price = $row['price'];
            $this->image_name = $row['image_name'];
            $this->category_id = $row['category_id'];
            $this->featured = $row['featured'];
            $this->active = $row['active'];

        }

    //function for insert new food in db
        public function insertFood()
        {
            //create query
                $query = "INSERT INTO {$this->table} 
                            SET
                                title = :title,
                                description = :description,
                                price = :price,
                                image_name = :image_name,
                                category_id = :category_id,
                                featured = :featured,
                                active = :active
                         "; 

            //prepare statement 
                $stmt = $this->conn->prepare($query);

            //clean data
                $this->title       = htmlspecialchars(strip_tags($this->title));
                $this->description = htmlspecialchars(strip_tags($this->description));
                $this->price       = htmlspecialchars(strip_tags($this->price));
                $this->image_name  = htmlspecialchars(strip_tags($this->image_name));
                $this->category_id = htmlspecialchars(strip_tags($this->category_id));
                $this->featured    = htmlspecialchars(strip_tags($this->featured));
                $this->active      = htmlspecialchars(strip_tags($this->active));

            //biding param
                $stmt ->bindParam(':title',$this->title);
                $stmt ->bindParam(':description',$this->description);
                $stmt ->bindParam(':price',$this->price);
                $stmt ->bindParam(':image_name',$this->image_name);
                $stmt ->bindParam(':category_id',$this->category_id);
                $stmt ->bindParam(':featured',$this->featured);
                $stmt ->bindParam(':active',$this->active);
           

            //execute query
                if($stmt->execute())
                {
                    return true;
                }

            //print error somethings goes wrong
                printf('Error %s.\n',$stmt->error);
                return false;

        }

    //function for update food from db by id
        public function updateFood()
        {
            //create query
                $query = "UPDATE {$this->table} 
                            SET
                                title = :title,
                                description = :description,
                                price = :price,
                                image_name = :image_name,
                                category_id = :category_id,
                                featured = :featured,
                                active = :active
                            WHERE 
                                id=:id
                         "; 

            //prepare statement 
                $stmt = $this->conn->prepare($query);

            //clean data
                $this->title       = htmlspecialchars(strip_tags($this->title));
                $this->description = htmlspecialchars(strip_tags($this->description));
                $this->price       = htmlspecialchars(strip_tags($this->price));
                $this->image_name  = htmlspecialchars(strip_tags($this->image_name));
                $this->category_id = htmlspecialchars(strip_tags($this->category_id));
                $this->featured    = htmlspecialchars(strip_tags($this->featured));
                $this->active      = htmlspecialchars(strip_tags($this->active));

            //biding param
                $stmt ->bindParam(':id',$this->id);
                $stmt ->bindParam(':title',$this->title);
                $stmt ->bindParam(':description',$this->description);
                $stmt ->bindParam(':price',$this->price);
                $stmt ->bindParam(':image_name',$this->image_name);
                $stmt ->bindParam(':category_id',$this->category_id);
                $stmt ->bindParam(':featured',$this->featured);
                $stmt ->bindParam(':active',$this->active);
           

            //execute query
                if($stmt->execute())
                {
                    return true;
                }

            //print error somethings goes wrong
                printf('Error %s.\n',$stmt->error);
                return false;

        }
    
    //function for delete food from db by id
        public function deleteFood()
        {
            
            //create query
                $query = "DELETE FROM $this->table WHERE id=?";

            //prepare statement
                $stmt = $this->conn->prepare($query);

            //bindding param
                $stmt->bindParam(1,$this->id);

            //execute the query
                if($stmt->execute())
                {
                    return true;
                }

            //print error somethings goes wrong
                printf('Error %s.\n',$stmt->error);
                return false;
        }
    
}


?>