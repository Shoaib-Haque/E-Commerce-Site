<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php")?>

	
	
		<!--slider ...............................-->
<?php include(TEMPLATE_FRONT . DS . "slider.php")?>
       <!--slider .....................................-->
       
       
 <!--category******************************************-->     
<?php include(TEMPLATE_FRONT . DS . "side_nav.php")?>
<!--category**********************************************s-->   
  
 <!------Search Box---------------------------->      
 <div style="width: 720px;  margin-top:15px; float:left">
 <form action="searchs.php" method="post" autocomplete="on">
     <input type="text" id="search" name="search" autocomplete="off" placeholder="Search Product" size="87px">
     <span style="margin-left:-4px"><input name="submit" type="submit" value="Search"></span>
 </form>
 <div class="bg-success" id="display"></div> 
 </div>      
<!------Search Box---------------------------->   

<!--image gallery.........................-->
<div style="width: 720px; margin-top:300px">

<?php get_product();?>
 
 
</div>
 <!--image gallery.........................-->	   
    
 <?php include(TEMPLATE_FRONT . DS . "footer.php")?>   