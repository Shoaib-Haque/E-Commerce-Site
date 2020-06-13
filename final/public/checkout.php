<?php require_once("../resources/config.php");?>
<?php require_once("../resources/cart.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php")?>	

<div>
<h4 align="center"><?php display_message();?></h4>
    <h1>Checkout</h1>
</div>

<!--Cart Item.........................................-->	
<form action="payment.php" method="post"><!--if we click Buy Now go to the payment.php page-->
<div>
    <table class="table" width="800">
    <hr>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>quantity</th>
        <th>Sub-total</th>
    </tr>
<?php cart();?>


    </table>
</div>  
</form>
<!--CART TOTAL-->
<div style="float:right;">
<h1>Cart Totals</h1>
<table width="300" border="1px">
<tr>
<th>Items</th>
<td><?php
echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity']="0";
   ?></td>
</tr>

<tr>
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr>
<th>Order Total</th>
<td><?php
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total']="0";
   ?></td>
</tr>
</table>
</div>
<!--CART TOTAL-->


     
<!--Cart Item.........................................-->

<!--Buy button***********************************-->
<div style="margin-top:50px;">
    <a href="payment.php"><input type="submit" name="upload" value="Buy Now"></a>
</div>	
<!--Buy button***********************************-->

		
 <?php include(TEMPLATE_FRONT . DS . "footer.php")?>








