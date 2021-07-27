<?php
    include "../connection.php";

    $course = $_GET['course'];

    $query = "DELETE FROM courses WHERE course_id = $course";
    $result = mysqli_query($link, $query);

    if($result){
        echo "Курс удален";
    } else {
        echo "Не удалось удалить курс";
    }
?>