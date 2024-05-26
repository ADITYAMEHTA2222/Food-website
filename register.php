<?php

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $passwword = $_POST['password']; 
    $cfpass = $_POST['cfpass'];
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'my_database');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("Insert into new_user(firstname, lastname, email, password,cfpass)
            values(?,?,?,?,?)");
        $stmt->bind_param("sssss", $firstName, $lastname, $email, $password, $cfpass);
        $stmt->execute();
        echo "Registration Successful";
        $stmt->close();
        $conn->close();
    }
?>