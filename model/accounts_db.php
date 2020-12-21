<?php

class AccountsDB {
    public static function validate_login($email, $password){
        $db = Database::getDB();
        $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();

        if (count($user) > 0){
            $user = new Account($user['id'], $user['email'], $user['fname'], $user['lname'], $user['birthday'], $user['password']);
            return $user;
        }else{
            return false;
        }
    }

    public static function register_new_user($email, $fname, $lname, $birthday, $password){
        $db = Database::getDB();
        $query = "INSERT INTO accounts (email, fname, lname, birthday, password) VALUES (:email, :fname, :lname, :birthday, :password)";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':birthday', $birthday);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }
}

