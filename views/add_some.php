<?php
    session_start();

    if($_SESSION['role'] < 1){
        header("Location: add.php");
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Добавить что-то</title>
    <script src="../lib/jquery-3.4.1.js"></script>
    <script src="../js/add_some.js"></script>
</head>
<body>
    <select id="vybor">
        <option value="0">Что вы хотите добавить</option>
        <option value="1">Учитель</option>
        <option value="2">Язык</option>
    </select>
    <br><br>
    Имя учителя/языка: <input type="text" id="name">
    <br><br>
    <div id="out"></div>
    <br><br>
    <button id="add">Добавить</button>
    <button id="back">Вернуться</button>
</body>