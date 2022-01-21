<?php

 include_once("./query/db_query.php");

 
 $database = new DB();
 $table = "products";

 if(!empty($database->view($table, []))){
     readData();     
 }else{
     echo "<h3> Program will run shortly </h3>";
     __init__();

 }


 function __init__(){
    $database = new DB();
    $table = "products";

     $input =  ["product_name"=>"wheat", "description"=>"i love wheat", "product_price"=>"100.00"];
     if($database->insert($table, $input)){
         echo "<h3> Single Record inserted</h3>";
     }  
 }


 function readData(){

    $database = new DB();
    $table = "products";

    $data = $database->view($table, ['product_name'=>'wheat'], true, 10, 'created_at');

 
    $table = "<table>";
    $table .= "<tr>";
    $table .= " <thead>
                <th>ID</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                </thead>
                </tr>
                ";
    $table .= "<tbody>";
    foreach($data as $key=>$value){
        $table .="<tr>";
        $table .="<td>".$value['id']."<td/>";
        $table .="<td>".$value['product_name']."<td/>";
        $table .="<td>".$value['description']."<td/>";
        $table .="<td>".$value['product_price']."<td/>";
        $table .="<tr/>";
        
    }

    $table .= "</tbody>";
      

    echo $table;

 }





?>


