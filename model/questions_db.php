<?php

class QuestionsDB{
    public static function get_users_questions ($userId) {
        $db = Database::getDB();

        $query = 'SELECT * FROM questions WHERE ownerid = :userId';
        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();

        $questions = $statement->fetchAll();
        $statement->closeCursor();

        foreach ($questions as $q){
            $question = new Question($q['id'], $q['owneremail'], $q['ownerid'], $q['createddate'], $q['title'], $q['body'], $q['skills'], $q['score']);

        }
        return $questions;
    }

    public static function get_all_questions () {
        $db = Database::getDB();

        $query = 'SELECT * FROM questions';
        $statement = $db->prepare($query);
        $statement->execute();

        $questions = $statement->fetchAll();
        $statement->closeCursor();

        foreach ($questions as $q){
            $question = new Question($q['id'], $q['owneremail'], $q['ownerid'], $q['createddate'], $q['title'], $q['body'], $q['skills'], $q['score']);
            $question->setId($q['id']);
        }
        return $questions;
    }

    public static function create_question ($title, $body, $skills, $ownerid) {
        $db = Database::getDB();

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

    public static function delete_question ($questionId) {
        $db = Database::getDB();

        $query = 'DELETE FROM questions WHERE id = :questionId';
        $statement = $db->prepare($query);
        $statement->bindValue(':questionId', $questionId);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function view_question ($questionId) {
        $db = Database::getDB();

        $query = 'SELECT * FROM questions WHERE id = :questionId';
        $statement = $db->prepare($query);
        $statement->bindValue(':questionId', $questionId);
        $statement->execute();

        $question = $statement->fetchAll();
        $statement->closeCursor();

        foreach ($question as $q){
            $question = new Question($q['id'], $q['owneremail'], $q['ownerid'], $q['createddate'], $q['title'], $q['body'], $q['skills'], $q['score']);

        }
        return $question;
    }
}