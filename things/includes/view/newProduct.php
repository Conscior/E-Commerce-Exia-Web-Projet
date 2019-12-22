<?php session_start();?>
<!DOCTYPE html>
<head>

    <?php include '../model/head.php'; ?>
    <link rel="stylesheet" type= "text/css" href="../../css/newProduct.css">
   <title>New Product</title>
</head>
<body class="animsition">
    <?php
        include '../model/navbar.php' ;
    ?>

<div style="height:50px; "></div>
<div class="box_inscription">
    <h2>New Product <i style="margin-left: 15px;" class="fas fa-sign-in-alt fa-lg"></i></h2>
    <form id="Product_new" method="POST" action="../processing/processing_newProduct.php">

        <input name="product_name" id="product_name" type="text" placeholder="Product Name" autocomplete="off"/>
        <br /><br />

        <input name="product_code" id="product_code" type="text" placeholder="Product Code" autocomplete="off"/>
        <br /><br />

        <input name="product_url" id="product_url" type="text" placeholder="Product Image URL" autocomplete="off"/>
        <br /><br />

        <input name="product_price" id="product_price" type="text" placeholder="Product Price" autocomplete="off"/>
        <br /><br />

        <select name="product_categorie" id="product_category">
        	<option value="" disabled selected hidden>Product Categorie</option>
        	<option value="Stickers">Stickers</option>
            <option value="T-Shirts">T-Shirts</option>
            <option value="Figurines">Figurines</option>
        </select>
        <br/><br/>

       <div style="text-align: center;"><input name="product-submit" type="submit" value="Done"/></div>
    </form>
</div>



        <?php
        include '../model/footer.php' ;
    ?>

    <?php
        include '../model/injectionScript.php';
    ?>
</body>
</html>