<?php
require_once 'autoload.php';

$size = 1;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
}
else {
    $page = 1;
}
$autorMap = new autorMap();
$count = $autorMap->count();
$autors = $autorMap->findAll($page*$size-$size,$size);
$header = 'Список авторов';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Список авторов</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                        <li class="active">Список авторов</li>
                    </ol>
                </section>
                <div class="box-body">
                    <a class="btn btn-success" href="add-autor.php">Добавить автора</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if ($autors) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Пол</th>
                                <th>Дата рождения</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($autors as $autor) {
                                echo '<tr>';
                                echo '<td><a href="profile-autor.php?id='.$autor->user_id.'">'.$autor->name.'</a> '. '<a href="add-$autor.php?id='.$autor->user_id.'"><i class="fa fa-pencil"></i></a></td>';

                                echo '<td>'.$autor->gender.'</td>';

                                echo '<td>'.$autor->birthday.'</td>';
                                echo '<td>'.$autor->info.'</td>';
                                echo '<td>'.$autor->education.'</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одного автора не найдено';
                    } ?>
                </div>
                <div class="box-body">
                    <?php Helper::paginator($count, $page,$size); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>