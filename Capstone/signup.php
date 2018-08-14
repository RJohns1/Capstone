<?php

include 'dbconnect.php';

function signup() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM user_data ORDER BY id DESC LIMIT 1");
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "ERROR";
    }
    foreach ($results as $row) {
        $id = $row['id'];
    }

    $stmt = $db->prepare("INSERT INTO user_data SET id = :id, email = :email, password = :password, security_question = :security_question, security_answer = :security_answer");

    $id = $id + 1;
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $security_question = filter_input(INPUT_POST, 'security_question');
    $security_answer = filter_input(INPUT_POST, 'security_answer');

    $info = array(
        ":id" => $id,
        ":email" => $email,
        ":password" => md5($password),
        ":security_question" => $security_question,
        ":security_answer" => $security_answer
    );

    if ($stmt->execute($info) && $stmt->rowCount() > 0) {
        $results = 'Data Added';
    }
    echo $results;
}
?>