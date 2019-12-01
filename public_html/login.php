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
			
				
		</div><!--/Left Column-->
  
  
		<!-- Center Column -->
		<div class="col-sm-6">
		

			<div class="row">
                <?php
                // Страница авторизации
                // Функция для генерации случайной строки
                function generateCode($length = 6)
                {
                    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
                    $code = "";
                    $clen = strlen($chars) - 1;
                    while (strlen($code) < $length) {
                        $code .= $chars[mt_rand(0, $clen)];
                    }
                    return $code;
                }

                include_once "config.php";

                global $config;

                $link = mysqli_connect("localhost", $config['dbLogin'], $config['dbPass'], $config['dbName']);

                if (isset($_POST['submit'])) {
                    // Вытаскиваем из БД запись, у которой логин равняеться введенному
                    $query = mysqli_query($link, "SELECT user_id, user_password FROM users WHERE user_login='" . mysqli_real_escape_string($link, $_POST['login']) . "' LIMIT 1");
                    $data = mysqli_fetch_assoc($query);

                    // Сравниваем пароли
                    if ($data['user_password'] === md5(md5($_POST['password']))) {
                        // Генерируем случайное число и шифруем его
                        $hash = md5(generateCode(10));

                        // Записываем в БД новый хеш авторизации и IP
                        mysqli_query($link, "UPDATE users SET user_hash='$hash' WHERE user_id=" . $data['user_id']);

                        // Ставим куки
                        setcookie('wtf', 1);
                        setcookie("id", $data['user_id'], time() + 60 * 60 * 24 * 30, '/');
                        setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, '/', null, null, true); // httponly !!!

                        // Переадресовываем браузер на страницу проверки нашего скрипта
                        //        header("Location: check.php");
                        //        echo mysqli_errno($link) . ": " . mysqli_error($link) . "\n";
                        header("Location: ../index.php");
                        exit();
                    } else {
                        print "
                        <article class=\"col-xs-12\">
                            <h2 class=\"text-center\">Вы ввели неправильный логин/пароль</h2>
                        </article>";
                    }
                } else {
                    echo '
                <article class="col-xs-12">
                    <h2 class="text-center">Вход</h2>
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Логин</label>
                            <input name="login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите логин">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Пароль</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" name="password">
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Вход</button>
                    </form>
				</article>
                         ';
                };
                ?>

			</div>
			<div class="row">
				<article class="col-xs-12">
					<h2></h2>
					<p></p>
					
				</article>
			</div>      
			<div class="row">
				<article class="col-xs-12">
					<h2></h2>
					<p></p>
					
				</article>
			</div>
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