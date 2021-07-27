<?php
    include "../connection.php";
    session_start();

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $name = $data['name'];
    $teach = $data['teach'];
    $lang = $data['lang'];
    $price = $data['price'];
    $pict = $_SESSION['name_pic'];
    $desc = $data['description'];

    /*echo $_SESSION['name_pic'];
    echo $pict;*/

    $query = "INSERT INTO `courses`(`course_id`, `course_name`, `price`, `teacher_id`, `lang_id`, `description`, `pict`) VALUES (NULL, '$name', $price, $teach, $lang, '$desc', '$pict')";
    $result = mysqli_query($link, $query);

    if($result){
        echo "Курс добавлен";
    } else {
        echo "Не удалось добавить курс";
        unset($_SESSION['name_pic']);
    }
?>