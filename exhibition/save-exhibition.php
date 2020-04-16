<?php
require_once 'autoload.php';

if (isset($_POST['exhibition_id'])) {
    $exhibition = new exhibition();
    $exhibition->exhibition_id = Helper::clearInt($_POST['exhibition_id']);

    $exhibition->name = Helper::clearString($_POST['name']);
    $exhibition->hall_id = Helper::clearInt($_POST['hall_id']);
    $exhibition->date = Helper::clearString($_POST['date']);
    $exhibition->adress = Helper::clearString($_POST['adress']);
    $exhibition->type_exhibition_id = Helper::clearInt($_POST['type_exhibition_id']);


    if ((new exhibitionMap())->save($exhibition)) {
        header('Location: view-exhibition.php?id=' . $exhibition->exhibition_id);
    } else {
        if ($exhibition->exhibition_id) {
            header('Location: add-exhibition.php?id=' . $exhibition->exhibition_id);
        } else {
            header('Location: add-exhibition.php');
        }
    }

}