<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}

$work = (new workMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' работу';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-work.php">Работы</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-work.php" method="POST">

            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name" required="required" value="<?=$work->name;?>">
            </div>

            <div class="form-group">
                <label>Автор</label>
                <select class="form-control" name="user_id">
                    <?= Helper::printSelectOptions($work->user_id, (new userMap())->arrUser());?>
                </select>
            </div>

            <div class="form-group">
                <label>дата создания</label>
                <input type="date" class="form-control" name="adress"  value="<?=$work->date_create;?>">
            </div>
            <div class="form-group">
                <label>Выполнение</label>
                <input type="text" class="form-control" name="adress"  value="<?=$work->execution;?>">
            </div>
            <div class="form-group">
                <label>Высота</label>
                <input type="text" class="form-control" name="adress"  value="<?=$work->height;?>">
            </div>
            <div class="form-group">
                <label>Ширина</label>
                <input type="text" class="form-control" name="adress"  value="<?=$work->width;?>">
            </div>
            <div class="form-group">
                <label>Объем</label>
                <input type="text" class="form-control" name="adress"  value="<?=$work->volume;?>">
            </div>


            <div class="form-group">
                <button type="submit" name="saveWork" class="btn btn-primary">Сохранить</button>
            </div>
            <input type="hidden" name="work_id" value="<?=$id;?>"/>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>