<?php require_once("../../config.php");
if(isset($_GET['id'])){
    $inbox_id=escape_string($_GET['id']);
    $query=query("DELETE FROM inbox WHERE inbox_id=" . $inbox_id . " ");
    confirm($query);
    set_message("Message Deleted");
    redirect("../../../public/admin/index.php?inbox");
}else{
    redirect("../../../public/admin/index.php?inbox");
}

?>