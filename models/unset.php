<?php
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    header("Location: ../views/");
?>