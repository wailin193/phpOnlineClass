<?php

interface Animal{
    function say();

}

class Dog implements Animal{
    public function say(){
        echo "Wok Wok <br>";
    }
}

class Cat implements Animal{
    public function say(){
        echo "Mew Mew <br>";
    }
}

$c = new Cat();
$c->say();

$d = new Dog();
$d->say();