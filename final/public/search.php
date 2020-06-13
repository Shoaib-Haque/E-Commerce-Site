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
 <form action="searchs.php" method="post">
     <input type="text" name="search" placeholder="Search Product" size="87px">
     <span style="margin-left:-4px"><input name="submit" type="submit" value="Search"></span>
 </form>
 </div>      
<!------Search Box---------------------------->   

              <?php
                
                
    if(isset($_POST['submit'])){
        $search=$_POST['search'];
        
        $query=query("select * from products where product_title LIKE '%$search%' ");
 
       confirm($query);
        $count=mysqli_num_rows($query);
        if($count==0){
            echo "<h1>no result</h1>";   
        }else{
                
    while($row=fetch_array($query)){
       $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_category_id = $row['product_category_id'];
       $product_price = $row['product_price'];
       $product_description = $row['product_description'];
       $product_image = $row['product_image'];
	   
			?>
                    
                    
                    
<!--image gallery.........................-->
<div style="width: 720px; margin-top:300px">

		<div style="width: 240px; height: 240; margin-top:30px; float: left;"> 
		<a href="item.php?id=<?php echo $product_id?>"><img src="img/<?php echo $product_image;?>" style="float: left;" width="240" height="240" /></a>
		<p style="float:left; margin-top:0px;">Price:&#36;<?php echo $product_price;?></p>
		<a href="../resources/cart.php?add=<?php echo $product_id?>"><h3 align="center">Add to cart</h3></a>

		</div>
 
 
</div>
 <!--image gallery.........................-->	   
    
 <?php include(TEMPLATE_FRONT . DS . "footer.php")?> 
                    
                    
                    
                    
               <?php }}} ?>
   