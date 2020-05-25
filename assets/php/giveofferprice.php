<?php
session_start();
    include('config.php');

if($_POST["action"] == "giveOfferPrice") {
    $phone = $_POST['phone'];
    $surname = $_POST['surname'];
    $price = $_POST['price'];
    $vehicle_id = $_POST['id'];
    $sql="INSERT INTO  tblgiveofferprice(phone,surname,price, vehicle_id) VALUES(:phone, :surname, :price, :vehicle_id)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->bindParam(':surname',$surname,PDO::PARAM_STR);
    $query->bindParam(':price',$price,PDO::PARAM_STR);
    $query->bindParam(':vehicle_id',$vehicle_id,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId){
        exit("We will call you as soon as possible");
    }
    else {
        exit("Sorry Please try again");
    }
} else {
   exit(error_log("error"));
}