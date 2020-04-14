<?php

$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$exhibition_work = (new Exhibition_workMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').' работы';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="list-teacher.php">работы</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>

    <div class="box-body">
        <form action="save-user.php" method="POST">
            <?php require_once '_formUser.php'; ?>

            <div class="form-group">
                <label>выставка</label>
                <select class="form-control" name="exhibition_id">
                    <?= Helper::printSelectOptions($exhibition->exhibition_id, (new exhibitionMap())->arrExhibition());?>
                </select>
            </div>

            <div class="form-group">
                <label>автор</label>
                <select class="form-control" name="autor_id">
                    <?= Helper::printSelectOptions($autor->otdel_id, (new autorMap())->arrAutor());?>
                </select>
            </div>

            <div class="form-group">
                <label>работа</label>
                <select class="form-control" name="work_id">
                    <?= Helper::printSelectOptions($work->work_id, (new workMap())->arrWork());?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" name="saveTeacher" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>