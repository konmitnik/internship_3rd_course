<?php
    include "../connection.php";

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $course = $data['course'];
    $price = $data['price'];
    $teach = $data['teach'];
    $desc = $data['desc'];

    $query = "UPDATE courses SET ";
    if($price != ""){
        $query .= "price = $price, ";
    } else {
        $query .= "price = price, ";
    }
    if($teach != "0"){
        $query .= "teacher_id = $teach, ";
    } else {
        $query .= "teacher_id = teacher_id, ";
    }
    if($desc != ""){
        $query .= "description = '$desc' ";
    } else {
        $query .= "description = description ";
    }
    $query .= "WHERE course_id = $course";
    //echo $query;

    $result = mysqli_query($link, $query);

    if($result){
        echo "Информация обновлена";
    } else {
        echo "Не удалось обновить информацию";
    }
?>