<?php
    session_start();

    include "../connection.php";

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $email = $data['email'];
    $pass = $data['pass'];

    $query = "SELECT name, role FROM users WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($link, $query);

    if($result){
        $user = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
    }

    echo json_encode($user);
?>