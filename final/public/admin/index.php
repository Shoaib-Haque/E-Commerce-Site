<?php require_once("../../resources/config.php");?>
<?php include(TEMPLATE_BACK . DS . "header.php")?>

<?php
    //we have a function for lgin...........function.php pge..
if(!isset($_SESSION['username'])){
    redirect("../../public");
}

?>
      
  <?php

  if($_SERVER['REQUEST_URI']=="/web/final/public/admin/" || $_SERVER['REQUEST_URI']=="/web/final/public/admin/index.php"){
                include(TEMPLATE_BACK . DS . "admin_content.php");
            }
			
			 if(isset($_GET['orders'])){
                include(TEMPLATE_BACK . DS . "/orders.php");
            }
			
			  if(isset($_GET['products'])){
                include(TEMPLATE_BACK . DS . "/products.php");
            }
			
			   if(isset($_GET['add_product'])){
                include(TEMPLATE_BACK . DS . "/add_product.php");
            }
			
			    if(isset($_GET['edit_product'])){
                include(TEMPLATE_BACK . DS . "/edit_product.php");
            }
			
			    if(isset($_GET['users'])){
                include(TEMPLATE_BACK . DS . "/users.php");
            }
			
			     if(isset($_GET['add_user'])){
                include(TEMPLATE_BACK . DS . "/add_user.php");
            }
			
			    if(isset($_GET['reports'])){
                include(TEMPLATE_BACK . DS . "/reports.php");
            }
			
			     if(isset($_GET['categories'])){
                include(TEMPLATE_BACK . DS . "/categories.php");
            }
			   if(isset($_GET['inbox'])){
                include(TEMPLATE_BACK . DS . "/inbox.php");
            }
               
	
		?>    

			
				
						
<?php include(TEMPLATE_BACK . DS . "footer.php");?>







