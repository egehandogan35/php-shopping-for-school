






<?php
// I can apply this method using ajax js script also its working if you wanna test it,
// But I have to use php so I dont apply it.

//this is Script
/* $(document).ready(function() {
$(document).on('click', '.minus_button', function() {
selected = $(this).attr("data-id");
quantity = parseInt($('.quantity[data-id="' + selected + '"]').val());
$('.quantity[data-id="' + selected + '"]').val(quantity - 1);
});

$(document).on('click', '.plus_button', function() {
selected = $(this).attr("data-id");

quantity = parseInt($('.quantity[data-id="' + selected + '"]').val());

$('.quantity[data-id="' + selected + '"]').val(quantity + 1);

});
}); */

// This is for buttons
/* <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
<!--added class="minus_button"-->
<button type="button" class="btn bg-light border rounded-circle minus_button" id="minus_button" data-id="$productid"><i class="fa fa-minus"></i></button>
<!--added class="quantity"-->
<input type="text" value="1" class="form-control w-25 d-inline quantity" id="quantity" data-id="$productid">
<!--added class="plus_button"-->
<button type="button" class=" btn bg-light border rounded-circle plus_button" id="plus_button" data-id="$productid"><i class="fa fa-plus"></i></button>

*/
session_start();

require_once ('php/CreateDb.php');
require_once ('php/component.php');

$db = new CreateDb("Productdb", "Producttb");


if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){

          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}




// trying this method
/*if (isset($_POST['plus_button'])) {
if ($_GET['action'] == 'plus_button') {
foreach ($_SESSION['cart'] as $key => $value){
    if($value["product_price"] == $_GET['product_price']){
        product_id[$key]['id']++;
    }
}

}
}*/
if (isset($_POST['minus_button'])){
    if ($_GET['action'] == 'minus_button'){
        foreach ($_SESSION['cart'] as $key => $value){

            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);

            }
        }
    }
}


//trying this but I think its pointless
/*if (isset($_POST['plus_button'])) {
    if ($_GET['action'] == 'plus_button') {
        if (isset($_SESSION['cart'])){
            $product_id = array_column($_SESSION['cart'], 'product_id');
            $result = $db->getData();
            while ($row = mysqli_fetch_assoc($result)){
        foreach ($product_id as $id){
            if ($row['id'] == $id){
                $product_id[$key]['id']++;
            }
        }


            }
        }
    }
}
*/


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEKNOSA</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body class="bg-light">

<?php
    require_once ('php/header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }


                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
