<?php
    session_start();

    if($_SESSION['role'] < 1){
        header("Location: index.php");
    }

    include "../models/courses.php";
    include "../models/teach.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Обновить курса</title>
    <script src="../lib/jquery-3.4.1.js"></script>
    <script src="../js/update.js"></script>
</head>
<body>
    <h1>Обновление курса</h1>
    <select id="course">
        <?php
            foreach($courses as $course){
                echo "<option value='".$course['course_id']."'>".$course['course_name']."</option>";
            }
        ?>
    </select>
    <br><br>
    Цена: <input type="number" id="price">
    <br><br>
    Учитель: 
    <select id="teach">
            <option value="0">Не обновлять</option>
        <?php
            foreach($teachs as $teach){
                echo "<option value='".$teach['teach_id']."'>".$teach['name']."</option>";
            }
        ?>
    </select>
    <br><br>
    Описание:<br>
    <textarea id="desc" cols="50" rows="15" placeholder="Введите новое описание"></textarea>
    <br><br>
    <div id="out"></div>
    <button id="update_btn">Обновить курс</button><br>
    <button id="back">Вернуться на главную</button>
</body>