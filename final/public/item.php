<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php")?>

	
<div>
    <h1 align="left">E-SHOP</h1>
</div>


 <?php
    $query=query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['id']) . " ");
    confirm($query);
    while($row=fetch_array($query)): //start while loop.....
    
       $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_category_id = $row['product_category_id'];
       $product_price = $row['product_price'];
       $product_description = $row['product_description'];
       $product_image = $row['product_image'];
    
    
 ?>



<!--Left Sidebar...............................-->
<div style="float: left;">
    <table border="1" width="240px" height="400px">
        <tr>
            <td align="center" valign="top">
            
            <h2 align=""><?php echo $product_title;?></h2><hr>
            <h4>Price:<?php echo "&#36;".$product_price?></h4><br>
            <p><?php echo $product_description;?></p><br>
            <a href="../resources/cart.php?add=<?php echo $product_id ?>"><input type="submit" value="Buy Now"></a>
            
            
            
            </td>
        </tr>
    </table>
</div>
<!--Left Sidebar...............................-->
	<!--image****************************-->
		<div id="slider" style="width: 400px; margin-top:50px; margin-left:40px; float: left;">
		     <img src="./img/<?php echo $product_image;?>"  width="400px" height="240" />
		</div>
       <!--image*************************-->

	
		    
    <!--category******************************************-->     
 <div  style="width: 240px; float: right;">

<fieldset>
<legend>CATEGORY</legend>
<?php get_categories();?>
</fieldset>

</div>
<!--category**********************************************s--> 
			
<?php endwhile; ?> <!--end while loop -->				
						
 <?php include(TEMPLATE_FRONT . DS . "footer.php")?>








