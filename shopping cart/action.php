
<?php

//action.php

session_start();

if(isset($_POST["action"]))
{
 if($_POST["action"] == "add")
 {
  $product_id = $_POST["product_id"];
  $product_name = $_POST["product_name"];
  $product_price = $_POST["product_price"];
  for($count = 0; $count < count($product_id); $count++)
  {
   $cart_product_id = array_keys($_SESSION["shopping_cart"]);
   if(in_array($product_id[$count], $cart_product_id))
   {
    $_SESSION["shopping_cart"][$product_id[$count]]['product_quantity']++;
   }
   else
   {
    $item_array = array(
     'product_id'               =>     $product_id[$count],  
     'product_name'             =>     $product_name[$count],
     'product_price'            =>     $product_price[$count],
     'product_quantity'         =>     1
    );

    $_SESSION["shopping_cart"][$product_id[$count]] = $item_array;

    
   }
  }
 }

 if($_POST["action"] == 'remove')
 {
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
   if($values["product_id"] == $_POST["product_id"])
   {
    unset($_SESSION["shopping_cart"][$keys]);
   }
  }
 }
 if($_POST["action"] == 'empty')
 {
  unset($_SESSION["shopping_cart"]);
 }
}

?>
