<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}

$hall = (new hallMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' залл';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-hall.php">Залы</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-hall.php" method="POST">

            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name" required="required" value="<?=$hall->name;?>">
            </div>
            <div class="form-group">
                <label>Размер зала</label>
                <input type="text" class="form-control" name="area" required="required" value="<?=$hall->area;?>">
            </div>
            <div class="form-group">
                <label>Адрес</label>
                <input type="text" class="form-control" name="adress" required="required" value="<?=$hall->adress;?>">
            </div>
            <div class="form-group">
                <label>Телефон</label>
                <input type="text" class="form-control" name="telephone" required="required" value="<?=$hall->telephone;?>">
            </div>

            <div class="form-group">
                <label>Владелец</label>
                <select class="form-control" name="user_id">
                    <?= Helper::printSelectOptions($hall->user_id, (new ownerMap())->arrUser());?>
                </select>
            </div>




            <div class="form-group">
                <button type="submit" name="saveHall" class="btn btn-primary">Сохранить</button>
            </div>
            <input type="hidden" name="hall_id" value="<?=$id;?>"/>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>