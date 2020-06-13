<?php update_product();?>
<?php

if(isset($_GET['id'])){
    $product_id=escape_string($_GET['id']);
    $query=query("SELECT * FROM products WHERE product_id=$product_id ");
    confirm($query);
    while($row=fetch_array($query)){
        
        $product_title=escape_string($row['product_title']);
        $product_category_id=escape_string($row['product_category_id']);
        $product_price=escape_string($row['product_price']);
        $product_description=escape_string($row['product_description']);
        $product_quantity=escape_string($row['product_quantity']);
       // $product_image=escape_string($row['product_image']);
        $product_image=display_image($row['product_image']);//FUNCTION CALL FOR DISPLAY IMAGE....
  
    }
}


?>
<div  align="center"  style="width: 740px;">
    <h1>Edit PRODUCT</h1>
</div>
  

 <div style="width: 780px; float:left">


<!--Contact Field ..........................................-->
<form action="" method="post" enctype="multipart/form-data"> <!----upload photo we need enctype---->
<div>
    <div style="float: left; margin-left:132px;">

        <div>
            <label>Product Title</label><br>
            <input type="text" name="product_title" size="57px" value="<?php echo $product_title;?> ">
        </div>
        <br>
        <div>
            <label>Product Description</label><br>
            <textarea rows="5" cols="14" name="product_description" style="width: 430px; height: 48px;"><?php echo $product_description?></textarea>
        </div>
        <div style="margin-top:15px;">
            <label>Product Price</label><br>
            <input type="text" name="product_price" size="25px" value="<?php echo $product_price?>">
        </div>
		
        <div style="margin-top:15px;">
            <label>Product Category</label><br>
             <select name="product_category_id" id="" class="form-control">
			 <option value="<?php echo $product_category_id;?>"><?php echo show_product_category_title($product_category_id);//FUNCTION CALL FOR SHOW CATEGORY TITLE.....;?></option>
           <?php show_categories_add_product_page();?>
           
        </select>
        </div>
		
        <div style="margin-top:15px;">
            <label>Product Quantity</label><br>
            <input type="text" name="product_quantity" size="25px" value="<?php echo $product_quantity;?>"
        </div>
        <div style="margin-top:15px;">
            <label>Product Image</label><br>
            <input type="file" name="image">
			<img width="100" src="../img/<?php echo $product_image;?>" alt="">
        </div>
        <div align="center" style="margin-top:30px;">
            <input type="submit" name="update" value="Update">
        </div>	

    </div>
		
</div>	
</form>	
<!--Contact Field ............................................-->

</div>
	
		    

			

