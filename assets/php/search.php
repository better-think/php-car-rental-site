<?php
session_start();
include('config.php');
if($_POST["action"] == "search") {
  $sql="SELECT * FROM tblvehicles 
    WHERE transmission = '$_POST[transmission]' AND 
    make = '$_POST[make]' AND model = '$_POST[model]' AND 
    ModelYear = '$_POST[year]' AND mileage = '$_POST[mileage]' AND 
    FuelType = '$_POST[fueltype]' AND price >= '$_POST[price_to]' and
    price <= '$_POST[price_up]'";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  exit (json_encode($results));
}
exit();
