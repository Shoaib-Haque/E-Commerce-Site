<?php require_once("../../config.php");
if(isset($_GET['id'])){
    $order_id=escape_string($_GET['id']);
    echo $order_id;
    $query=query("Update orders set order_status='Delivered' WHERE order_id=" . $order_id . " ");
    confirm($query);
    set_message("Ordered Delivered");
    redirect("../../../public/admin/index.php?orders");
}else{
    redirect("../../../public/admin/index.php?orders");
}

?>