
<!doctype html>
<html>
<head>
        <title>Checkout</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
       
</head>
<body style="background-color:white">
<div class="space_top_btm">
        <div class="add_restaurant container" style="background-color:#ededed;padding:20px 0px;border-radius:10px">
            <div class="col-md-4">
    <?php require 'connect.php'; 
$query2 = "SELECT SUM(price) as total FROM cart ";
  $query_run2 = mysql_query($query2);
  $name = mysql_result($query_run2,0, 'total');
 $query2 = "SELECT id_card FROM cart";
$query_run2 = mysql_query($query2);
$cart_total = mysql_num_rows($query_run2);
echo '<h2>Total items in your cart: '.$cart_total.'</h2>';
  echo '<h2>Pay total amount:<br> Rs:'.$name.'/-</h2>';
  
?>
</div>

<div class="col-md-8">
        <h2 style="margin-top:0px" class="text-center">Checkout</h2>
            <fieldset class="the-fieldset">
		<form class="form-horizontal" role="form" action="checkout.php" method="post">
                 <div class="form-group">
                        <label class="control-label col-sm-3" for="res_name">Choose Card</label>
                        <div class="col-sm-6">
                                    <div class="col-sm-9">
            <div  >
                <label >
                    <input type="radio" id="q128" name="quality[21]" value="1" /> State Bank
                </label> 
                <label >
                    <input type="radio" id="q129" name="quality[21]" checked="checked" value="2" /> Axis Bank
                </label> 
                <label >
                    <input type="radio" id="q130" name="quality[21]" value="3" /> ICICI Bank
                </label> 
                <label >
                    <input type="radio" id="q131" name="quality[21]" value="4" /> Indian Bank
                </label> 
                
            </div>
        </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="crdno">Card Number</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="crdno" placeholder="Enter Card Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="crdname">Name on Card</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="crdname" placeholder="Name on card" required>
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="control-label col-sm-3" for="cvv">CVV</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="cvv" placeholder="Enter CVV" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning btn-lg reg_btn">Pay Now</button>
                        </div>
                    </div>
                    </form>

                </fieldset>
                    </div>
                    
                
                </div>
                </div>
                </body>
                </html>