<?php

    $id = $_GET['id'];

    include('../class/news.class.php');

    $newsObject = new News();
    $newsObject->set('id', $id);
    $status = $newsObject->delete();
    session_start();
    if($status == 'success') {
        $_SESSION['message'] = "Category Deleted Successfully!";
    } else {
        $_SESSION['message'] = "Failed to Delete Cateogory!";
        header('location:listNews.php');
    }

?>