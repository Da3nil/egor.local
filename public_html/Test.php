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
		
		<script type="text/javascript">
 
            function hideNoDHTML()
            {
              document.getElementById('nodhtml').style.display = 'none';
              showQuestions();
            }
     
            function showQuestions()
            {
              document.getElementById('questions').style.display = 'block';
              document.getElementById('results').style.display = 'none'; // нет элемента с id results в коде html
            }
     
            function showResults()
            {
                
                var i = 0;
                if(document.getElementById('choice13').checked == true)
                {
                    i++;
                }
                if(document.getElementById('choice24').checked == true)
                {
                    i++;
                }
                if(document.getElementById('choice31').checked == true)
                {
                    i++;
                }
                if(document.getElementById('choice43').checked == true)
                {
                    i++;
                }
                if(document.getElementById('choice53').checked == true)
                {
                    i++;
                }
                if(document.getElementById('choice64').checked == true)
                {
                    i++;
                }
                if(document.getElementById('choice71').checked == true)
                {
                    i++;
                }
                if(document.getElementById('choice83').checked == true)
                {
                    i++;
                }
                if(document.getElementById('choice93').checked == true)
                {
                    i++;
                }
                if(document.getElementById('choice102').checked == true)
                {
                    i++;
                }

                document.getElementById('questions').style.display = 'none';
                document.getElementById('results').style.display = 'block';

                document.getElementById('results').innerHTML = '<h2>Результаты теста </h2>\n<p>Правильное количество: <strong>' + i + ' из 10</strong>.</p>';

            } //Была потеряна
            </script>

			<div class="row">
				<article class="col-xs-12">
					<h2>Тестирование</h2>
					<div class="section-seperator">
                <div class="content-md container">
                    <div class="row">
                <div class="col-sm sm-margin-b-50">
            <div id="nodhtml"></div>
 
            <div id="questions">
  
                <form action="">
                    <h4>1. Сетевой кабель это...</h4>
                    <p><input type="radio" name="question1" id="choice11" /> <label for="choice11">Расширение, которое характеризует вид файла</label></p>
                    <p><input type="radio" name="question1" id="choice12" /> <label for="choice12">Определённое место в жёстком диске</label></p>
                    <p><input type="radio" name="question1" id="choice13" /> <label for="choice13">Кабель для прокладки локальной сети между ПК</label></p>
                    <p><input type="radio" name="question1" id="choice14" /> <label for="choice14">Журнал моды</label></p>
                    <hr>
     
                    <h4>2. Что такое Сетевой концентратор(hub) ?</h4>
                    <p><input type="radio" name="question2" id="choice21" /> <label for="choice21">Определённая программа</label></p>
                    <p><input type="radio" name="question2" id="choice22" /> <label for="choice22">Папка</label></p>
                    <p><input type="radio" name="question2" id="choice23" /> <label for="choice23">Текстовый документ</label></p>
                    <p><input type="radio" name="question2" id="choice24" /> <label for="choice24">Устройство для объединения компьютеров в сеть Ethernet с применением кабельной инфраструктуры типа витая пара.</label></p>
                    <hr>

                    <h4>3. Командный файл имеет расширение...</h4>
                    <p><input type="radio" name="question3" id="choice31" /> <label for="choice31">.BAT</label></p>
                    <p><input type="radio" name="question3" id="choice32" /> <label for="choice32">.COM</label></p>
                    <p><input type="radio" name="question3" id="choice33" /> <label for="choice33">.LHP</label></p>
                    <p><input type="radio" name="question3" id="choice34" /> <label for="choice34">.DLL</label></p>
                    <hr>

                    <h4>4. Какая команда отвечает за копирование выбранных файлов ?</h4>
                    <p><input type="radio" name="question4" id="choice41" /> <label for="choice41">dir</label></p>
                    <p><input type="radio" name="question4" id="choice42" /> <label for="choice42">delete</label></p>
                    <p><input type="radio" name="question4" id="choice43" /> <label for="choice43">copy</label></p>
                    <p><input type="radio" name="question4" id="choice44" /> <label for="choice44">select</label></p>
                    <hr>

                    <h4>5. Какая из перечисленных команд, отвечает за переход в корневой каталог:</h4>
                    <p><input type="radio" name="question5" id="choice51" /> <label for="choice51">cd..</label></p>
                    <p><input type="radio" name="question5" id="choice52" /> <label for="choice52">cd /mnt</label></p>
                    <p><input type="radio" name="question5" id="choice53" /> <label for="choice53">cd /</label></p>
                    <p><input type="radio" name="question5" id="choice54" /> <label for="choice54">select</label></p>
                    <hr>

                    <h4>6. Что такое сетевая плата(сетевой адаптер) </h4>
                    <p><input type="radio" name="question6" id="choice61" /> <label for="choice61">Устройство позволяющее входить в сеть.</label></p>
                    <p><input type="radio" name="question6" id="choice62" /> <label for="choice62">Ethernet-адаптер позволяющий ловить wi-fi с более дальнего растояния.</label></p>
                    <p><input type="radio" name="question6" id="choice63" /> <label for="choice63">Устройство расширяющее память.</label></p>
                    <p><input type="radio" name="question6" id="choice64" /> <label for="choice64">Ethernet-адаптер — по названию технологии — дополнительное устройство, позволяющее компьютеру взаимодействовать с другими устройствами сети.</label></p>
                    <hr>

                    <h4>7. Маршрутизатор(роутер)</h4>
                    <p><input type="radio" name="question7" id="choice71" /> <label for="choice71">Cпециализированный компьютер, который пересылает пакеты между различными сегментами сети на основе правил и таблиц маршрутизации.</label></p>
                    <p><input type="radio" name="question7" id="choice72" /> <label for="choice72">Ethernet-адаптер — по названию технологии — дополнительное устройство, позволяющее компьютеру взаимодействовать с другими устройствами сети.</label></p>
                    <p><input type="radio" name="question7" id="choice73" /> <label for="choice73">Информацию о принадлежности объекта</label></p>
                    <p><input type="radio" name="question7" id="choice74" /> <label for="choice74">Устройство для входа в дерево подкаталогов со всем содержимым</label></p>
                    <hr>

                    <h4>8. четыре типа сетевого размещения.</h4>
                    <p><input type="radio" name="question8" id="choice81" /> <label for="choice81">Редкая, Частаю, Одно-функциональная, Много-функциональная.</label></p>
                    <p><input type="radio" name="question8" id="choice82" /> <label for="choice82">Музыкальная, Световая, Инструментальная и Ударные.</label></p>
                    <p><input type="radio" name="question8" id="choice83" /> <label for="choice83">Домашняя, Рабочая, Публичная(общественноя) сети и Домен.</label></p>
                    <p><input type="radio" name="question8" id="choice84" /> <label for="choice84">Компьютерная, Мобильная, Факсовая и Телефонная</label></p>
                    <hr>

                    <h4>9. cmd это ?</h4>
                    <p><input type="radio" name="question9" id="choice91" /> <label for="choice91">Диспетчер задач.</label></p>
                    <p><input type="radio" name="question9" id="choice92" /> <label for="choice92">Блокнот.</label></p>
                    <p><input type="radio" name="question9" id="choice93" /> <label for="choice93">Командная строка.</label></p>
                    <p><input type="radio" name="question9" id="choice94" /> <label for="choice94">Переходит в другую сеть.</label></p>
                    <hr>

                    <h4>10. Команда для проверки пакетов сети.</h4>
                    <p><input type="radio" name="question10" id="choice101" /> <label for="choice101">ipconfig.</label></p>
                    <p><input type="radio" name="question10" id="choice102" /> <label for="choice102">ping и ip.</label></p>
                    <p><input type="radio" name="question10" id="choice103" /> <label for="choice103">config.</label></p>
                    <p><input type="radio" name="question10" id="choice104" /> <label for="choice104">settings.</label></p>
                    <hr>

                     <p class="col-xs-12"><input type="button" value="Завершить работу" onclick="showResults();" /><input type="reset" value="Очистить форму" /></p>
                </form>
            </div>
            <!-- Утерянный блок -->
            <div id='results'></div>
            <br/><br/> 
        </body>
        <!--========== Конец PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
       
        <!--========== Конец FOOTER ==========-->

        <!-- JAVASCRIPTS -->

        <!-- jQuery -->
        <script src="js/jquery-1.11.3.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- IE10 viewport bug workaround -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>

        <!-- Placeholder Images -->
        <script src="js/holder.min.js"></script>

    </body>
    <!-- Конец BODY -->
</html>