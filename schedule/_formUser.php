<?php
$userMap = new UserMap();
$user = $userMap->findById($id);
?>

<div class="form-group">
    <label>Имя</label>
    <input type="text" class="form-control" name="name" required="required" value="<?=$user->name;?>">
</div>


<div class="form-group">
    <label>Пол</label>
    <select class="form-control" name="gender_id">
        <?= Helper::printSelectOptions($user->gender_id, $userMap->arrGenders());?>
    </select>
</div>

<div class="form-group">
    <label>Дата рождения</label>
    <input type="date" class="form-control" name="birthday" value="<?=$user->birthday;?>">
</div>

<input type="hidden" name="user_id" value="<?=$id;?>"/>