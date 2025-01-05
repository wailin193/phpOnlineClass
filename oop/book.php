<?php
namespace code;
    class Book{
        private $title, $author, $price,$publisher,$no;
        private static $noOfBooks =0;

        public function __construct($title,$author,$price,$publisher,$no)
        {
            $this->title = $title;
            $this->author = $author;
            $this->price = $price;
            $this->publisher = $publisher;
            $this->no = $no;

            Book::$noOfBooks += $no;
        }

        public function displayInfo(){
            echo "$this->title, $this->author, $this->price, $this->publisher, $this->no <br>";
        }

        public static function getNoOfBooks(){
            return Book::$noOfBooks;
        }

        public function setPublisher($publisher){
            $this->publisher = $publisher;
        }

        public function getPublisher(){
            return $this->publisher;
        }
    }

    // $book1 = new Book("The Hittler","NOName",3000,"American",200);
    // // $book1->setPublisher("DEF");
    // echo $book1->getPublisher()."<br>";

    // $book2 = new Book("The Advengers","Marvel",2500,"USA",500);

    // $book1->displayInfo();
    // $book2->displayInfo();

    // echo Book::getNoOfBooks();

?>