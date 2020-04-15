<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}

$owner = (new ownerMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').' владельца';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="list-owner.php">Владельцы</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-user.php" method="POST">
            <?php require_once '_formUser.php'; ?>



            <div class="form-group">
                <label>адресс</label>
                <input type="text" class="form-control" name="adress"  value="<?=$owner->adress;?>">
            </div>

            <div class="form-group">
                <label>телефон</label>
                <input type="text" class="form-control" name="telephone"  value="<?=$owner->telephone;?>">
            </div>


            <div class="form-group">
                <button type="submit" name="saveOwner" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>