<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}


$hallMap = new hallMap();
$count = $hallMap->count();
$halls = $hallMap->findAll($page*$size-$size, $size);
$header = 'Список залов';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-hall.php">Добавить зал</a>

                </div>
                <div class="box-body">
                    <?php
                    if ($halls) {
                        ?>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Размер зала</th>
                                <th>адрес</th>
                                <th>телефон</th>
                                <th>Владелец</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($halls as $hall) {
                                echo '<tr>';
                                echo '<td><a href="view-hall.php?id='.$hall->hall_id.'">'.$hall->name.'</a> '. '<a href="add-hall.php?id='.$hall->hall_id.'"><i class="fa fa-pencil"></i></a></td>';

                                echo '<td>'.$hall->area.'</td>';
                                echo '<td>'.$hall->adress.'</td>';
                                echo '<td>'.$hall->telephone.'</td>';
                                echo '<td>'.$hall->user_id.'</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одного зала не найдено';
                    } ?>
                </div>
                <div class="box-body">
                    <?php Helper::paginator($count, $page,$size); ?>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>