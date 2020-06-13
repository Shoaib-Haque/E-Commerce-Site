<?php require_once("../../config.php");?>

<?php

if(isset($_GET['id'])){
    $product_id=escape_string($_GET['id']);
    
    $query=query("DELETE FROM products WHERE product_id=$product_id");
    confirm($query);
    
    set_message("product Deleted");
    redirect("../../../public/admin/index.php?products");
}else{
        redirect("../../../public/admin/index.php?products");

}
    
    ?>