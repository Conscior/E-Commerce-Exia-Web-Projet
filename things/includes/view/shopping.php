<?php
session_start();
require_once("../controller/shopController.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<!DOCTYPE html>
<head>
    <?php 
        include '../model/head.php';
    ?>
	<link rel="stylesheet" type= "text/css" href="../../css/addEvent.css">

      <title> SHOPPING </title>
     
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../css/shopStyle.css" />

 
    </head>

    <body>

       <?php include '../model/navbar.php' ; ?>
<div style=""></div>
	   <?php
            if(isset($_SESSION['usersis_BDE']) AND $_SESSION['usersis_BDE'] == 1) {
                  echo '<div class="button_cont" align="center" style="margin-top:200px"><a class="b_addEvent" href="newProduct.php" target="_blank" rel="nofollow"><span>New Product</a></div>';
                     }                     
                ?>


       <div style="margin-top:20px;"id="shopping-cart">
<?php if (isset($_SESSION['usersis_admin']) AND $_SESSION['usersis_admin'] == 0) {
	echo '<a id="btnEmpty" href="shop.php?action=empty">Empty Cart</a>';
}?>

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table style="font-size:large;font-weight:bold" class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr style="font-size:large;ont-font-weight:bold">
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%"> Price</th>

<th style="text-align:center;" width="5%">  </th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr style="font-size:normal;">
				<td><img style="height:100px;width:100px;margin-top:20px"src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td style="text-align:center;"><a href="shop.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="../assets/icon-delete.png" alt="Remove " /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr style="color:red;">
<br><br><br>
<td colspan="2" align="right" style="font-size:normal;text-decoration:underline">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<?php
if (isset($_SESSION['usersis_admin']) AND $_SESSION['usersis_admin'] == 0) {
	echo '<div style="font-size:large;font-weight:bold;color:green" class="no-records">Your Cart is Empty</div>';
}
?>
<?php 
}
?>
</div>

<div id="product-grid">
	<div style="font-size:large;font-weight:bold"class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div style="border:2px solid black;"class="product-item">
			<form method="post" action="shop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img style="height:150px;margin-left:40px;"src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div style="font-size:large" class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div style="font-size:large;font-weight:bold"class="product-price"><?php echo $product_array[$key]["price"]."   DA" ?></div>
			<?php if (isset($_SESSION['usersis_admin']) AND $_SESSION['usersis_admin'] == 0) {
				echo '<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input style="background-color:yellow;font-size:large;" type="submit" value="Add to Cart" class="btnAddAction" /></div>';
			}
			?>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
    


       </body>
	   
       </html>