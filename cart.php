<!DOCTYPE html>
<html>
<?php require 'connect.php';
ob_start();
session_start();
 ?>
<head>
        <title>Cart</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/myjs.js"></script>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>
<?php
$query2 = "SELECT id_card FROM cart";
$query_run2 = mysql_query($query2);
$cart_total = mysql_num_rows($query_run2);
?>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Shopping</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Cart <span class="badge"><?php echo $cart_total ?></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
 $root_path = 'images/';
$query = "SELECT product_name,price,profile_pic,quantity FROM cart ORDER BY price DESC ";
$query_run = mysql_query($query);
?>
<div class="space_top_btm text-center">
<?php
$i = -1;
if(mysql_num_rows($query_run) >= 1){
  while ($query_row = mysql_fetch_assoc($query_run)) {
    $i++;
     $profile_pic[$i]['profile_pic'] = $query_row['profile_pic'];
     $product_name[$i]['product_name'] = $query_row['product_name'];
     $price[$i]['price'] = $query_row['price'];
     $quantity[$i]['quantity'] = $query_row['quantity'];
?>

                    <div class="col-sm-9 col-md-offset-1" style="background-color:white;margin-bottom:50px;padding:10px">
                    <form action="cart.php" method="post">
                        <div class="thumbnail1" style="padding:10px">
                            <div class="res_img pull-left">
                                <img src=<?php echo $root_path.$profile_pic[$i]['profile_pic'] ?> alt="No image available!!" width="200" height="150">
                            </div>
                            <div <?php //echo "class='details_".$id_restaurant[$i][ 'id_restaurant']. "'" ?>>
                                <div class="pull-right thumbnail rank">
                                    <h1><?php echo 'Rs: '.$price[$i]['price'].'/-'; ?></h1></div>
                                <h3><strong><?php echo $product_name[$i]['product_name'] ;?></strong></h3>
                                <h4><?php echo 'Quantity: '.$quantity[$i]['quantity'] ;?></h4>
                              <input type="text" <?php echo "name='quantity_".$i. "'" ?> style="display:none" value="1" size="1" /><input type="submit" class="btn" value="Remove"/>
                            </div>
                        </div>
                        </form>
                    </div>

<?php
  }
}

?>
<div class="col-md-4 col-md-offset-3" style="background-color:white">
  <?php
  $query2 = "SELECT SUM(price) as total FROM cart ";
  $query_run2 = mysql_query($query2);
  $name = mysql_result($query_run2,0, 'total');
  if($name != "" ){
  echo '<h2>Total Amount: Rs:'.$name.'/- <br><br><button class="btn btn-link" ><a href="checkout.php" style="color:white;background-color:#404043"> CheckOut </a></button></h2>';
}else{
  echo '<h2>Cart is Empty!!<br><br><button class="btn btn-link" ><a href="index.php" style="color:white;background-color:#404043"> Shop Now</a></button></h2>';
}
  ?>
</div>



<?php
if(isset($_POST['quantity_0']) && (!empty($_POST['quantity_0']))){
 $quantity = $_POST['quantity_0'];
 $name = $product_name[0]['product_name'];
 $query2 = "DELETE FROM cart WHERE product_name = '".$name."' ";
$query_run2 = mysql_query($query2);
header('Location:cart.php');
}
if(isset($_POST['quantity_1']) && (!empty($_POST['quantity_1']))){
 $quantity = $_POST['quantity_1'];
 $name = $product_name[1]['product_name'];
 $query2 = "DELETE FROM cart WHERE product_name = '".$name."' ";
$query_run2 = mysql_query($query2);
header('Location:cart.php');
}
if(isset($_POST['quantity_2']) && (!empty($_POST['quantity_2']))){
 $quantity = $_POST['quantity_2'];
 $name = $product_name[2]['product_name'];
 $query2 = "DELETE FROM cart WHERE product_name = '".$name."' ";
 $query_run2 = mysql_query($query2);
 header('Location:cart.php');
}


?>

</div>
</body>
</html>
