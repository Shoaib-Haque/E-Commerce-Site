<?php require_once("../../config.php");
if(isset($_GET['id'])){
    $order_id=escape_string($_GET['id']);
    echo $order_id;
    $query=query("DELETE FROM orders WHERE order_id=" . $order_id . " ");
    confirm($query);
    set_message("Ordered Deleted");
    redirect("../../../public/admin/index.php?orders");
}else{
    redirect("../../../public/admin/index.php?orders");
}

?>