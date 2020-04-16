<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $hall = (new hallMap())->findViewById($id);
    $header = 'Просмотр залов';
    require_once 'template/header.php';
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                        <li><a href="list-hall.php">Залы</a></li>
                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">
                    <a class="btn btn-success" href="add-hall.php?id=<?=$id;?>">Изменить</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">


                        <tr>
                            <th>Название</th>
                            <td><?=$hall->name;?></td>
                        </tr>
                        <tr>
                            <th>Размер зала</th>
                            <td><?=$hall->area;?></td>
                        </tr>
                        <tr>
                            <th>Адресс</th>
                            <td><?=$hall->adress;?></td>
                        </tr>
                        <tr>
                            <th>Телефон</th>
                            <td><?=$hall->telephone;?></td>
                        </tr>


                        <tr>
                            <th>Владелец</th>
                            <td><?=$hall->user_id;?></td>
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