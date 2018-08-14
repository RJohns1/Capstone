<?php

include 'dbconnect.php';


function logging() {
    $db = dbconnect();
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $stmt = $db->prepare("SELECT * FROM user_data WHERE email = '$email'");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "This account does not exist";
    }

    foreach ($results as $row) {
        if ($password != $row['password']) {
            echo "Email or Password is incorrect";
        } else {
            echo "Account exists";
        }
    }
}

?>
