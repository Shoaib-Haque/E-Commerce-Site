<?php
global $verify;
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    
    
    /****LOGIN SYSTEM************/
$userlist = file ('file.txt');
$success=false;

foreach ($userlist as $user) {
    $user_details = explode(',',$user);
    if ($user_details[0] === $username && $user_details[3] === $password && $user_details[5] === 'admin'){
        $success = true;
        break;
    }
}
if(empty($username) || $username==" "){
		 $verify="name can not be empty";
	}
    else if(empty($password) || $password==" "){
		$verify="password can not be empty";
	}
else if ($success) {
    header('Location:./admin/');
} else {
    $verify="You have entered the wrong username or password. Please try again.";
}
    
    
    
    
}

?>


<html>
	<head>
	</head>
	<body>
<div style="width: 960px; margin:20px auto;">
	
	<!--navigation ***********************************-->
	 <div>
    <table height="45px">
     <tr bgcolor="#f4c741" height="15%">
	     <td colspan="3" width = 1200>
          <font color="black">
           <nav>
              <a href="index.php">Home</a> |
              <a href="shop.php">Shop</a> |
              <a href="login.php">Login</a> |
              <a href="#">Admin</a> |
              <a href="checkout.php">Checkout</a> |
              <a href="contact.php">Contact</a> |
              <a href="registration.php">Registration</a> 
           </nav>
         </font>
         </td>
         </tr>
         </table>
    </div>
	<!--navigation **************************************-->
<div>
    <h1 align="center">Login</h1>
    <h4 align="center"><?php echo $verify;?></h4>
</div>

<!--Login Form ......................................-->
<div>

    <form action="login.php" method="post">
        <div align="center">
            <label for="male">Username:</label>
            <input type="text" name="username"/><br><br>
        </div>
        <div align="center">
            <label for="password">Password:</label>
            <input type="password" name="password"/>
        </div>

        <div align="center" style="margin-top:20px;">
           <input type="submit" name="submit" value="Submit">
        </div>	

    </form>

</div>
<!--Login Form ......................................-->
	
		
			
				
						
</div>	

	
	

	</body>
</html>








