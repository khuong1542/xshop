<?php
function make_query($connect){
    $query = "SELECT * FROM sliders WHERE `status` = 0 ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($connect, $query);
    return $result;
}
function make_slide_indicators($connect){
    $ouput = '';
    $count = 0;
    $result = make_query($connect);
    while($row = mysqli_fetch_array($result)){
        if ($count == 0) {
            $ouput .= '<li data-target="#carousel-example-1z" data-slide-to="'.$count.'" class="active"></li>';
        }else{
            $ouput .= '<li data-target="#carousel-example-1z" data-slide-to="'.$count.'"></li>';
        }
        $count = $count + 1;
    }
    return $ouput;
}
function make_sliders($connect){
    $ouput = '';
    $count = 0;
    $result = make_query($connect);
    while($row = mysqli_fetch_array($result)){
        if ($count == 0) {
            $ouput .= '<div class="carousel-item active">';
        }else{
            $ouput .= '<div class="carousel-item">';
        }
        $ouput .= '<img class="d-block w-100" src="'.BASE.'dist/img/sliders/'.$row['image'].'"
        alt="Second slide">
        <div class="carousel-caption"><h3>'.$row['name'].'</h3></div>
        </div>';
        $count = $count + 1;
    }
    return $ouput;
}