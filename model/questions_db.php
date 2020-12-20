<?php

function get_users_questions ($userId) {
    global $db;

    $query = 'SELECT * FROM questions WHERE ownerid = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}

function get_all_questions () {
    global $db;

    $query = 'SELECT * FROM questions';
    $statement = $db->prepare($query);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}

function create_question ($title, $body, $skills, $ownerid) {
    global $db;

    $cdate = date("Y-m-d-h:m:s");

    $q = 'SELECT * FROM accounts WHERE id = :ownerid';
    $s1 = $db->prepare($q);
    $s1->bindValue(':ownerid', $ownerid);
    $s1->execute();
    $val = $s1->fetch();


    $query = 'INSERT INTO questions (owneremail, ownerid, createddate, title, body, skills) VALUES (:email, :ownerid, :cdate, :title, :body, :skills)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $val['email']);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->bindValue(':cdate', $cdate);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);

    $statement->execute();
    $statement->closeCursor();
}

function delete_question ($questionId) {
    global $db;

    $query = 'DELETE FROM questions WHERE id = :questionId';
    $statement = $db->prepare($query);
    $statement->bindValue(':questionId', $questionId);
    $statement->execute();
    $statement->closeCursor();
}