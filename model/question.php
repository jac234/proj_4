<?php

class Question {
    private $id, $owneremail, $ownerid, $createddate, $title, $body, $skills, $score;

    public function __construct($id, $owneremail, $ownerid, $createddate, $title, $body, $skills, $score){
        $this->id =$id;
        $this->owneremail =$owneremail;
        $this->ownerid =$ownerid;
        $this->createddate =$createddate;
        $this->title =$title;
        $this->body =$body;
        $this->skills =$skills;
        $this->score =$score;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getOwneremail()
    {
        return $this->owneremail;
    }

    public function setOwneremail($owneremail)
    {
        $this->owneremail = $owneremail;
    }

    public function getOwnerid()
    {
        return $this->ownerid;
    }

    public function setOwnerid($ownerid)
    {
        $this->ownerid = $ownerid;
    }

    public function getCreateddate()
    {
        return $this->createddate;
    }

    public function setCreateddate($createddate)
    {
        $this->createddate = $createddate;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getSkills()
    {
        return $this->skills;
    }

    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }
}