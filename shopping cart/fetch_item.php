
<?php

//fetch_item.php

include('database_connection.php');

$query = "SELECT * FROM tbl_product ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '
  <div class="col-md-3" style="margin-top:12px;margin-bottom:12px;">  
            <div style="border:1px solid #ccc; border-radius:5px; padding:16px; height:300px;" align="center" id="product_'.$row["id"].'">
             <img src="images/'.$row["image"].'" class="img-responsive" /><br />
             <h4 class="text-info">
                        <div class="checkbox">
                              <label><input type="checkbox" class="select_product" data-product_id="'.$row["id"].'" data-product_name="'.$row["name"].'" data-product_price="'.$row["price"] .'" value="">'.$row["name"].'</label>
                        </div>
                  </h4>
             <h4 class="text-danger">$ '.$row["price"] .'</h4>
            </div>
        </div>
  ';
 }
 echo $output;
}

/*$output = '
<div class="col-md-3" style="margin-top:12px;">  
      <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
            <img src="https://image.ibb.co/jSR5Mn/1.jpg" class="img-responsive"><br>
            <h4 class="text-info">Samsung J2 Pro</h4>
            <h4 class="text-danger">$ 100.00</h4>
            <input type="text" name="quantity" id="quantity1" class="form-control" value="1">
            <input type="hidden" name="hidden_name" id="name1" value="Samsung J2 Pro">
            <input type="hidden" name="hidden_price" id="price1" value="100.00">
            <input type="button" name="add_to_cart" id="1" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart">
      </div>
</div>
            
            
            <div class="col-md-3" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
                  <img src="https://image.ibb.co/mt5zgn/3.jpg" class="img-responsive"><br>
                  <h4 class="text-info">Panasonic T44 Lite</h4>
                  <h4 class="text-danger">$ 125.00</h4>
                  <input type="text" name="quantity" id="quantity3" class="form-control" value="1">
                  <input type="hidden" name="hidden_name" id="name3" value="Panasonic T44 Lite">
                  <input type="hidden" name="hidden_price" id="price3" value="125.00">
                  <input type="button" name="add_to_cart" id="3" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart">
            </div>
        </div>
            
            
            <div class="col-md-3" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
                  <img src="https://image.ibb.co/b57C1n/2.jpg" class="img-responsive"><br>
                  <h4 class="text-info">HP Notebook</h4>
                  <h4 class="text-danger">$ 299.00</h4>
                  <input type="text" name="quantity" id="quantity2" class="form-control" value="1">
                  <input type="hidden" name="hidden_name" id="name2" value="HP Notebook">
                  <input type="hidden" name="hidden_price" id="price2" value="299.00">
                  <input type="button" name="add_to_cart" id="2" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart">
            </div>
        </div><div class="col-md-3" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
                  <img src="https://image.ibb.co/eDhqnS/4.jpg" class="img-responsive"><br>
                  <h4 class="text-info">Wrist Watch</h4>
                  <h4 class="text-danger">$ 85.00</h4>
                  <input type="text" name="quantity" id="quantity4" class="form-control" value="1">
                  <input type="hidden" name="hidden_name" id="name4" value="Wrist Watch">
                  <input type="hidden" name="hidden_price" id="price4" value="85.00">
                  <input type="button" name="add_to_cart" id="4" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart">
            </div>
        </div>
';

echo $output;*/

?>
