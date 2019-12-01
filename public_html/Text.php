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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><span class="glyphicon glyphicon-random"></span>  Меню</h1>
				</div>
				<div class="list-group">
					<a href="less_1.php" class="list-group-item">Лекция 1.
						Настройка компьютерных сетей.</a>
					<!--<a href="лекция 2.html" class="list-group-item">Лекция 2. Описание.</a>-->
				</div>
			</div>

			<!-- Text Panel -->
			
				
		</div><!--/Left Column-->
  
  
		<!-- Center Column -->
		<div class="col-sm-6">
		

			<div class="row">
				<article class="col-xs-12">
					<h2>Примечание</h2>
					<p>Далеко не все знают о том, что проект компьютерной сети, который будет составлен максимально правильно и точно, позволит увеличить продуктивность работы. Кроме того, результативность работы организации зависит от качества монтажа локальных сетей. Можно говорить о том, что осуществление проектирования и монтажа компьютерных сетей которая направлена на оптимизацию передачи информационных данных с высокой скоростью позволяет проводить операции без потерь.
</p>
					
				</article>
			</div>
			<hr>
			<div class="row">
				<article class="col-xs-12">
					<h2>Что включает в себя монтаж ЛВС</h2>
					<p>Это комплексные мероприятия, которые должны начинаться с предварительных работ. Предварительный этап включает в себя:
						<ul>
<li>Определение места и установку кабель-канала и подготовку отверстий в стенах.</li>
<li>прокладку кабеля в подготовленном канале.</li>
<li>установку монтажной конструкции и размещение кабеля в коммуникационной панели.</li>
</p>
                        </ul>
					
				</article>
			</div>
			<hr>      
			<div class="row">
				<article class="col-xs-12">
					<h2>Монтаж ЛВС</h2>
					<p>Монтаж локально-вычислительной сети, который произведен качественно — это залог бесперебойной работы всей компьютерной техники. Основные факторы, которые необходимо учитывать при прокладке ЛВС, сводятся к следующим моментам:
				<ul>
<li>определение цели создания сети (какую функцию она должна в результате выполнять).</li>
<li>определение необходимой пропускной способности.</li>
<li>установление количества рабочих мест.</li>
<li>предусмотренные варианты расширения.</li>
</p>
                 </ul>
					
				</article>
			</div>
			<hr>
		</div><!--/Center Column-->




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