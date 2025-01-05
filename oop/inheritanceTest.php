<?php

class Person{
    private $name,$age;

    public function __construct($name,$age){
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function display(){
        echo "$this->name, $this->age <br>";
    }
}

class Teacher extends Person{
    private $job;
    public function __construct($name,$age,$job){
        parent::__construct($name,$age); //********** */
        $this->job = $job;
    }

    public function getJob(){
        return $this->job;
    }

    public function setJob($job){
        $this->job = $job;
    }

    public function display(){
        $n = parent::getName();
        $a = parent::getAge();
        echo "$n, $a, $this->job <br>";
    }
}

class Student extends Person{
    private $major;
    public function __construct($name,$age,$major){
        parent::__construct($name,$age); //********** */
        $this->major = $major;
    }

    public function getMajor(){
        return $this->major;
    }

    public function setMajor($major){
        $this->major = $major;
    }

    public function display(){
        $n = parent::getName();
        $a = parent::getAge();
        echo "$n, $a, $this->major <br>";
    }
}