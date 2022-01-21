<?php

 include_once("./query/db_query.php");

 $database = new DB();
 $table = "products";

//  $data = [
//      "product_name"=>"Wheat",
//      "description" => "I love wheat so much",
//      "product_price" => "100.00"
//  ];

//  if($database->insert($table, $data)){
//      echo "Inserted successfully";
//  }


 $dbData = $database->view($table, ["product_name"=>"wheat"], true, 2, 'created_at');

 var_dump($dbData);



