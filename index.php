<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">

    <title>Bookistaan</title>
</head>
<body class="c-app">
    <div class="c-wrapper">
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <h1 class="text-center display-4 mb-3">BOOKISTAAN</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <form class="form-horizontal" action="action.php" method="post">
                                        <div class="card-header"><strong>Add Book</strong></div>
                                        <div class="card-body">
                                            <?php
                                                include 'helper.php';

                                                if (isset($_GET["error"]) && $_GET["error"] === "emptyfields") {
                                                    showMessage("danger", "Please fill all fields");

                                                } elseif (isset($_GET["success"]) && $_GET["success"] === "msg") {
                                                    showMessage("success", "Book added successfully");
                                                }
                                            ?>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="bookname">Book Name</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="bookname" type="text" name="bookname" value="<?php if (isset($_GET["bookname"])){ echo $_GET["bookname"]; }?>" placeholder="Enter Book Name..">
                                                    </div>
                                                </div><br>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="author">Author</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="author" type="text" name="author" value="<?php if (isset($_GET["author"])){ echo $_GET["author"]; }?>" placeholder="Enter Author Name..">
                                                    </div>
                                                </div><br>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="isbn">ISBN</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="isbn" type="text" name="isbn" value="<?php if (isset($_GET["isbn"])){ echo $_GET["isbn"]; }?>" placeholder="Enter ISBN..">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-sm btn-primary" type="submit" name="submit"> Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>All Book</strong></div>
                                    <div class="card-body">
                                        <?php
                                            if (isset($_GET["action"]) && $_GET["action"] === "delete") {
                                                header("Location:index.php?msg=deleteRecord");
                                            }

                                            if (isset($_GET["msg"]) && $_GET["msg"] === "deleteRecord") {
                                                showMessage("success", "Book deleted successfully");
                                            }

                                            if (isset($_GET["success"]) && $_GET["success"] === "updateMsg") {
                                                showMessage("success", "Book updated successfully");
                                            }
                                        ?>
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Book Name</th>
                                                <th>Author</th>
                                                <th>ISBN</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                require 'db.php';
                                                $db = new Database();
                                                $books = $db->getBook();

                                                $output = "";
                                                if ($books) {
                                                    $i = 1;
                                                    foreach ($books as $book) {
                                                        $output .= '<tr>
                                                                        <td>' . $i++ . '</td>
                                                                        <td>' . $book["bookTitle"] . '</td>
                                                                        <td>' . $book["author"] . '</td>
                                                                        <td>' . $book["isbn"] . '</td>
                                                                        <td><a href="edit.php?id=' . $book["id"] . '&action=edit" class="btn btn-success">Edit</a></td>
                                                                        <td><a href="index.php?id=' . $book["id"] . '&action=delete" class="btn btn-danger">Delete</a></td>
                                                                    </tr>';
                                                    }
                                                    echo $output;
                                                } else {
                                                    echo $output .= '<tr>
                                                                        <td colspan="2">No record found!</td>
                                                                    </tr>';
                                                }

                                                if (isset($_GET["id"]) && !empty($_GET["id"]) && $_GET["action"] === "delete") {
                                                    $db->deleteBook($_GET["id"]);
                                                }

                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

<!-- Optional JavaScript -->
<!-- Popper.js first, then CoreUI JS -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
</body>
</html>