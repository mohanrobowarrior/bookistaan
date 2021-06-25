<?php

require 'config.php';

class Database extends Config
{
    public function addBook($bookname, $author, $isbn) {
        $stmt = $this->conn->prepare("INSERT INTO book(bookTitle, author, isbn) VALUES (:bookname, :author, :isbn)");
        $stmt->execute([
           "bookname" => $bookname,
           "author" => $author,
           "isbn" => $isbn
        ]);

        return true;
    }

    public function getBook()
    {
        $stmt = $this->conn->query("SELECT * FROM book ORDER BY id DESC ");
        return $stmt->fetchAll();
    }

    public function getSingleBook($id)
    {
        $stmt = $this->conn->query("SELECT * FROM book WHERE id = {$id} LIMIT 1");
        return $stmt->fetchAll();
    }

    public function updateBook($id, $editBookName, $editAuthor, $editISBN) {
         return $this->conn->query("UPDATE book SET bookTitle='$editBookName', author='$editAuthor', isbn='$editISBN' WHERE id=$id");
    }

    public function deleteBook($id) {
        return $this->conn->query("DELETE FROM book WHERE id = $id");
    }
}