<?php

include("inheritanceTest.php");

// $stu = new Student("Mg Mg",25, "EC");
// $stu->display();

$arr = array();

array_push($arr,new Person("Ag Ag",12));
array_push($arr,new Teacher("Daw Daw",35,"Tutor"));
array_push($arr,new Student("Aye Aye",15,"IT"));

foreach($arr as $obj) {
    $obj->display();
}