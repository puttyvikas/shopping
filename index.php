<!DOCTYPE html>
<html>
<?php require 'connect.php'; 
ob_start();
session_start();
?>
<head>
        <title>Shopping</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/myjs.js"></script>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
        <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
        <script type="text/javascript" src="http://arrow.scrolltotop.com/arrow6.js"></script>
        
</head>
<?php
$query2 = "SELECT id_card FROM cart";
$query_run2 = mysql_query($query2);
$cart_total = mysql_num_rows($query_run2);
?>
<body id="home" data-spy="scroll" data-target=".navbar" data-offset="50">
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
        <li><a href="cart.php" target="_blank">Cart <span class="badge"><?php echo $cart_total ?></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid space_top_btm" style="background-color:white">
<div class="container text-center" style="background-color:#ededed;line-height:40px;font-size:19px">
<h1 class="desc">Description</h1>
  <p>Using this site you can add products and shop. and you can also add your products to cat,
  from there you can chekout. Using this site you can add products and shop. and you can also add your products to cat,
  from there you can chekout. Using this site you can add products and shop. and you can also add your products to cat,
  from there you can chekout. you can see prices from high to low. </p>
</div>
</div>

<div class="design_grid container-fluid text-center" style="padding-top:20px">
  <div class="row text-center gall">
<?php
$root_path = 'images/';
$query = "SELECT product_name,price,profile_pic FROM products ORDER BY price DESC ";
$query_run = mysql_query($query);
$i = -1;
$num_rows = mysql_num_rows($query_run);
if(mysql_num_rows($query_run) >= 1){
  while ($query_row = mysql_fetch_assoc($query_run)) {
    $i++;
     $profile_pic[$i]['profile_pic'] = $query_row['profile_pic'];
     $product_name[$i]['product_name'] = $query_row['product_name'];
     $price[$i]['price'] = $query_row['price'];
     ?>
<div class="col-sm-3">
    <form action="index.php" method="post">
      <div class="thumbnail">
        <img class="fancybox" src=<?php echo $root_path.$profile_pic[$i]['profile_pic'] ;?> alt="Paris" <?php echo "title='".$product_name[$i]['product_name']. "'" ?> width="400" height="300">
        <p><strong><?php echo $product_name[$i]['product_name'] ;?></strong></p>
        <p><?php echo 'Price: '.$price[$i]['price'] ;?></p>
        <input type="text" <?php echo "name='quantity_".$i. "'" ?> value="1" size="2" style="display:none" /><input type="submit" class="btn" value="Add to cart"/>
      </div>
      
      </form>
    </div>


<?php
  }
}
 
?>
<?php
if(isset($_POST['quantity_0']) && (!empty($_POST['quantity_0']))){
 echo $quantity = $_POST['quantity_0'];
 echo $name = $product_name[0]['product_name'];
 echo $prices = $price[0]['price'];
 echo $profile_pics = $profile_pic[0]['profile_pic'];
 $query2 = "INSERT INTO cart (product_name,price,profile_pic,quantity) VALUES('".$name."','".$prices."','".$profile_pics."','".$quantity."') ";
$query_run2 = mysql_query($query2);
header('Location:index.php');
}
if(isset($_POST['quantity_1']) && (!empty($_POST['quantity_1']))){
 echo $quantity = $_POST['quantity_1'];
 echo $name = $product_name[1]['product_name'];
 echo $prices = $price[1]['price'];
 echo $profile_pics = $profile_pic[1]['profile_pic'];
 $query2 = "INSERT INTO cart (product_name,price,profile_pic,quantity) VALUES('".$name."','".$prices."','".$profile_pics."','".$quantity."') ";
$query_run2 = mysql_query($query2);
header('Location:index.php');
}

if(isset($_POST['quantity_2']) && (!empty($_POST['quantity_2']))){
 echo $quantity = $_POST['quantity_2'];
 echo $name = $product_name[2]['product_name'];
 echo $prices = $price[2]['price'];
 echo $profile_pics = $profile_pic[2]['profile_pic'];
 $query2 = "INSERT INTO cart (product_name,price,profile_pic,quantity) VALUES('".$name."','".$prices."','".$profile_pics."','".$quantity."') ";
$query_run2 = mysql_query($query2);
header('Location:index.php');
}
 ?>

    

</div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
 <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
   $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
<script type="text/javascript">
function addcart() {
 var x = document.getElementById("cart_items");
 console.log(x);
  //document.getElementById("cart_items").innerHTML = x+1;
}
</script>
</body>
</html>