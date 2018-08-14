<?php

include 'dbconnect.php';

function recovery() {
    $db = dbconnect();
    $email = $_POST["email"];
    $security_question = $_POST["security_question"];
    $security_answer = $_POST["security_answer"];

    $stmt = $db->prepare("SELECT * FROM user_data WHERE email = '$email'");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "This account does not exist";
    }

    foreach ($results as $row) {
        if ($security_question != $row['security_question']) {
            echo "ERROR: Security Questionis invalid";
        } else {
            if ($security_answer != $row['security_answer']) {
                echo "ERROR: Security Answer is invalid";
            } else {
                echo "<form action=# method=POST>";
                echo "<input type=text name=password><br />";
                echo "<input type=submit name=submit value=reset><br />";
                echo "<form/>";
            }
        }   
    }
    return $email;
}

function password_reset() {
    $db = dbconnect();
    $email = recovery();
    echo $email;
    $password = $_POST["password"];

    $stmt = $db->prepare("UPDATE user_data SET password = $password WHERE email = $email");
}

?>