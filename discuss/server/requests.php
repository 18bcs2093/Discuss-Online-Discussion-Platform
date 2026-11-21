<?php
session_start();
include("../common/db.php");
if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $address = $_POST['address'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email";
        exit;
    }
    if (strlen($password) > 8) {
        echo "Password must be below 8 characters";
        exit;
    }



    $query = "Select * from users where email='$email'";
    $result = $conn->query($query);   
    if ($result->num_rows == 1){
        echo "User already registered";
        exit;
    }else{
        $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
        );

        $user = $conn->prepare(
            "Insert into users 
            (id,username,email,password,address)
            values(NULL,'$username','$email','$hashedPassword','$address');"
        );

        $result = $user->execute();
        if ($result) {
            $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
            header("location: /discuss");
        }
    }


} else if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = "";
    $user_id = 0;

    $query = "Select * from users where email='$email'";
    $result = $conn->query($query);

    if($result->num_rows == 1){
        foreach ($result as $row) {
            $username = $row['username'];
            $user_id = $row['id'];
            $hashedPassword = $row['password'];
        }
        if (password_verify($password, $hashedPassword)) {
            $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
            header("location: /discuss");
        }else{
            echo "Password incorrect";
            exit;
        }
    }else{
        echo "User not registered";
        exit;
    }
} else if(isset($_GET['logout'])){

    session_unset();
    session_destroy();

    header("Location: ../");
    exit();

} else if (isset($_POST['ask'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];
 
    $question = $conn->prepare(
        "Insert into questions 
        (id,title,description,category_id,user_id)
        values(NULL,'$title','$description','$category_id','$user_id');"
    );

    $result = $question->execute();
    // $question->insert_id;
    if ($result) {
        header("location: /discuss");
    } else {
        echo "Question not added to website";
    }
} else if (isset($_POST['answer'])) {

    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    $query = $conn->prepare(
        "Insert into answers 
        (id,answer,question_id,user_id)
        values(NULL,'$answer','$question_id','$user_id');"
    );

    $result = $query->execute();
    if ($result) {
        header("location: /discuss?q-id=$question_id");
    } else {
        echo "Answer not submitted";
    }
} else if (isset($_GET['delete'])) {
    $qid = $_GET['delete'];
    $query = $conn->prepare("delete from questions where id=$qid");
    $query1= $conn->prepare("delete from answers where question_id=$qid");
    $query1->execute();
    $result = $query->execute();
    if ($result) {
        header("location: /discuss");
    } else {
        echo "Question is not deleted";
    }
}
