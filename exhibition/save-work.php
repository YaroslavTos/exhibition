<?php
require_once 'autoload.php';

if (isset($_POST['work_id'])) {
    $work = new work();
    $work->work_id = Helper::clearInt($_POST['work_id']);
    $work->name = Helper::clearString($_POST['name']);
    $work->user_id = Helper::clearInt($_POST['user_id']);
    $work->date_create = Helper::clearString($_POST['date_create']);
    $work->execution = Helper::clearString($_POST['execution']);
    $work->height = Helper::clearString($_POST['height']);
    $work->width = Helper::clearString($_POST['width']);
    $work->volume = Helper::clearString($_POST['volume']);

    if ((new workMap())->save($work)) {
        header('Location: view-work.php?id=' . $work->work_id);
    } else {
        if ($work->work_id) {
            header('Location: add-work.php?id=' . $work->work_id);
        } else {
            header('Location: add-work.php');
        }
    }

}