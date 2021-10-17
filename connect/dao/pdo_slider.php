<?php 
function select_all_slider(){
    $result = "SELECT * from `sliders`";
    return executeQuery($result);
}
function select_one_slider($id){
    $result = "SELECT * from `sliders` where id =?";
    return pdo_query_one($result, $id);
}