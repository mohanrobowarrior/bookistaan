<?php

if (isset($_GET["id"]) && $_GET["action"] === "edit") {

    $editId = $_GET["id"];

    require_once 'db.php';

    $db = new Database();
    $editData = $db->getSingleBook($editId);

}

?>
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
                                <div class="col-md-8 offset-2">
                                    <div class="card">
                                        <form class="form-horizontal" action="action.php" method="post">
                                            <div class="card-header"><strong>Edit Book</strong></div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="bookname">Book Name</label>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="id" value="<?php echo (int)$editData[0]["id"]?>">
                                                        <input class="form-control" id="bookname" type="text" name="editbookname" value="<?php echo $editData[0]["bookTitle"]; ?>" placeholder="Enter Book Name..">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="author">Author</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="author" type="text" name="editauthor" value="<?php echo $editData[0]["author"]; ?>" placeholder="Enter Author Name..">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="isbn">ISBN</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="isbn" type="text" name="editisbn" value="<?php echo $editData[0]["isbn"]; ?>" placeholder="Enter ISBN..">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-sm btn-primary" type="submit" name="update">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
