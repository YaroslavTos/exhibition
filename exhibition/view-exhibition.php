<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $exhibition = (new exhibitionMap())->findViewById($id);
    $header = 'Просмотр выставок';
    require_once 'template/header.php';
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                        <li><a href="list-exhibition.php">Выставки</a></li>
                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">
                    <a class="btn btn-success" href="add-exhibition.php?id=<?=$id;?>">Изменить</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">


                        <tr>
                            <th>Название</th>
                            <td><?=$exhibition->name;?></td>
                        </tr>
                        <tr>
                            <th>Зал</th>
                            <td><?=$exhibition->hall_id;?></td>
                        </tr>
                        <tr>
                            <th>Дата</th>
                            <td><?=$exhibition->date;?></td>
                        </tr>
                        <tr>
                            <th>Адресс</th>
                            <td><?=$exhibition->adress;?></td>
                        </tr>

                        <tr>
                            <th>Тип зала</th>
                            <td><?=$exhibition->type_exhibition_id;?></td>
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