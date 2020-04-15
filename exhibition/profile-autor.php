<?php
require_once 'autoload.php';


$header = 'Профиль автора';
$autor = (new autorMap())->findProfileById($id);
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Профиль автора</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

                        <li><a href="list-autor.php">автор</a></li>

                        <li class="active">Профиль</li>
                    </ol>
                </section>
                <div class="box-body">
                    <a class="btn btn-success" href="add-autor.php?id=<?=$id;?>">Изменить</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">

                        <?php require_once '_profile.php';?>

                        <tr>
                            <th>инфо</th>
                            <td><?=$autor->info;?></td>
                        </tr>

                        <tr>
                            <th>образование</th>
                            <td><?=$autor->education;?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>