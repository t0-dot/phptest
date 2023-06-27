<?php
$json = file_get_contents('products.json');

$json_data = json_decode($json,true);
$total_sum_for_phone_and_laptop = 0;
$total_count_of_graphics_card =0;
$list_of_name_of_phone = '';
foreach($json_data as $key => $value) {
   $total_sum_for_phone_and_laptop +=$value['category']=="Phone" || $value['category']== "Laptop" ?$value['price_in_pence']:0;
   $total_count_of_graphics_card +=$value['category'] =="Graphics Card"?1:0;
   $list_of_name_of_phone .=$value['category'] =="Phone"?$value["name"].',':"";   
}

$total_sum = (array_sum(array_column($json_data, 'price_in_pence')))/240;
$total_sum_for_phone_and_laptop /=240;
$result = array("Total sum of prices in pound"=>$total_sum,"Total sum of prices for phones and laptops in pound"=>$total_sum_for_phone_and_laptop,"Total no of graphics card"=>$total_count_of_graphics_card,"comma separated list of names of phone"=>rtrim($list_of_name_of_phone, ","));
print_r($result);
?>

