<?php
    include "../connection.php";

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $name=$data['name'];
    $email = $data['email'];
    //$email = "konmitnik@gmail.com";
    $pass = $data['pass'];

    $query = "SELECT * FROM users";
    $result = mysqli_query($link, $query);

    $is = true;

    while($row = $result->fetch_assoc()){
        if($email == $row['email']){
            $is = false;
            $data = "Null";
        }
    }

    if($is){
        $query = "INSERT INTO users VALUES (NULL, '$name', '$email', '$pass', 0)";
        $result = mysqli_query($link, $query);

        if(!$result){
            $data = "Null";
        }
    }

    echo json_encode($data);
?>