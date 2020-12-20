<?php
require('model/database.php');
require('model/accounts_db.php');
require('model/questions_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'display_login';
    }
}

switch ($action) {
    case 'display_login': {
        include('views/login.php');
        break;
    }

    case 'validate_login': {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $conditions_met = 1;

        //Cant be empty & contains @ character
        if (strlen($email) == 0){
            $error = 'Email cannot be left empty';
            $conditions_met = 0;
        }
        if (strpos($email, "@") != TRUE){
            $error = 'Email must contain @ symbol';
            $conditions_met = 0;
        }

        //Cant be empty & at least 8 character
        if ((strlen($password) == 0)){
            $error = 'Password should not be left empty';
            $conditions_met = 0;
        }elseif ((strlen($password) < 8)){
            $error = 'Password must contain at least 8 characters';
            $conditions_met = 0;
        }

        if ($conditions_met == 0) {
            include('errors/error.php');
        } else {
            $userId = validate_login($email, $password);
            if ($userId == false) {
                header('Location: index.php?action=display_registration');
            } else {
                header("Location: .?action=display_questions&userId=$userId");
            }
        }

        break;
    }

    case 'display_registration': {
        include('views/registration.php');
        break;
    }

    case 'register':{
        $userId = filter_input(INPUT_POST, 'userId');
        $email = filter_input(INPUT_POST, 'email');
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $birthday = filter_input(INPUT_POST, 'birthday');
        $password = filter_input(INPUT_POST, 'password');

        $conditions_met = 1;
        //Cant be empty
        if (strlen($fname) == 0) {
            $error = 'First name should not be left empty';
            $conditions_met = 0;
        }

        //Cant be empty
        if (strlen($lname) == 0){
            $error = 'Last name should not be left empty';
            $conditions_met = 0;
        }

        //Cant be empty
        if (strlen($birthday) == 0) {
            $error = 'Birthday should not be left empty';
            $conditions_met = 0;
        }

        //Cant be empty & contains @ character
        if (strlen($email) == 0){
            $error = 'Email should not be left empty';
            $conditions_met = 0;
        }elseif (strpos($email, "@") != TRUE){
            $error = 'Email should contain @ character';
            $conditions_met = 0;
        }

        //Cant be empty & at least 8 character
        if ((strlen($password) == 0)){
            $error = 'Password should not be left empty';
            $conditions_met = 0;
        }elseif ((strlen($password) < 8)){
             $error = 'Password must be atleast 8 characters long';
            $conditions_met = 0;
        }

        if ($conditions_met ==0) {
            include('errors/error.php');
        } else {
            register_new_user($email, $fname, $lname, $birthday, $password);
            header("Location: .?action=display_questions&userId=$userId");
        }
        break;
    }

    case 'display_questions': {
        $userId = filter_input(INPUT_GET, 'userId');
        $listType = filter_input(INPUT_GET, 'listType');


        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=display_login');
        } else {
            $questions = ($listType === 'all') ?
                get_all_questions() : get_users_questions($userId);
            include('views/display_questions.php');
        }
        break;
    }

    case 'display_question_form': {
        $userId = filter_input(INPUT_GET, 'userId');

        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=display_login');
        } else {
            include('views/question_form.php');
        }
        break;
    }

    case 'display_new_question':{
        break;
    }

    case 'create_new_question': {
        $userId = filter_input(INPUT_POST, 'userId');
        $email = filter_input(INPUT_POST, 'email');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');

        $conditions_met = 1;


        //Cant be empty & contains at least 3 char
        if (strlen($title) == 0){
            $error = 'Title should not be left empty';
            $conditions_met = 0;
        }
        if (strlen($title) < 3){
            $error = 'Title should be 3 characters or longer';;
            $conditions_met = 0;
        }

        //At least 2 skills must be entered, display in an array if conditions are met
        $s = explode(",", $skills);

        if ((count($s) == 0) or (count($s) <2)){
            $error = '2 or more skills should be included';
            $conditions_met = 0;
        }

        //Cant be empty & contains at most 500 char
        if (strlen($body) == 0){
            $error = 'Body should not be left empty';
            $conditions_met = 0;
        }elseif (strlen($body) > 500){
            $error = 'Body should contain at most 500 characters';
            $conditions_met = 0;
        }

        if ($conditions_met ==0) {
            include('errors/error.php');
        } else {
            create_question($title, $body, $skills, $userId);
            header("Location: .?action=display_questions&userId=$userId");
        }

        break;
    }

    case 'delete_question': {
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = filter_input(INPUT_POST, 'userId');
        if ($questionId == NULL || $userId == NULL) {
            $error = 'All Fields are required';
            include('errors/error.php');
        } else {
            delete_question($questionId);
            header("Location: .?action=display_questions&userId=$userId");
        }
    }

    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }
}