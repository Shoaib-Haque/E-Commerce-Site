<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php")?>

<div>
    <h1>Shop</h1>
</div>

       
<!--image gallery.........................-->
<div style="width: 960px; margin-top:-35px">

<?php get_products_in_shope_page();?>

 
</div>
 <!--image gallery.........................-->	
	
	
	
 <?php include(TEMPLATE_FRONT . DS . "footer.php")?>