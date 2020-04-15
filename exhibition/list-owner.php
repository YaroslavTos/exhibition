<?php
require_once 'autoload.php';

$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
}
else {
    $page = 1;
}
$ownerMap = new ownerMap();
$count = $ownerMap->count();
$owners = $ownerMap->findAll($page*$size-$size,$size);
$header = 'Список владельцов';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Список владельцов</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                        <li class="active">Список владельцов</li>
                    </ol>
                </section>
                <div class="box-body">
                    <a class="btn btn-success" href="add-owner.php">Добавить владельца</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if ($owners) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Пол</th>
                                <th>Дата рождения</th>
                                <th>Адрес</th>
                                <th>Телефон</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($owners as $owner) {
                                echo '<tr>';
                                echo '<td><a href="profile-owner.php?id='.$owner->user_id.'">'.$owner->name.'</a> '. '<a href="add-owner.php?id='.$owner->user_id.'"><i class="fa fa-pencil"></i></a></td>';

                                echo '<td>'.$owner->gender.'</td>';

                                echo '<td>'.$owner->birthday.'</td>';
                                echo '<td>'.$owner->adress.'</td>';
                                echo '<td>'.$owner->telephone.'</td>';

                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одного владельца не найдено';
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