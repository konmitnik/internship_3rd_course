<?php
    include "../connection.php";

    $query = "SELECT * FROM `lang`";
    $result = mysqli_query($link, $query);

    $langs = [];
    while($lang = mysqli_fetch_assoc($result)){
        $langs[] = $lang;
    }
?>