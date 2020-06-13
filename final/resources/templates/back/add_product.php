
<div  align="center"  style="width: 740px;">
    <h1>ADD PRODUCT</h1>
	<h4><font color="red"><?php display_message();?></font></h4>
</div>
<?php add_product();?>
  

 <div style="width: 780px; float:left">
 

<!--Contact Field ..........................................-->
<form action="" method="post" enctype="multipart/form-data"> <!----upload photo we need enctype---->
<div>
    <div style="float: left; margin-left:132px;">

        <div>
            <label>Product Title</label><br>
            <input type="text" name="product_title" size="57px">
        </div>
        <br>
        <div>
            <label>Product Description</label><br>
            <textarea name="product_description" rows="5" cols="14" style="width: 430px; height: 48px;"></textarea>
        </div>
        <div style="margin-top:15px;">
            <label>Product Price</label><br>
            <input name="product_price" type="text" size="25px">
        </div>
        <div style="margin-top:15px;">
            <label>Product Category</label><br>
             <select name="product_category_id" id="" class="form-control">
           <?php show_categories_add_product_page();?>
           
        </select>
        </div>
        <div style="margin-top:15px;">
            <label>Product Quantity</label><br>
            <input type="number" name="product_quantity" size="25px">
        </div>
        <div style="margin-top:15px;">
            <label for="image">Product Image</label><br>
            <input type="file" name="image">
        </div>
        <div align="center" style="margin-top:30px;">
            <input type="submit" name="publish" value="Publish">
        </div>	

    </div>
		
</div>	
</form>	
<!--Contact Field ............................................-->

</div>
	
		    





