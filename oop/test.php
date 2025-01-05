<?php
    namespace code;
    include("book.php");

    $book1 = new Book("The Hittler","NOName",3000,"American",200);
    // $book1->setPublisher("DEF");
    echo $book1->getPublisher()."<br>";

    $book2 = new Book("The Advengers","Marvel",2500,"USA",500);

    $book1->displayInfo();
    $book2->displayInfo();

    echo Book::getNoOfBooks();