<?php
    include "../connection.php";

    $met = $_GET['select'];
    $name = $_GET['name'];

    switch($met){
        case "1":
            $query = "INSERT INTO `teachers`(`teach_id`, `name`) VALUES (NULL,'$name')";
            break;
        case "2":
            $query = "INSERT INTO `lang`(`lang_id`, `name`) VALUES (NULL,'$name')";
            break;
    }

    //echo $query;

    $result = mysqli_query($link, $query);

    if($result){
        echo "Добавлено";
    } else {
        echo "Не добавлено";
    }
?>