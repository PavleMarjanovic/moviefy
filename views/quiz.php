<?php
session_start();
include "../php/connection.php";
if(isset($_POST['submitButton']))
{
    $response = $_POST['response'];
    $userID = $_SESSION['user']->id_user;

    try
    {
        $id = "";
        $insertQuiz = "INSERT INTO quiz (id_quiz, response, id_user) VALUES (:id, :response, :user)";
        $stmtQuiz = $konekcija->prepare($insertQuiz);
        $stmtQuiz->bindParam(":id", $id);
        $stmtQuiz->bindParam(":response", $response);
        $stmtQuiz->bindParam(":user", $userID);
        $stmtQuiz->execute();

    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}
?>