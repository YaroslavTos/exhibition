<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}


$exhibition_workMap = new exhibition_workMap();
$count = $exhibition_workMap->count();
$exhibition_works = $exhibition_workMap->findAll($page*$size-$size, $size);
$header = 'Список работ выставок';
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

                    <a class="btn btn-success" href="add-exhibition_work.php">Добавить работу выствки</a>

                </div>
                <div class="box-body">
                    <?php
                    if ($exhibition_works) {
                        ?>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Выставка</th>
                                <th>Автор</th>
                                <th>Работа</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($exhibition_works as $exhibition_work) {
                                echo '<tr>';

                                echo '<td>'.$exhibition_work->exhibition_id.'</td>';
                                echo '<td>'.$exhibition_work->user_id.'</td>';
                                echo '<td>'.$exhibition_work->work_id.'</td>';

                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одной работы выставки не найдено';
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