<?php
require_once 'autoload.php';

$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$autor = (new autorMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').' автора';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="list-autor.php">Авторы</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>

    <div class="box-body">
        <form action="save-user.php" method="POST">
            <?php require_once '_formUser.php'; ?>



            <div class="form-group">
                <label>инфо</label>
                <input type="text" class="form-control" name="info" value="<?=$autor->info;?>">
            </div>

            <div class="form-group">
                <label>образование</label>
                <input type="text" class="form-control" name="education" value="<?=$autor->education;?>">
            </div>



            <div class="form-group">
                <button type="submit" name="saveAutor" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>