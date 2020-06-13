<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php")?>

<div>
    <h1>Latest Product</h1>
</div>

       
<!--image gallery.........................-->
<div style="width: 960px; margin-top:-35px">

<?php get_products_in_cat_page();?>
 
</div>
 <!--image gallery.........................-->	
	
	
	
<?php include(TEMPLATE_FRONT . DS . "footer.php")?>