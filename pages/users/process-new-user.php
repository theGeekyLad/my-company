<?php
    $conn = new mysqli("localhost", "root", "", "my-company");
        
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $q = 'insert into users values ("' . $_POST['name'] . '", "' . $_POST['phone'] . '", "' . $_POST['email'] . '")';
    $result = $conn->query($q);

    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
    $uri .= $_SERVER['HTTP_HOST'];
    header('Location: '.$uri.'/my-company/pages/users/users.php');
    exit;
    
    $conn->close();
?>