<?php
    session_start();

    include "../models/courses.php";
    include "../models/lang.php";
    include "../models/teach.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="../lib/jquery-3.4.1.js"></script>
    <script src="../js/main.js"></script>
    <title>Онлайн-курсы иностранных языков Leran Lang</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <div id="top">
        <div class="center">
            Learn Lang
        </div>
        <div class="right_user">
            <?php
                if(!isset($_SESSION['role']) && $_SESSION['role'] == ""){
                    echo "<button id='enter' class='but_style'>Войти</button>";
                } else {
                    echo "Здравствуйте, ".$_SESSION['name']."!<br>";
                    if($_SESSION['role'] >= 1) {
                        echo "<button id='add' class='but_style'>Добавить курс</button>";
                        echo "<button id='update' class='but_style'>Обновить курс</button>";
                        if($_SESSION['role'] == 2) {
                            echo "<button id='delete' class='but_style'>Удалить курс</button>";
                        }
                    }
                    echo "<button id='unset' class='but_style'>Выйти</button>";
                }
            ?>
        </div>
    </div>

    <div class="selector">
        <select id="lang">
            <option value="0">Все языки</option>
            <?php
                $i = 1;
                foreach($langs as $lang){
                    echo "<option value='".$lang['lang_id']."'>".$lang['name']."</option>";
                    $i++;
                }
            ?>
        </select>
        <select id="teach">
            <option value="0">Все учителя</option>
            <?php
                foreach($teachs as $teach){
                    echo "<option value='".$teach['teach_id']."'>".$teach['name']."</option>";
                }
            ?>
        </select>
        <input type="text" id="search_name" placeholder="Поиск по названию курса">
        <button id="search_btn" class="but_style">Поиск</button>
    </div>
 
    <div class="catalog">
        <?php
            $i = 1;
            foreach($courses as $course){
                if($i == 1 || $i % 4 == 1){
                    echo "<div class='rows'>";
                }
                echo "<div class='good'>";
                echo "<img src='../pict/".$course['pict']."'>";
                echo "<p>".$course['course_name']."</p>";
                echo "<p>".$course['price']." руб.</p>";
                echo "<button value='".$course['course_id']."' class='but but_style'>Подробнее</button>";
                echo "</div>";
                if($i % 4 == 0){
                    echo "</div>";
                }
                $i++;
            }
        ?>
    </div>
</body>