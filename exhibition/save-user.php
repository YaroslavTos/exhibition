<?php
require_once 'autoload.php';

if (isset($_POST['user_id'])) {
    $user = new user();


    $user->name = Helper::clearString($_POST['name']);
    $user->birthday = Helper::clearString($_POST['birthday']);
    $user->gender_id = Helper::clearInt($_POST['gender_id']);


    if (isset($_POST['saveAutor'])) {
        $autor = new autor();
        $autor->info = Helper::clearString($_POST['info']);
        $autor->education = Helper::clearString($_POST['education']);
        $autor->user_id = $user->user_id;
        if ((new autorMap())->save($user, $autor)) {
            header('Location: profile-autor.php?id='.$autor->user_id);
        }
        else {
            if ($autor->user_id) {
                header('Location: add-autor.php?id='.$autor->user_id);
            }
            else {
                header('Location: add-autor.php');
            }
        }
        exit();
    }

    elseif (isset($_POST['saveOwner'])) {
        $owner = new owner();
        $owner->adress = Helper::clearString($_POST['adress']);
        $owner->telephone = Helper::clearString($_POST['telephone']);
        $owner->user_id = $user->user_id;
        if ((new ownerMap())->save($user, $owner)) {
            header('Location: profile-owner.php?id='.$owner->user_id);
        }
        else {
            if ($owner->user_id) {
                header('Location: add-owner.php?id='.$owner->user_id);
            }
            else {
                header('Location: add-owner.php');
            }
        }
        exit();
    }




}
