<?php
function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}
function get_product($con, $limit='', $cat_id='', $product_id='', $search_str=''){
    $sql="select product.*,categories.categories from product,categories where product.status=1 ";
    if($cat_id!=''){
        $sql.=" and product.categories_id=$cat_id ";
    }
    if($product_id!=''){
        $sql.=" and product.id=$product_id ";
    }
    $sql.=" and product.categories_id=categories.id ";
    $sql.=" order by product.id desc";
    if($limit!=''){
        $sql .= " limit $limit";
    }   
    //echo $sql;
    $res=mysqli_query($con, $sql);
    $data=array();
    while($row=mysqli_fetch_array($res)){
        $data[]=$row;
    }
    return $data;
 }
?>
<!-- or product.description like '%$search_str%' -->