<?php

/***************************************HELPER FUNCTION***********************************************/
//USE FOR MESSAGE SET..........................
function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message']=$msg;
    }else{
        $msg="";
    }
}
//USE FOR DISPLAY MESSAGE.................
function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
//USE FOR PAGE REFRESH...........................
function redirect($location){
    header("Location: $location ");
}
//USE FOR CONNECTION BUILT................
function query($sql){
    global $connection;
    return mysqli_query($connection,$sql);
}
//USE FOR QUERY CONFIRMATION.............
function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}
//USE FOR SQL INSECTION..................
function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}
function fetch_array($result){
    return mysqli_fetch_array($result);
}

//USE FOR pull out last inserted id ..........................
function last_id(){
    global $connection;
    return mysqli_insert_id($connection);
}

///Digit Checking
function digit_check($num){
				for($i=0;$i<strlen($num);$i++){
					if(ord($num[$i])<48)
					{
						return true;
					}
					else if(ord($num[$i])>57)
					{
						return true;
					}
				}
			}


/******************************************FRONT END FUNCTION**************************************************/

//FUNCTION FOR VIEW PRODUCT.....................
function get_product(){
    $query=query("SELECT * FROM products ");
    confirm($query);
    
    while($row=fetch_array($query)){
       $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_category_id = $row['product_category_id'];
       $product_price = $row['product_price'];
       $product_description = $row['product_description'];
       $product_image = $row['product_image'];
	   $product_quantity = $row['product_quantity'];
	   if($product_quantity>0){
$product = <<<DELIMETER
    
		<div style="width: 240px; height: 240; margin-top:30px; float: left;"> 
		<a href="item.php?id=$product_id"><img src="./img/$product_image" style="float: left;" width="240" height="240" /></a>
		<p style="float:left; margin-top:0px;">Price:&#36;$product_price</p>
		<a href="../resources/cart.php?add=$product_id"><h4 align="center">Add to cart</h4></a>
		</div>
DELIMETER;
	echo $product;
	  }
	  
    }

}

//FUNCTION FOR VIEW CATEGORIES.....................
function get_categories(){
    $query=query("SELECT * FROM categories order by cat_title");
    confirm($query);
    while($row=fetch_array($query)){
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
$category_links = <<<DELIMETER
<p><a href="category.php?id=$cat_id">$cat_title</a></p><hr>
DELIMETER;
        echo $category_links;
   }
}

//FUNCTION FOR VIEW PRODUCT in CATEGORY PAGE....................
function get_products_in_cat_page(){
    $query=query("SELECT * FROM products WHERE product_category_id=" . escape_string($_GET['id']) . " ");
    confirm($query);
    while($row=fetch_array($query)){
       $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_category_id = $row['product_category_id'];
       $product_price = $row['product_price'];
       $product_description = $row['product_description'];
       $product_image = $row['product_image'];
	   $product_quantity = $row['product_quantity'];
		if($product_quantity>0){
$product = <<<DELIMETER
    
	<div style="width: 240px; height: 240; margin-top:30px; float: left;"> 
	<img src="./img/$product_image" style="float: left;" width="240" height="240" />
	<p style="float:left; margin-top:0px;">Price:$product_price</p>
	<a href="item.php?id=$product_id"><h4 align="center">Buy Now</h4></a>
	</div>
DELIMETER;
		echo $product;
		}
    }
}

//FUNCTION FOR VIEW PRODUCT in SHOPE PAGE....................
function get_products_in_shope_page(){
    $query=query("SELECT * FROM products ");
    confirm($query);
    while($row=fetch_array($query)){
       $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_category_id = $row['product_category_id'];
       $product_price = $row['product_price'];
       $product_description = $row['product_description'];
       $product_image = $row['product_image'];
	   $product_quantity = $row['product_quantity'];
		if($product_quantity>0){

$product = <<<DELIMETER
    
	<div style="width: 240px; height: 240; margin-top:30px; float: left;"> 
	<img src="./img/$product_image" style="float: left;" width="240" height="240" />
	<p style="float:left; margin-top:0px;">Price:&#36;$product_price</p>
	<a href="item.php?id=$product_id"><h4 align="center">Buy Now</h4></a>
	</div>
DELIMETER;
        echo $product;
		}
    }
}

//USE FOR LOGIN.................................
function login_user(){
    if(isset($_POST['submit'])){
        $username=escape_string($_POST['username']);
        $password=escape_string($_POST['password']);
        
        $query=query("SELECT * from users WHERE username='{$username}' AND password='{$password}' ");
        confirm($query);
        
        if(mysqli_num_rows($query)==0){
            set_message("your username or password wrong");
            redirect("login.php");
        }else{
            $_SESSION['username']=$username; //SESSION create......................
            set_message("Welcome to Admin {$username}");
            redirect("admin");
        }
    }
}

//USE FOR SEND EMAIL...........................
function send_message(){
	
	//now................................


	///First Letter Checking
	function first_letter_check($name){
				for($i=0;$i<strlen($name);$i++){
				if(ord($name[0]) <= 57 || (ord($name[0])>=97 && ord($name[0])<=122)){
					return true;
				}
			}
	}
	
	///Letter Checking
	function letter_check($name){
				for($i=0;$i<strlen($name);$i++){
				if(ord($name[$i])>=48 && ord($name[$i])<=57){
					return true;
				}
			}
	}
	

	
	//SPECIAL cheracter check...........
function special_character_check($name){
	for($i=0;$i<strlen($name);$i++){
		if((ord($name[$i])>=0 && ord($name[$i])<=45) || (ord($name[$i])==47) || (ord($name[$i])>=58 && ord($name[$i])<=64) || (ord($name[$i])>=91 && ord($name[$i])<=96) || (ord($name[$i])>=123)){
			return true;
		}
	}
}

	
	///Email validation
	function email_check($email){
				$count=0;
				$countLetter=0;
				$countLetter2=0;
				$valid=1;
				$countDot=0;
				for ($i=0; $i < strlen($email) ; $i++) { 
  
				if(ord($email[$i])==64){
					if($i<1){
						$valid=0;
						break;
					}
					else{
						for ($j=$i; $j<strlen($email) ; $j++) {
							if(ord($email[$j])==46){
									$countDot++;
								for ($k=$j-1; $k>$i ; $k--) 
								{
									$countLetter++;
								}
								for ($k=$j+1; $k<strlen($email) ; $k++) 
								{
									$countLetter2++;
								}
						}
						}   
						if($countLetter<1 || $countDot>1 || $countLetter2<1){
							$valid=0;}
					}
				}
				
					elseif(ord($email[$i])==46){
						for ($j=0; $j < strlen($email) ; $j++) { 
							if(ord($email[$j])==64){
								$count=1;  
							}
						}
						if($count!=1){
							$count=0;
							$valid=0;
						}
					}  
				}
				
				for ($i=0; $i <strlen($email) ; $i++) { 
					if(ord($email[$i])==64 || ord($email[$i])==46){
						$count++;
					}
				}
				if($count==0 && $valid==1){
					$valid=0;}

				if ($valid==1 && $count>1 && $countDot==1) {
					return false;
				}
				else{
					return true;
				}
	}
	
	global $verify;
	
	//now end.................................
    if(isset($_POST['send'])){
        echo $name=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
    //now................................
		if(empty($name) || $name==" "){
			 $verify = "First Name can not be empty";
		}
		else if(first_letter_check($name))
		{
			$verify = "First Name Must start with upper case letter..!";
		}
		else if(letter_check($name)){
			$verify = "First Name can not contain number..!";
		}
		else if(special_character_check($name)){
			$verify= "Name contain only a-z & A-Z";
		}
		
		else if(empty($email)){
			$verify = "Email id Cannot Be Empty..!";
		}
		else if (email_check($email))
		{
			$verify = "Email id invalid..!";
		}
	
		
	
	
	
		
	
	
	
		
		if($verify=="")
		{
			
			
			
	
	//now.................................
        
        $query=query("INSERT INTO inbox(name,email,subject,message) VALUES('{$name}','{$email}','{$subject}','{$message}')");
        confirm($query);
        set_message("Your message has been sent");
		redirect("contact.php");
    }
}

else{
	 set_message("please try again");
}
}



/**************************************************BACK END FUNCTION*********************************************/

//FUNCTION FOR DISPLAY ORDER..............................
function display_orders(){
    $query=query("SELECT * FROM orders order by order_id desc");
    confirm($query);
    
    while($row=fetch_array($query)){
        $order_id=$row['order_id'];
        $order_amount=$row['order_amount'];
        $order_transaction=$row['order_transaction'];
        $order_currency=$row['order_currency'];
        $order_status=$row['order_status'];
		if($order_status=='Pending'){
$orders = <<<DELIMETER
    <tr bgcolor='yellow'>
        <td align="center">$order_id</td>
        <td align="center">$order_amount</td>
        <td align="center">$order_transaction</td>
        <td align="center">$order_currency</td>
        <td align="center">$order_status</td>
		<td><a href="../../resources/templates/back/update_order.php?id={$order_id}">Delivered</a></td>
		<td><a href="../../resources/templates/back/delete_order.php?id={$order_id}">Delete</a></td>
    </tr>
DELIMETER;
        echo $orders;
		}
		else{
$orders = <<<DELIMETER
    <tr bgcolor='green'>
        <td align="center">$order_id</td>
        <td align="center">$order_amount</td>
        <td align="center">$order_transaction</td>
        <td align="center">$order_currency</td>
        <td align="center">$order_status</td>
		<td><a href="../../resources/templates/back/delete_order.php?id={$order_id}">Delete</a></td>
		
    </tr>
DELIMETER;
        echo $orders;
		}
    }
}



//FUNCTION FOR DISPLAY PRODUCT..............................
function get_product_in_admin(){
    
     $query=query("SELECT * FROM products");
    confirm($query);
    while($row=fetch_array($query)){
       $category=show_product_category_title($row['product_category_id']);//FUNCTION CALL FOR SHOW CATEGORY TITLE.....
       $product_image=display_image($row['product_image']);//FUNCTION CALL FOR DISPLAY IMAGE....
       $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_category_id = $row['product_category_id'];
       $product_price = $row['product_price'];
       $product_description = $row['product_description'];
       //$product_image = $row['product_image'];
       $product_quantity = $row['product_quantity'];
        //AFTER DELIMETER WE DO NOT USE SPACE.....................
        //DELIMETER USE FOR SINGLE AND DOUBLE COUTE MATCH its called (heredoc)...........
		if($product_quantity<=0){
	$product = <<<DELIMETER
    
    <tr bgcolor='red'>
        <td align="center">$product_id</td>
           <td><a href="index.php?edit_product&id=$product_id">$product_title</a><br>
              <a href="index.php?edit_product&id=$product_id"><img width='100' src="../img/{$product_image}" alt=""></a>
            </td>
        <td align="center">$category</td>
        <td align="center">$product_price</td>
        <td align="center">$product_quantity</td>
		<td><a href="../../resources/templates/back/delete_product.php?id={$product_id}">Delete</a></td>
    </tr>
DELIMETER;
}       else if($product_quantity<10){
	$product = <<<DELIMETER
    
    <tr bgcolor='yellow'>
        <td align="center">$product_id</td>
           <td><a href="index.php?edit_product&id=$product_id">$product_title</a><br>
              <a href="index.php?edit_product&id=$product_id"><img width='100' src="../img/{$product_image}" alt=""></a>
            </td>
        <td align="center">$category</td>
        <td align="center">$product_price</td>
        <td align="center">$product_quantity</td>
		<td><a href="../../resources/templates/back/delete_product.php?id={$product_id}">Delete</a></td>
    </tr>
DELIMETER;
}
		else{
	$product = <<<DELIMETER
    
    <tr>
        <td align="center">$product_id</td>
           <td><a href="index.php?edit_product&id=$product_id">$product_title</a><br>
              <a href="index.php?edit_product&id=$product_id"><img width='100' src="../img/{$product_image}" alt=""></a>
            </td>
        <td align="center">$category</td>
        <td align="center">$product_price</td>
        <td align="center">$product_quantity</td>
		<td><a href="../../resources/templates/back/delete_product.php?id={$product_id}">Delete</a></td>
    </tr>
DELIMETER;
}
        echo $product;
    }
    
  
    
}

function show_product_category_title($product_category_id){
    $category_query=query("SELECT * FROM categories WHERE cat_id='{$product_category_id}' ");
    confirm($category_query);
    while($row=fetch_array($category_query)){
        
        $cat_title=$row['cat_title'];
        return $cat_title;
    }
}
//FUNCTION FOR DISPLAT IMAGE............................................
function display_image($picture){
    global $upload_directory;
    return $upload_directory . DS . $picture;
}


//FUNCTION FOR ADD PRODUCT..............................
function add_product(){
    if(isset($_POST['publish'])){
        $title=escape_string($_POST['product_title']);
        $category=escape_string($_POST['product_category_id']);
        $price=escape_string($_POST['product_price']);
        $description=escape_string($_POST['product_description']);
        $quantity=escape_string($_POST['product_quantity']);

		$image=$_FILES['image']['name'];
		$image_temp_location=$_FILES['image']['tmp_name'];
		$filesize = $_FILES['image']['size'];
		$fileExt = explode('.',$image);
		$fileActualExt = strtolower(end($fileExt));
		$AllowedExt = array('jpeg', 'jpg', 'png');
		
			if(empty($title) || $title==""){
				$message = "Title Cannot Be Empty..!";
			}
			else if(strlen($title)>100){
				$message = "Title Cannot Be Longer Then 50 Character..!";
			}
			else if(strlen($description)>1000){
				$message = "Description Cannot Be Longer Then 1000 Character..!";
			}
			else if(empty($price) || $price==""){
				$message = "Price Cannot Be Empty..!";
			}
			else if(digit_check($price)){
				$message = "Price Can Only Contain Digits..!";
			}
			else if(strlen($price)>7){
				$message = "Price Cannot Be Longer Then 7 Digits..!";
			}
			else if(empty($category) || $category==""){
				$message = "Select Category..!";
			}
			else if(empty($quantity)){
				$message = "Add quantity..!";
			}
			else if(digit_check($quantity)){
				$message = "Quantity Can Only Contain Digits..!";
			}
			else if(empty($image)){
				$message = "Must Need An Iamge For The Product..!";
			}
			else if(!in_array($fileActualExt, $AllowedExt) ){
				$message = "Invalid Image/File extension..!";
			} 
			else if($filesize>4000000){
				$message = "Image File size is too Large..!";
			}
			
		if($message!=""){
			set_message($message);
			redirect("index.php?add_product");
		}
		else{
			move_uploaded_file($image_temp_location,"../img/$image");
			$query=query("INSERT INTO products(product_title,product_category_id,product_price,product_description,product_quantity,product_image) VALUES('{$title}','{$category}','{$price}','{$description}','{$quantity}','{$image}')");
			$last_id=last_id();//FUNCTION FOR PULL OUT LAST ID...........
			confirm($query);
			$message = "PRODUCT Added, ID: {$last_id}";
			set_message($message);
			redirect("index.php?products");
		}
		
    }
}

//FUNCTION FOR show_categories_add_product_page().....................
function show_categories_add_product_page(){
    $query=query("SELECT * FROM categories order by cat_title");
    confirm($query);
    while($row=fetch_array($query)){
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
$category_option = <<<DELIMETER
<option value="$cat_id">{$cat_title}</option>
DELIMETER;
        echo $category_option;
   }
}


//FUNCTION FOR UPDATE PRODUCT..............................
function update_product(){
    if(isset($_POST['update'])){
        $title=escape_string($_POST['product_title']);
        $category=escape_string($_POST['product_category_id']);
        $price=escape_string($_POST['product_price']);
        $description=escape_string($_POST['product_description']);
        $quantity=escape_string($_POST['product_quantity']);
        $file = $_FILES['image'];
		$filename = $_FILES['image']['name'];
		$image_temp_location=$_FILES['image']['tmp_name'];
		$filesize = $_FILES['image']['size'];
		$fileExt = explode('.',$filename);
		$fileActualExt = strtolower(end($fileExt));
		$AllowedExt = array('jpeg', 'jpg', 'png');
		
		
			if(empty($title) || $title==""){
				$message = "Title Cannot Be Empty..!";
			}
			else if(strlen($title)>100){
				$message = "Title Cannot Be Longer Then 50 Character..!";
			}
			else if(strlen($description)>1000){
				$message = "Description Cannot Be Longer Then 1000 Character..!";
			}
			else if(empty($price) || $price==""){
				$message = "Price Cannot Be Empty..!";
			}
			else if(digit_check($price)){
				$message = "Price Can Only Contain Digits..!";
			}
			else if(strlen($price)>7){
				$message = "Price Cannot Be Longer Then 7 Digits..!";
			}
			else if(empty($category) || $category==""){
				$message = "Select Category..!";
			}
			else if(empty($quantity)){
				$message = "Quantity Cannot Be Empty.!";
			}
			else if(digit_check($quantity)){
				$message = "Quantity Can Only Contain Digits..!";
			}
			else if(empty($filename)){
				$query="UPDATE products SET ";
				$query .= "product_title = '{$title}', ";
				$query .= "product_price = '{$price}', ";
				$query .= "product_category_id = '{$category}', ";
				$query .= "product_description = '{$description}', ";
				$query .= "product_quantity = '{$quantity}' ";
				$query .= "WHERE product_id=" . escape_string($_GET['id']);
				
				
				$last_id=last_id();//FUNCTION FOR PULL OUT LAST ID...........
				$send_update_query=query($query);
				confirm($send_update_query);
				$message = "PRODUCT Has Been Updated..!";
			}
			else if(!in_array($fileActualExt, $AllowedExt) ){
				$message = "Invalid Image/File extension..!";
			} 
			else if($filesize>4000000){
				$message = "Image File size is too Large..!";
			}
			else if(file_exists($target_file)){
				$message = "File Already Uploaded..!Chose Another File To Upload..!";
			}
		
        //move_uploaded_file(filename,destination)
		if(empty($message)){
			move_uploaded_file($image_temp_location,"../img/$filename");
			//move_uploaded_file($image_temp_location , uploads/$product_image);
				
				$query="UPDATE products SET ";
				$query .= "product_title = '{$title}', ";
				$query .= "product_price = '{$price}', ";
				$query .= "product_category_id = '{$category}', ";
				$query .= "product_description = '{$description}', ";
				$query .= "product_quantity = '{$quantity}', ";
				$query .= "product_image = '{$filename}' ";
				$query .= "WHERE product_id=" . escape_string($_GET['id']);
				
				
				$last_id=last_id();//FUNCTION FOR PULL OUT LAST ID...........
				$send_update_query=query($query);
				confirm($send_update_query);
				$message = "Product has been Updated..!";
				set_message($message);
				redirect("index.php?products");
			}
		else{
				set_message($message);
				redirect("index.php?products");
			}
    }
}

//FUNCTION FOR show_categories_in_admin.............................
function show_categories_in_admin(){ 
    $query=query("SELECT * FROM categories order by cat_title");
   confirm($query);
    while($row=fetch_array($query)){
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
        
$category = <<<DELIMETER
        <tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
           <td><a href="../../resources/templates/back/delete_category.php?id={$cat_id}">Delete</a></td>
        </tr>
DELIMETER;
        echo $category;
    }
}

//FUNCTION FOR ADD CATEGORY...........................
function add_category(){ 
if(isset($_POST['add_category'])){
    $cat_title=escape_string($_POST['cat_title']);
    
    if(empty($cat_title) || $cat_title==" "){
       set_message( "<p class='bg-danger'>This Field can not be empty</p>");
    }else{ 
    
    $query=query("INSERT INTO categories(cat_title) VALUES('{$cat_title}') ");
    confirm($query);
    set_message("Category Added");
   
        }
    }
}



//FUNCTION FOR show_users_in_admin.............................
function show_users_in_admin(){ 
    $query=query("SELECT * FROM users");
   confirm($query);
    while($row=fetch_array($query)){
        $user_id=escape_string($row['user_id']);
        $username=escape_string($row['username']);
        $email=escape_string($row['email']);
       
        
$user = <<<DELIMETER
        <tr>
        <td>$user_id</td>
        <td>$username</td>
        <td>$email</td>
		<td><a href="../../resources/templates/back/delete_user.php?id={$user_id}">Delete</a></td>
    </tr>
DELIMETER;
        echo $user;
    }
}

//FUNCTION FOR ADD USER..............................
function add_user(){ 
//now................
//Number check...........
function number_check($username){
			for($i=0;$i<strlen($username);$i++){
			if(ord($username[0])<48 || ord($username[0])>57){
				return true;
			}
		}
}

//Letter check...........
function letter_check($username){
			for($i=0;$i<strlen($username);$i++){
			if(ord($username[0])>=48 && ord($username[0])<=57){
				return true;
			}
		}
}

//SPECIAL cheracter check...........
function special_character_check($username){
		for($i=0;$i<strlen($username);$i++){
			if((ord($username[$i])>=32 && ord($username[$i])<=47) || (ord($username[$i])>=58 && ord($username[$i])<=64)){
			return true;;
			}
		}
	
}

global $username_verify; 
global $email_verify;
global $password_verify;
//now end...........
if(isset($_POST['submit'])){
    
        $username=escape_string($_POST['username']);
        $email=escape_string($_POST['email']);
        $password=escape_string($_POST['password']);
		
		//now................
		
			//validation for Username...
	$flag1=false;
	 if(empty($username) || $username==" "){
		 $username_verify = "can not be empty";
	}
	 else if(letter_check($username)){
	$username_verify = "can not start with letter";
    }
	 else if(special_character_check($username)){
	$username_verify= "contain only a-z & A-Z";
    }
	else{
		$flag1=true;
	}
	
	//validation for email.**************************
$flag2=false;
$count=0;
$countLetter=0;
$countLetter2=0;
$valid=1;
$countDot=0;
 if(empty($email) || $email==" "){
		 $email_verify = "can not be empty";
	}else{	
	
 if(empty($email) || $email==" "){
		 $email_verify = "can not be empty";
	}

else{
    for ($i=0; $i < strlen($email) ; $i++) { 
  
        if(ord($email[$i])==64){
            if($i<1){
                 $email_verify = "Invalid Email ";
                $valid=0;
                break;
            }
            else{
                for ($j=$i; $j<strlen($email) ; $j++) {
                    if(ord($email[$j])==46){
                            $countDot++;
                        for ($k=$j-1; $k>$i ; $k--) 
                        {
                            $countLetter++;
                        }
                        for ($k=$j+1; $k<strlen($email) ; $k++) 
                        {
                            $countLetter2++;
                        }
                }
                }   
                if($countLetter<1 || $countDot>1 || $countLetter2<1){
                    $valid=0;}
            }
        }
        
        elseif(ord($email[$i])==46){
            for ($j=0; $j < strlen($email) ; $j++) { 
                if(ord($email[$j])==64){
                    $count=1;  
                }
            }
            
            if($count!=1){
                 $email_verify = "Invalid Email ";
                $count=0;
                $valid=0;
            }
        }  
    }
    }
    for ($i=0; $i <strlen($email) ; $i++) { 
        if(ord($email[$i])==64 || ord($email[$i])==46){
            $count++;
        }
    }
    if($count==0 && $valid==1){
        $email_verify = "Invalid Email ";
        $valid=0;}

    if ($valid==1 && $count>1 && $countDot==1) {
        $flag2=true;
    }
    else
         $email_verify = "Invalid Email ";	
	
	
	
	}

		//validation for password...
	$flag3=false;
	if(empty($password) || $password==" "){
		$password_verify = "can not be empty";
	}
   else if(strlen($password)<4){
		$password_verify = "contain at least Four Character";
	}
	else{
		$flag3=true;
	}
	

	
			//insert information...	
	if($flag1==false || $flag2==false || $flag3==false){
		echo " ";
	}else{
		//now end..............
 
    $query=query("INSERT INTO users(username,email,password) VALUES('{$username}','{$email}','{$password}') ");
    confirm($query);
    set_message("User Created");
    redirect("index.php?users");
   
        }
    }
}
	//FUNCTION FOR DISPLAY REPORTS..............................
function show_reports_in_admin(){
    
     $query=query("SELECT * FROM reports");
    confirm($query);
    while($row=fetch_array($query)){
       
       $report_id = $row['report_id'];
       $product_id = $row['product_id'];
       $order_id = $row['order_id'];
       $product_price = $row['product_price'];
       $product_title = $row['product_title'];
       $product_quantity = $row['product_quantity'];
        //AFTER DELIMETER WE DO NOT USE SPACE.....................
        //DELIMETER USE FOR SINGLE AND DOUBLE COUTE MATCH its called (heredoc)...........
$report = <<<DELIMETER
    
          <tr>
            <td>{$report_id}</td>
            <td>{$product_id}</td>
            <td>{$order_id}</td>
            <td>{$product_price}</td>
            <td>{$product_title}</td>
            <td>{$product_quantity}</td>
            
           <td><a href="../../resources/templates/back/delete_report.php?id={$report_id}">Delete</a></td>
        </tr>
DELIMETER;
        echo $report;
    }
      
}


//FUNCTION FOR INBOX SHOW MESSAGE().....................
function show_message(){
    $query=query("SELECT * FROM inbox");
    confirm($query);
    while($row=fetch_array($query)){
        $inbox_id=$row['inbox_id'];
		$name = $row['name'];
		$subject = $row['subject'];
		$email = $row['email'];
		$message = $row['message'];
$inbox = <<<DELIMETER
<div>
			<label>Username:</label>
			$name
			<br>
			<label>From:</label>
			$email
			<br>
			<label>Subject:</label>
			$subject;
			<br>
			<label>Message:</label>
			$message
			<br>
			<label><a href="../../resources/templates/back/delete_inbox.php?id={$inbox_id}">Delete</a></label>
			<hr>
		</div>
DELIMETER;
        echo $inbox;
   }
}

?>