<?php
    include "../connection.php";

    $query = "SELECT * FROM `teachers`";
    $result = mysqli_query($link, $query);

    $teachs = [];
    while($teach = mysqli_fetch_assoc($result)){
        $teachs[] = $teach;
    }
?>