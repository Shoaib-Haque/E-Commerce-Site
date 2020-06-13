<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php")?>
	
<div>
    <h1 align="center">Contact Us</h1>
	<h4 align="center"><?php display_message();?></h4>
</div>

<!--Contact Field ..........................................-->
<form action="" method="post">
<?php send_message();?>

    <div style="float: left;">

        <div>
            <input placeholder="Your Name *" name="name" id="name" onblur="validation()" type="text" size="70">
			<font color="red"><label id="name_err"></label></font>
        </div>
        <div style="margin-top:10px;">
            <input placeholder="Your Email *" name="email" id="email" onblur="validation()" type="text" size="70">
			<font color="red"><label id="email_err"></label></font>
        </div>
        <div style="margin-top:10px;">
            <input placeholder="Your Subject *" name="subject" type="text" size="70">
        </div>

		 <div style="margin-top:10px;">
            <textarea placeholder="Your Message *" name="message" rows="5" cols="14" style="width: 430px; height: 48px;"></textarea>
        </div>
    </div>
<!--
    <div style="float: right;">

        <div>
            <textarea placeholder="Your Message *" name="message" rows="5" cols="14" style="width: 430px; height: 48px;"></textarea>
        </div>

    </div>		
	-->	
<!--Contact Field ............................................-->
    
<!--button***********************************-->
<div align="center">
    <input style="margin-top:200px; margin-left:-100px;" type="submit" name="send" value="Send Message">
</div>	
<!--button***********************************-->
</form>		
<script src="validation.js"></script>
 <?php include(TEMPLATE_FRONT . DS . "footer.php")?> 








