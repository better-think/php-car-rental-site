<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Car Rental Portal</title>

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <script src="assets/MDB/js/jquery.min.js"></script>  
    <script src="assets/MDB/js/popper.min.js"></script>
    <script src="assets/MDB/js/bootstrap.min.js"></script>
    <script src="assets/MDB/js/mdb.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="assets/MDB/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/MDB/css/bootstrap.css" rel="stylesheet">
    <link href="assets/MDB/css/mdb.min.css" rel="stylesheet">
    <link href="assets/MDB/css/mdb.css" rel="stylesheet">
    <link href="assets/MDB/css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php include('includes/header.php');?>
        <section class="gray-bg">
            <div class="container">
                <div class="mt-4">
                    <form onSubmit="javascript:saveOfferPrice();">
                        <div class="row">
                            <h2 class="font-weight-bold">Give price offer</h2>
                        </div>
                        <div class="form-group">
                            <label for="name" class="active">Ad Soyad</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="surname" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="active">Telefon</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="price" class="active">Təklifim</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="0000" required>
                        </div>
                        <button class="btn btn-primary btn-md waves-effect waves-light" type="submit" name="submit">
                            GÖNDƏR
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </body>

    <script>
        function saveOfferPrice() {
            var name =   $("#name")[0].value,
            price = $("#price")[0].value, 
            phone = $("#phone")[0].value,
            search = location.search;
            var id = search.split("=")[1];
            $.ajax({
                method: "post",
                url: "assets/php/giveofferprice.php",
                data: `action=giveOfferPrice&surname=${name}&price=${price}&phone=${phone}&id=${id}`,
                success: function (res) {
                    alert(res);
                },
                error: function () {
                    alert(res);
                }
            });
        }
    </script>
</html>
