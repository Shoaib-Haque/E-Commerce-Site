<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php")?>

<div>
    <h1 align="left">E-SHOP</h1>
</div>
<!--Transaction...............................-->
<div align="center">
    <table border="1" width="340px" height="400px">
	<form role="form" action="thank_you.php" method="post">
        <tr>
            <td align="center" valign="top">
            
            <h2 align="">Payment Details</h2><hr>
            <label>Card Number</label><br>
            <input size="30px" type="text"><br><br>
            <label>Amount</label><br>
            <input size="30px" type="text" placeholder="TAKA" name="amt"><br><br>
            <label>Currency</label><br>
            <input size="30px" type="text" value="BAN" name="cc"><br><br>
            <label>Transaction</label><br>
            <input size="30px" type="text" value="4123" name="tx"><br><br><hr><br>
            <a href="thank_you.php"><input type="submit" name="payment" value="Process Payment"></a>
            
            
            
            </td>
        </tr>
		</form>
    </table>
</div>
<!--Transaction...............................-->


	
		    
 
			
 <?php include(TEMPLATE_FRONT . DS . "footer.php")?>







