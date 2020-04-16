<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}


$exhibitionMap = new exhibitionMap();
$count = $exhibitionMap->count();
$exhibitions = $exhibitionMap->findAll($page*$size-$size, $size);
$header = 'Список выставок';
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

                    <a class="btn btn-success" href="add-exhibition.php">Добавить зал</a>

                </div>
                <div class="box-body">
                    <?php
                    if ($exhibitions) {
                        ?>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Зал</th>
                                <th>Дата</th>
                                <th>адрес</th>
                                <th>Тип зала</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($exhibitions as $exhibition) {
                                echo '<tr>';
                                echo '<td><a href="view-exhibition.php?id='.$exhibition->exhibition_id.'">'.$exhibition->name.'</a> '. '<a href="add-exhibition.php?id='.$exhibition->exhibition_id.'"><i class="fa fa-pencil"></i></a></td>';
                                echo '<td>'.$exhibition->hall_id.'</td>';
                                echo '<td>'.$exhibition->date.'</td>';
                                echo '<td>'.$exhibition->adress.'</td>';
                                echo '<td>'.$exhibition->type_exhibition_id.'</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одной выставки не найдено';
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