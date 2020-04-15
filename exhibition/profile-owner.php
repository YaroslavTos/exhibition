<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}

$header = 'Профиль владельца';
$owner = (new ownerMap())->findProfileById($id);
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Профиль владельца</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

                        <li><a href="list-owner.php">Владельцы</a></li>

                        <li class="active">Профиль</li>
                    </ol>
                </section>
                <div class="box-body">
                    <a class="btn btn-success" href="add-owner.php?id=<?=$id;?>">Изменить</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <?php require_once '_profile.php';?>


                        <tr>
                            <th>Адресс</th>
                            <td><?=$owner->adress;?></td>
                        </tr>
                        <tr>
                            <th>Телефон</th>
                            <td><?=$owner->telephone;?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>