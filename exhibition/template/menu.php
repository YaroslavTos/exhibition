<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li
                <?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':'';?>>
                <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>
            </li>
            <li class="header">Пользователи</li>
            <li <?=($_SERVER['PHP_SELF']=='/list-owner.php')?'class="active"':'';?>>
                <a href="list-owner.php"><i class="fa fa-users"></i><span>владельцы</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-autor.php')?'class="active"':'';?>>
                <a href="list-autor.php"><i class="fa fa-users"></i><span>участники</span></a>
            </li>


            <li class="header">выставки</li>
            <li <?=($_SERVER['PHP_SELF']=='/list-work.php')?'class="active"':'';?>>
                <a href="list-gruppa.php"><i class="fa fa-users"></i><span>работы</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-hall.php')?'class="active"':'';?>>
                <a href="list-otdel.php"><i class="fa fa-users"></i><span>залы</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-exhibition.php')?'class="active"':'';?>>
                <a href="list-special.php"><i class="fa fa-users"></i><span>выставки</span></a>
            </li>

            <li <?=($_SERVER['PHP_SELF']=='/list-classroom.php')?'class="active"':'';?>>
                <a href="list-classroom.php"><i class="fa fa-users"></i><span>работы на выставках</span></a>
            </li>


        </ul>
    </section>
</aside>