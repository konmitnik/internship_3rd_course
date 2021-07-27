<?php
    include "../connection.php";

    $query = "SELECT `course_id`, `course_name`, `price`, `pict`, `course_id` FROM `courses`";
    $result = mysqli_query($link, $query);

    $courses = [];
    while($course = mysqli_fetch_assoc($result)){
        $courses[] = $course;
    }
?>