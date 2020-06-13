<?php require_once("config.php");?>

<?php
if(isset($_GET['add'])){
$product_id=escape_string($_GET['add']);//GET product_id FROM (Add to card button) get_product function....
    $query=query("SELECT * FROM products WHERE product_id=" . $product_id . " ");
    confirm($query);
    while($row=fetch_array($query)){
        $product_quantity=$row['product_quantity'];//get product quantity from database....
        $product_title=$row['product_title'];//get product quantity from database....
        if($product_quantity!=$_SESSION['product_' . $product_id]){
            $_SESSION['product_' . $product_id] +=1;
            redirect("../public/checkout.php");
        }else{
            set_message("we only have " . $product_quantity . " " . "$product_title " . "Available"); 
            redirect("../public/checkout.php");
        }
    }

//$_SESSION['product_' . $product_id] +=1;//this SESSION count start if i click multiple time same product...my 1st click id is the SESSION start ID.....
//redirect("index.php");
}


//DECREASE THE PRODUCT ITEM USING SESSION..........
if(isset($_GET['remove'])){
	$product_id=escape_string($_GET['remove']);//GET product_id FROM (remove button) checkout page......
	 $_SESSION['product_' . $product_id]--;
	 if($_SESSION['product_' . $product_id]<1){
         
    unset($_SESSION['item_total']);//if no product in checkout then unset $_SESSION....
    unset($_SESSION['item_quantity']);
         
     redirect("../public/checkout.php");
}else{
	 redirect("../public/checkout.php");
}
	
}

//THE PRODUCT ITEM '0' USING SESSION..........
if(isset($_GET['delete'])){
	$product_id=escape_string($_GET['delete']);//GET product_id FROM (delete button) checkout page......
	 $_SESSION['product_' . $product_id]='0';
    
    unset($_SESSION['item_total']);//if no product in checkout then unset $_SESSION....
    unset($_SESSION['item_quantity']);
    
	  redirect("../public/checkout.php");
}




//FUNCTION FOR VIEW PRODUCT checkout page....................
function cart(){
     $total='0';
    $item_quantity='0';  
	
 //<!-------------for payment system------------------>
    //declare variable for increamenting product item autometicay...................
    $item_name=1;
    $item_number=1;
    $amount=1;
    $quantity=1;
//<!-------------for payment system------------------>
	
	
     foreach($_SESSION as $name => $value){//each value of the array,it will assaining a variable $name..
       
        if($value > 0){
            
             if(substr($name, 0, 8) == "product_"){
                   
             $length = strlen($name);
                       
             $id = substr($name, 8, $length);
           
            	$query=query("SELECT * FROM products WHERE product_id= " . escape_string($id) . " ");
	confirm($query);
	while($row=fetch_array($query)){
	   $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_category_id = $row['product_category_id'];
       $product_price = $row['product_price'];
       $product_quantity = $row['product_quantity'];
	   
	  $sub=$product_price*$value;
      $item_quantity+=$value;

$product = <<<DELIMETER
    
    <tr>
        <td align="center">$product_title</td>
        <td align="center">&#36;$product_price</td>
        <td>$value</td>
        <td align="center">&#36;$sub</td>
		
		
	<td>
    <a class="btn btn-warning" href="../resources/cart.php?remove=$product_id"><span class="glyphicon glyphicon-minus"></span></a>
    
    <a class="btn btn-success" href="../resources/cart.php?add=$product_id"><span class="glyphicon glyphicon-plus"></span></a>
    
    <a class="btn btn-danger" href="../resources/cart.php?delete=$product_id"><span class="glyphicon glyphicon-remove"></span></a>
  </td>
    </tr>

	
<input type="hidden" name="item_name_{$item_name}" value="{$product_title}">
<input type="hidden" name="item_number_{$item_number}" value="{$product_id}">
<input type="hidden" name="amount_{$amount}" value="{$sub}">
<input type="hidden" name="quantity_{$quantity}" value="{$value}">
	
	
DELIMETER;
        echo $product;
		
	//increament the value declare previously variable....................   
    $item_name++;
    $item_number++;
    $amount++;
    $quantity++;
        
	       }
              $_SESSION['item_total']=$total+=$sub;
            $_SESSION['item_quantity']=$item_quantity;
       }
		}
	 }
}
   





function process_transaction(){ 
   if(isset($_POST['payment'])){
    $amount=$_POST['amt'];
    $currency=$_POST['cc'];
    $transaction=$_POST['tx'];
    
    $status="Pending";
   
    
    
    
    $total='0';
   $item_quantity='0';

        
    foreach($_SESSION as $name => $value){//each value of the array,it will assaining a variable $name..
       
        if($value > 0){
            
             if(substr($name, 0, 8) == "product_"){
                   
             $length = strlen($name);
                       
             $id = substr($name, 8, $length);
                 
//QUERY FOR INSERT ORDER TABLE...................................
    $insert_order=query("INSERT INTO orders(order_amount,order_transaction,order_currency,order_status) VALUES('{$amount}','{$transaction}','{$currency}','{$status}')");
    $last_id = last_id(); //FUNCTION CALL FROM function.php page...................
    confirm($insert_order);
                 
        $query=query("SELECT * FROM products WHERE product_id= " . escape_string($id) . " ");
        confirm($query);
                 
	while($row=fetch_array($query)){
	   $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_category_id = $row['product_category_id'];
       $product_price = $row['product_price'];
       $product_quantity = $row['product_quantity'];
        
       $sub=$product_price*$value;
       $item_quantity+=$value;

     $insert_report=query("INSERT INTO reports(product_id,order_id,product_price,product_title,product_quantity) VALUES('{$id}','{$last_id}','{$product_price}','{$product_title}','{$value}')");
    confirm($insert_report);
        
	       }
            $total+=$sub;
  
       }
            
   }

}
//ooooooooooooooooooooooooo

$res=$product_quantity-$value;
 $query="UPDATE products SET ";
    $query.="product_quantity='{$res}' ";
    $query.="WHERE product_id={$id} ";
  $send_update_query=query($query);
        confirm($send_update_query);


session_destroy();
}else{
    redirect('index.php');
}
}   










?>