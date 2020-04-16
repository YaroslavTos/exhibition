<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}

$exhibition = (new exhibitionMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' выставку';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-exhibition.php">Выставки</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-exhibition.php" method="POST">

            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name" required="required" value="<?=$exhibition->name;?>">
            </div>

            <div class="form-group">
                <label>Зал</label>
                <select class="form-control" name="hall_id">
                    <?= Helper::printSelectOptions($exhibition->hall_id, (new hallMap())->arrhall());?>
                </select>
            </div>

            <div class="form-group">
                <label>Дата</label>
                <input type="date" class="form-control" name="date" required="required" value="<?=$exhibition->date;?>">
            </div>
            <div class="form-group">
                <label>Адрес</label>
                <input type="text" class="form-control" name="adress" required="required" value="<?=$exhibition->adress;?>">
            </div>

            <div class="form-group">
                <label>Тип зала</label>
                <select class="form-control" name="type_exhibition_id">
                    <?= Helper::printSelectOptions($exhibition->type_exhibition_id, ( new type_exhibitionMap())->arrtype());?>
                </select>
            </div>






            <div class="form-group">
                <button type="submit" name="saveExhibition" class="btn btn-primary">Сохранить</button>
            </div>
            <input type="hidden" name="exhibition_id" value="<?=$id;?>"/>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>