
<?php
//index.php
?>
<!DOCTYPE html>
<html>
 <head>
  <title>PHP Ajax Shopping Cart by using Bootstrap Popover</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .popover
  {
      width: 100%;
      max-width: 800px;
  }
  </style>
 </head>
 <body>
  <div class="container">
   <br />
   <h3 align="center"><a href="#">PHP Ajax Shopping Cart with Add Multiple Item into Cart</a></h3>
   <br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-6">Cart Details</div>
      <div class="col-md-6" align="right">
       <button type="button" name="clear_cart" id="clear_cart" class="btn btn-warning btn-xs">Clear</button>
      </div>
     </div>
    </div>
    <div class="panel-body" id="shopping_cart">

    </div>
   </div>

   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-6">Product List</div>
      <div class="col-md-6" align="right">
       <button type="button" name="add_to_cart" id="add_to_cart" class="btn btn-success btn-xs">Add to Cart</button>
      </div>
     </div>
    </div>
    <div class="panel-body" id="display_item">

    </div>
   </div>
  </div>
 </body>
</html>

<script>  
$(document).ready(function(){

 load_product();

 load_cart_data();
    
 function load_product()
 {
  $.ajax({
   url:"fetch_item.php",
   method:"POST",
   success:function(data)
   {
    $('#display_item').html(data);
   }
  });
 }

 function load_cart_data()
 {
  $.ajax({
   url:"fetch_cart.php",
   method:"POST",
   success:function(data)
   {
    $('#shopping_cart').html(data);
   }
  });
 }

 $(document).on('click', '.select_product', function(){
  var product_id = $(this).data('product_id');
  if($(this).prop('checked') == true)
  {
   $('#product_'+product_id).css('background-color', '#f1f1f1');
   $('#product_'+product_id).css('border-color', '#333');
  }
  else
  {
   $('#product_'+product_id).css('background-color', 'transparent');
   $('#product_'+product_id).css('border-color', '#ccc');
  }
 });

 $('#add_to_cart').click(function(){
  var product_id = [];
  var product_name = [];
  var product_price = [];
  var action = "add";
  $('.select_product').each(function(){
   if($(this).prop('checked') == true)
   {
    product_id.push($(this).data('product_id'));
    product_name.push($(this).data('product_name'));
    product_price.push($(this).data('product_price'));
   }
  });

  if(product_id.length > 0)
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, action:action},
    success:function(data)
    {
     $('.select_product').each(function(){
      if($(this).prop('checked') == true)
      {
       $(this).attr('checked', false);
       var temp_product_id = $(this).data('product_id');
       $('#product_'+temp_product_id).css('background-color', 'transparent');
       $('#product_'+temp_product_id).css('border-color', '#ccc');
      }
     });

     load_cart_data();
     alert("Item has been Added into Cart");
    }
   });
  }
  else
  {
   alert('Select atleast one item');
  }

 });

 $(document).on('click', '.delete', function(){
  var product_id = $(this).attr("id");
  var action = 'remove';
  if(confirm("Are you sure you want to remove this product?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{product_id:product_id, action:action},
    success:function()
    {
     load_cart_data();
     alert("Item has been removed from Cart");
    }
   })
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  var action = 'empty';
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function()
   {
    load_cart_data();
    alert("Your Cart has been clear");
   }
  });
 });
    
});

</script>

