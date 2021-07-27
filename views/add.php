<?php
    session_start();

    if($_SESSION['role'] < 1){
        header("Location: index.php");
    }

    include "../models/teach.php";
    include "../models/lang.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Добавление курса</title>
    <script src="../lib/jquery-3.4.1.js"></script>
    <script src="../js/add.js"></script>
</head>
<body>
    <h1>Добавление курса</h1>
    Название курса: <input type="text" id="name" placeholder="Название книги">
    <br><br>
    Учитель:
    <select id="teach">
        <?php
            foreach($teachs as $teach){
                echo "<option value='".$teach['teach_id']."'>".$teach['name']."</option>";
            }
        ?>
    </select>
    <br><br>
    Язык:
    <select id="lang">
        <?php
            foreach($langs as $lang){
                echo "<option value='".$lang['lang_id']."'>".$lang['name']."</option>";
            }
        ?>
    </select>
    <br><br>
    Цена: <input type="number" id="price" placeholder="Цена">
    <br><br>
    Описание курса:<br>
    <textarea id="desc" placeholder="Введите краткое описание курса" cols="50" rows="15"></textarea>
    <br><br>

    <div id="out"></div>
    <button id="add_btn">Добавить курс</button>
    <br><br>
    <button id="add_something">Добавить учителя или язык</button>
    <!--<br><br>
    <button id="back">Вернуться на главную</button>-->
</body>