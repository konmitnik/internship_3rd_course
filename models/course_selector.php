<?php
    include "../connection.php";

    $teach = $_GET['teach'];
    $lang = $_GET['lang'];
    $search = $_GET['text'];

    $query = "SELECT `course_id`, `course_name`, `price`, `pict` FROM `courses` WHERE 1 ";
    if($teach != 0){
        $query .= " AND teacher_id = $teach";
    }
    if($lang != 0){
        $query .= " AND lang_id = $lang";
    }
    if($search != ''){
        $query .= " AND course_name LIKE '%$search%'";
    }

    //echo $query;
    
    $result = mysqli_query($link, $query);

    $books = [];
    while($book = mysqli_fetch_assoc($result)){
        $books[] = $book;
    }

    echo json_encode($books);
?>