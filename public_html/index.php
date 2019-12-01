<?php

include_once "config.php";

global $config;

$link = mysqli_connect("localhost", $config['dbLogin'], $config['dbPass'], $config['dbName']);


$auth = false;
if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
    }
    else
    {
        $auth = true;
//        print "Привет, ".$userdata['user_login'].". Всё работает!";
    }
}

?>

<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сайт</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <!-- Logo and responsive toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <a class="navbar-brand" href="#">
                <span class="glyphicon glyphicon-globe">
                    Домахин
                </span>
            Е.В.
        </a>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php">Главная</a>
                </li>
                <li>
                    <a href="Text.php">Лекция</a>
                </li>
                <li>
                    <a href="Test.php">Тест</a>
                </li>
                <li>
                    <a href="liter.php">Список литературы</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php
                            if ($auth) {
                                echo $userdata['user_name'];
                            } else {
                                echo "Авторизация";
                            }
                        ?>
                        <span class="caret"></span>
                    </a>
                    <?php if ($auth): ?>
                    <ul class="dropdown-menu">
                        <li><a href="destroy.php">Выйти</a></li>
                    </ul>
                    <?php else: ?>
                    <ul class="dropdown-menu">
                        <li><a href="login.php">Войти</a></li>
                        <li><a href="register.php">Зарегистрироваться</a></li>
                    </ul>
                    <?php endif; ?>
                </li>
            </ul>
        </div>


        <!-- /.navbar-collapse -->
    </div>


    <!-- /.container -->
</nav>

<div class="container-fluid">

    <!-- Left Column -->
    <div class="col-sm-3">

        <!-- List-Group Panel -->
        <p><img src="images/proektirovanie.jpg" width="300" height="150"></p>

    </div><!--/Left Column-->

    <!-- Center Column -->
    <div class="col-sm-6">


        <div class="row">
            <article class="col-xs-12">
                <h2>Этапы установки сети. Hardware или устройства, необходимые для создания сети.</h2>

                <p>
                    <b> <font color="red">Установка компьютерных сетей</b></font> — сложный многоэтапный процесс.
                    В этот процесс входит проектирование, монтаж комплекснова оборудования компьютерных сетей.
                    Важным этапом в создании компьютерной сети является ее настройка, которая следует за этапами
                    создания схемы (проектирование) и установки компьютерной сети (монтаж).
                    Этапы настройки компьютерной сети
                    Настройка сети заключается в тестировании и наладке работы всех видов оборудования, которые входят в
                    ее структуру.
                </p>

                <p>
                    <b> <font color="red">Устройства(Hardware), необходимые для создания сети.</b></p>
                    <br>
                    <ul>
                        <li><font color="red">Сетевой кабель.</font> Это своего рода <font color="red">витая пара</font>,
                            используемая для прокладки локальной сети между персональными компьютерами.<br>Представляет
                            собой одну или несколько пар изолированных проводников, скрученных между собой (с небольшим
                            числом витков на единицу длины), покрытых пластиковой оболочкой.

                <p><img src="images/витая пара.jpg" width="300" height="150"></p>
                </li>
                <li><font color="red">Сетевой концентратор</font>, он же хаб(Нub). Служит для <font color="red">объединения
                    нескольких ПК</font>(персональный компьюте).<br>Устройство для объединения компьютеров в сеть <font
                        color="red">Ethernet</font> с применением кабельной инфраструктуры типа витая пара. В настоящее
                    время вытеснены сетевыми коммутаторами. Сетевые концентраторы также могли иметь разъёмы для
                    подключения к существующим сетям на базе толстого или тонкого коаксиального кабеля.
                    <p><img src="images/хаб.jpg" width="300" height="150"></p>
                </li>
                <li><font color="red">Сетевая плата или сетевой адаптер.</font> В целом особо не нужен т.к. <font
                        color="red">обычно встроен</font> в материнскую плату. <font color="red">Но если случилось так
                    что он сломался</font>, то в полне себе можно купить такую штуки вставить в специально отведённый
                    разъём и <font color="red">радоваться жизни</font>.<br>Ethernet-адаптер — по названию технологии —
                    дополнительное устройство, позволяющее компьютеру взаимодействовать с другими устройствами сети. В
                    настоящее время в персональных компьютерах и ноутбуках контроллер и компоненты, выполняющие функции
                    сетевой платы, <font color="red">довольно часто интегрированы в материнские платы</font> для
                    удобства, в том числе унификации драйвера и удешевления всего компьютера в целом.
                    <p><img src="images/сетевая плата.jpg" width="300" height="150"></p>
                </li>
                <li><font color="red">Маршрутизатор в простонародии роутер.</font> В целом <font color="red">грубо
                    говоря</font> то же что и Хаб(hub), но меньше и ктому же можно к интернету подключиться.<br>Cпециализированный
                    компьютер, который <font color="red">пересылает пакеты между различными сегментами сети</font> на
                    основе правил и таблиц маршрутизации. Маршрутизатор может связывать разнородные сети различных
                    архитектур. Для принятия решений о пересылке пакетов используется информация о топологии сети и
                    определённые правила, заданные администратором. Маршрутизаторы работают на «сетевом» (третьем)
                    уровне сетевой модели OSI, в отличие от коммутаторов (свитчей) и концентраторов (хабов), которые
                    работают, соответственно, на втором и первом уровнях модели OSI.
                    <p><img src="images/роутер.jpg" width="300" height="150"></p>
                </li>
                </ul>
                </p>
                <br>
                <hr>
                <br>
                <p>
                <center><img src="images/ani85-1.gif" width="500" height="250"></center>
                </p>

            </article>
        </div>

    </div><!--/Center Column-->


    <div class="col-sm-3">

        <!-- List-Group Panel -->
        <p><img src="images/oborydovanie.jpg" width="300" height="150"></p>

    </div>

</div><!--/container-fluid-->


<!-- jQuery -->
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- IE10 viewport bug workaround -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

<!-- Placeholder Images -->
<script src="js/holder.min.js"></script>

</body>

</html>
