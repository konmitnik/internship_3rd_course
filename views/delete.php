<?php
    session_start();

    if($_SESSION['role'] != 2){
        header("Location: index.php");
    }

    include "../models/courses.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Удалить книгу</title>
    <script src="../lib/jquery-3.4.1.js"></script>
    <script src="../js/delete.js"></script>
</head>
<body>
    <h1>Удаление курса</h1>
    <select id="course">
        <?php
            foreach($courses as $course){
                echo "<option value='".$course['course_id']."'>".$course['course_name']."</option>";
            }
        ?>
    </select>
    <div id="out"></div>
    <button id="delete_btn">Удалить курс</button><br>
    <button id="back">Вернуться на главную</button>
</body>