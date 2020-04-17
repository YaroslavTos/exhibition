<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}

$exhibition_work = (new exhibition_workMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' работу выставки';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-exhibition_work.php">Работы выставок</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-exhibition_work.php" method="POST">


            <div class="form-group">
                <label>Выставка</label>
                <select class="form-control" name="exhibition_id">
                    <?= Helper::printSelectOptions($exhibition_work->exhibition_id, ( new exhibitionMap())->arrEx());?>
                </select>
            </div>

            <div class="form-group">
                <label>Автор</label>
                <select class="form-control" name="user_id">
                    <?= Helper::printSelectOptions($exhibition_work->user_id, (new autorMap())->arrUser2());?>
                </select>
            </div>

            <div class="form-group">
                <label>Работа</label>
                <select class="form-control" name="work_id">
                    <?= Helper::printSelectOptions($exhibition_work->work_id, (new workMap())->arrWork());?>
                </select>
            </div>




            <div class="form-group">
                <button type="submit" name="saveExhibition_work" class="btn btn-primary">Сохранить</button>
            </div>
            <input type="hidden" name="exhibition_work_id" value="<?=$id;?>"/>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>