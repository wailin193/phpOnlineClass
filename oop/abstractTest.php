<?php
abstract class Shape{
    protected $color;

    public function __construct($color){
        $this->color = $color;
    }

    abstract function calArea();

    abstract function toString();
}

class Rechangle extends Shape{
    private $length, $width;

    public function __construct($length, $width,$color){
        $this->color=$color;
        $this->length = $length;
        $this->width = $width;
    }

    function calArea(){
        $l = $this->length;
        $w = $this->width;
        return $l*$w;
    }

    function toString(){
        return "$this->color rectangle, length is $this->length and width is $this->width.";
    }
}

class Triangle extends Shape{
    private $base, $height;

    public function __construct($base, $height,$color){
        $this->color=$color;
        $this->base = $base;
        $this->height = $height;
    }

    function calArea(){
        $b = $this->base;
        $h = $this->height;
        return 1/2*$b*$h;
    }

    function toString(){
        return "$this->color triangle, base is $this->base and height is $this->height.";
    }
}


$arr = array();

array_push($arr, new Rechangle(13,12,"red"));
array_push($arr, new Triangle(12,10,"green"));
array_push($arr, new Rechangle(5,10,"blue"));


foreach($arr as $shape){
    echo $shape->toString()."<br>";
    echo "Area is ".$shape->calArea()."<br>";
}

