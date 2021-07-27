<?php
    include "../connection.php";

    $val = $_GET['value'];

    $query = "SELECT `course_name`, `price`, `description`, `pict`, teachers.name AS teach_name, lang.name AS lang_name FROM courses, teachers, lang WHERE course_id = $val AND teach_id = teacher_id AND courses.lang_id = lang.lang_id";
    $result = mysqli_query($link, $query);

    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="../lib/jquery-3.4.1.js"></script>
    <script src="../js/course.js"></script>
    <title><?php echo $row['course_name'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main_page">
        <img src="../pict/<?php echo $row['pict'] ?>">
        <div class="three_text">
            <div class="name"><?php echo $row['course_name'] ?></div>
            <div class="char">
                Язык: <?php echo $row['lang_name'] ?><br>
                Преподаватель: <?php echo $row['teach_name']?><br>
                Цена: <?php echo $row['price'] ?>
            </div>
            <div class="description"><?php echo $row['description'] ?></div>
            <br><br><br><br>
            <button id="back"class="but_style">На главную</button>
        </div>
    </div>
</body>