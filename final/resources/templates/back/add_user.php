
<?php add_user();?>
<div  align="center"  style="width: 740px;">
    <h1>ADD USER</h1>
</div>
  

 <div style="width: 780px; float:left">
<h3 class="bg-success"><?php display_message();?></h3>

<!--Contact Field ..........................................-->
<form action="" method="post" enctype="multipart/form-data"> <!----upload photo we need enctype---->
<div>
    <div style="float: left; margin-left:132px;">

        <div>
            <label>Username</label><br>
            <input type="text" name="username" size="40px"><?php echo  $username_verify;?>
        </div>
        <div style="margin-top:15px;">
            <label>Email</label><br>
            <input name="email" type="text" size="40px"><?php echo  $email_verify;?>
        </div>
        <div style="margin-top:15px;">
            <label>Password</label><br>
            <input type="password" name="password" size="40px"><?php echo  $password_verify;?>
        </div>
        <div align="center" style="margin-top:30px;">
            <input type="submit" name="submit" value="submit">
        </div>	

    </div>
		
</div>	
</form>	
<!--Contact Field ............................................-->

</div>
	
		    





