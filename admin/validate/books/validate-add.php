<?php 
    $error = [];
    if (empty($name)) {
        $error['name'] = 'Tên sách không được để trống';
    }
    if (empty($image)) {
        $error['image'] = 'Ảnh không được để trống';
    }
    if (empty($price)) {
        $error['price'] = 'Giá không được để trống';
    }
    // if (is_numeric($price)) {
    //     $error['price'] = 'Giá không là kí tự số';
    // }
    elseif ($price <=0 ) {
        $error['price'] = 'Giá phải lớn hơn 0';
    }
    if ($sale < 0 ) {
        $error['sale'] = 'Giảm giá min 0%';
    }
    elseif ($sale > 100 ) {
        $error['sale'] = 'Giảm giá max 100%';
    }
    
?>