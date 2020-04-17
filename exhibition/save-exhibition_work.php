<?php
require_once 'autoload.php';

if (isset($_POST['exhibition_work_id'])) {
    $exhibition_work = new exhibition_work();
    $exhibition_work->exhibition_work_id = Helper::clearInt($_POST['exhibition_work_id']);


    $exhibition_work->exhibition_id = Helper::clearInt($_POST['exhibition_id']);
    $exhibition_work->user_id = Helper::clearInt($_POST['user_id']);
    $exhibition_work->work_id = Helper::clearInt($_POST['work_id']);



    if ((new exhibition_workMap())->save($exhibition_work)) {
        header('Location: view-exhibition_work.php?id=' . $exhibition_work->exhibition_work_id);
    } else {
        if ($exhibition_work->exhibition_work_id) {
            header('Location: add-exhibition_work.php?id=' . $exhibition_work->exhibition_work_id);
        } else {
            header('Location: add-exhibition_work.php');
        }
    }

}