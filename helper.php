<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    return $data;
}

function showMessage($className, $msg) {

    $format = '<div class="alert alert-%s">
                <strong>%s!</strong>
            </div>';
    echo sprintf($format, $className, $msg);
}