<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $work = (new workMap())->findViewById($id);
    $header = 'Просмотр работ';
    require_once 'template/header.php';
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                        <li><a href="list-work.php">Работы</a></li>
                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">
                    <a class="btn btn-success" href="add-work.php?id=<?=$id;?>">Изменить</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Название</th>
                            <td><?=$work->name;?></td>
                        </tr>
                        <tr>
                            <th>Автор</th>
                            <td><?=$work->user_id;?></td>
                        </tr>
                        <tr>
                            <th>Дата создания</th>
                            <td><?=$work->date_create;?></td>
                        </tr>
                        <tr>
                            <th>Выполнение</th>
                            <td><?=$work->execution;?></td>
                        </tr>
                        <tr>
                            <th>Высота</th>
                            <td><?=$work->height;?></td>
                        </tr>
                        <tr>
                            <th>Ширина</th>
                            <td><?=$work->width;?></td>
                        </tr>
                        <tr>
                            <th>ОбЪем</th>
                            <td><?=$work->volume;?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
require_once 'template/footer.php';
?>