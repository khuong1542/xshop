<?php 
    $error = [];
    if (empty($name)) {
        $error['name'] = 'Tên sách không được để trống';
    }
    // if (empty($price)) {
    //     $error['price'] = 'Giá không được để trống';
    // }
    // elseif ($price <=0 ) {
    //     $error['price'] = 'Giá phải lớn hơn 0';
    // }
    // if ($percent < 0 ) {
    //     $error['percent'] = 'Giảm giá min 0%';
    // }
    // elseif ($percent > 100 ) {
    //     $error['percent'] = 'Giảm giá max 100%';
    // }
    
?>