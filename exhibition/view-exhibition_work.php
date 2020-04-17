<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $exhibition_work = (new exhibition_workMap())->findViewById($id);
    $header = 'Просмотр работ выставок';
    require_once 'template/header.php';
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                        <li><a href="list-exhibition_work.php">Работы выставок</a></li>
                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">
                    <a class="btn btn-success" href="add-exhibition_work.php?id=<?=$id;?>">Изменить</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">


                        <tr>
                            <th>Выставка</th>
                            <td><?=$exhibition_work->exhibition_id;?></td>
                        </tr>
                        <tr>
                            <th>Автор</th>
                            <td><?=$exhibition_work->user_id;?></td>
                        </tr>
                        <tr>
                            <th>Работа</th>
                            <td><?=$exhibition_work->work_id;?></td>
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