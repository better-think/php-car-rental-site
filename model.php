<?php 
include('includes/config.php');
if($_POST["action"] == "getYear") {
  $sql="SELECT id, make FROM `tblvehicles` where ModelYear = $_POST[year]";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  exit (json_encode($results));
}
if($_POST["action"] == "getMake") {
  $sql="SELECT id, model FROM `tblvehicles` where ModelYear = $_POST[year] and make = '$_POST[make]'";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  exit (json_encode($results));
}
if($_POST["action"] == "getTrim") {
  $sql="SELECT * FROM `tblvehicles` where ModelYear = $_POST[year] and make = '$_POST[make]' 
        and model = '$_POST[model]' and id = $_POST[trim]";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  exit (json_encode($results));
}
if($_POST["action"] == "getModel") {
  $sql="SELECT id,VehiclesTitle FROM `tblvehicles` where ModelYear = $_POST[year] and make = '$_POST[make]' and model = '$_POST[model]'";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  exit (json_encode($results));
}
if($_POST["action"] == "getMakesByYearId") {
  $sql="SELECT id, name FROM `tblbrands` ORDER BY name ASC";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  exit(json_encode($results));
}
if($_POST["action"] == "getModelsByMakeId") {
  $sql="SELECT id, name FROM `tblmodel` ORDER BY name ASC";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  exit(json_encode($results));
}
if($_POST["action"] == "getTrimsForAccesories") {
  $sql="SELECT id, name FROM `tblmodel` ORDER BY name ASC";
  // $sql="SELECT id, name FROM `tbltrims` ORDER BY name ASC";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  exit(json_encode($results));
}

exit ("{error: 'error'}");