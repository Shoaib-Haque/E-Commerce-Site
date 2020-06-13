	
<?php add_category();?>
<div  align="center"  style="width: 740px;">
    <h1>Product Categories</h1>
</div>
  

 <div style="width: 780px; float:left">
<h3 class="bg-success"><?php display_message();?></h3>

<!--Contact Field ..........................................-->
<div>

    <div style="float: left; margin-left:25px;">
<form action="" method="post">
        <div>
            <label>Title</label><br>
            <input type="text" name="cat_title" size="30px">
        </div>
     
        <!--button***********************************-->
<div align="" style="margin-top:30px;">
    <input type="submit" name="add_category" value="Publish">
</div>	
<!--button***********************************-->
</form>
    </div>

    <div style="float: right;">

      
<!--ORDER Item.........................................-->	
<div>
    <table class="table" width="380">
    <hr>
    <tr>
        <th>ID</th>
        <th>Title</th>
        
    </tr>
 <?php show_categories_in_admin();?>

    </table>
</div>       
<!--order Item.........................................-->

    </div>		
</div>		
<!--Contact Field ............................................-->

</div>
	
		    
