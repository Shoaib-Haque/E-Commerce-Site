<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php")?>
<div>
    <h1 align="center">Login</h1>
	<h4 align="center"><?php display_message();?></h4>
  
</div>

<!--Login Form ......................................-->
<div>

    <form action="login.php" method="post">
	<?php login_user();?>
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
	
		
			
				
						
 <?php include(TEMPLATE_FRONT . DS . "footer.php")?>





