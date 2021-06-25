<?php

require 'helper.php';
require 'db.php';

$db = new Database();

if (isset($_POST["submit"])) {
//    echo "<pre>";
//    print_r($_POST);exit();
    $bookName = test_input($_POST["bookname"]);
    $author = test_input($_POST["author"]);
    $isbn = test_input($_POST["isbn"]);

    if (empty($bookName) || empty($author) || empty($isbn)) {
        header("Location:index.php?error=emptyfields&bookname=".$bookName."&author=".$author."&isbn=".$isbn);
        exit();
    }

    $db->addBook($bookName, $author, $isbn);
    header("Location:index.php?success=msg");
    exit();
}

if (isset($_POST["update"])) {
//    echo "<pre>";
//    print_r($_POST);exit();
    $bookID = test_input($_POST["bookID"]);
    $editBookName = test_input($_POST["editbookname"]);
    $editAuthor = test_input($_POST["editauthor"]);
    $editISBN = test_input($_POST["editisbn"]);

    $db->updateBook($bookID, $editBookName, $editAuthor, $editISBN);
    header("Location:index.php?success=updateMsg");
    exit();
}