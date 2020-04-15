<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}


$workMap = new workMap();
$count = $workMap->count();
$works = $workMap->findAll($page*$size-$size, $size);
$header = 'Список работ';
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

                    <a class="btn btn-success" href="add-work.php">Добавить работу</a>

                </div>
                <div class="box-body">
                    <?php
                    if ($works) {
                        ?>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Автор</th>
                                <th>Дата создания</th>
                                <th>Выполнение</th>
                                <th>Высота</th>
                                <th>Ширина</th>
                                <th>ОбЪем</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($works as $work) {
                                echo '<tr>';
                                echo '<td><a href="view-work.php?id='.$work->work_id.'">'.$work->name.'</a> '. '<a href="add-work.php?id='.$work->work_id.'"><i class="fa fa-pencil"></i></a></td>';
                                echo '<td>'.$work->user_id.'</td>';
                                echo '<td>'.$work->date_create.'</td>';
                                echo '<td>'.$work->execution.'</td>';
                                echo '<td>'.$work->height.'</td>';
                                echo '<td>'.$work->width.'</td>';
                                echo '<td>'.$work->volume.'</td>';

                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одной работы не найдено';
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