<?php
require_once 'autoload.php';

if (isset($_POST['hall_id'])) {
    $hall = new hall();
    $hall->hall_id = Helper::clearInt($_POST['hall_id']);

    $hall->name = Helper::clearString($_POST['name']);
    $hall->area = Helper::clearString($_POST['area']);
    $hall->adress = Helper::clearString($_POST['adress']);
    $hall->telephone = Helper::clearString($_POST['telephone']);

    $hall->user_id = Helper::clearInt($_POST['user_id']);


    if ((new hallMap())->save($hall)) {
        header('Location: view-hall.php?id=' . $hall->hall_id);
    } else {
        if ($hall->hall_id) {
            header('Location: add-hall.php?id=' . $hall->hall_id);
        } else {
            header('Location: add-hall.php');
        }
    }

}