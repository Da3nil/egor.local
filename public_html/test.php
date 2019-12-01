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
             <div class="section-seperator">
                <div class="content-md container">
                    <div class="row">
                <div class="col-sm sm-margin-b-50">
            <div id="nodhtml"></div>
 
            <div id="questions">
                <h4></h4>
                <h4></h4>
                <h4></h4>
                <h2 align='center'>Тестирование</h2>
  
                <form action="">
                    <h4>1. Каталог это...</h4>
                    <p><input type="radio" name="question1" id="choice11" /> <label for="choice11">Расширение, которое характеризует вид файла</label></p>
                    <p><input type="radio" name="question1" id="choice12" /> <label for="choice12">Определённое место в жёстком диске</label></p>
                    <p><input type="radio" name="question1" id="choice13" /> <label for="choice13">Специальное место на диске, в котором хранятся имена файлов и другие сведения о них</label></p>
                    <p><input type="radio" name="question1" id="choice14" /> <label for="choice14">Журнал моды</label></p>
     
                    <h4>2. Что такое файл ?</h4>
                    <p><input type="radio" name="question2" id="choice21" /> <label for="choice21">Определённая программа</label></p>
                    <p><input type="radio" name="question2" id="choice22" /> <label for="choice22">Папка</label></p>
                    <p><input type="radio" name="question2" id="choice23" /> <label for="choice23">Текстовый документ</label></p>
                    <p><input type="radio" name="question2" id="choice24" /> <label for="choice24">Все вышеперечисленные ответы верны</label></p>

                    <h4>3. Командный файл имеет расширение...</h4>
                    <p><input type="radio" name="question3" id="choice31" /> <label for="choice31">.BAT</label></p>
                    <p><input type="radio" name="question3" id="choice32" /> <label for="choice32">.COM</label></p>
                    <p><input type="radio" name="question3" id="choice33" /> <label for="choice33">.LHP</label></p>
                    <p><input type="radio" name="question3" id="choice34" /> <label for="choice34">.DLL</label></p>
                    
                    <h4>4. Какая команда отвечает за копирование выбранных файлов ?</h4>
                    <p><input type="radio" name="question4" id="choice41" /> <label for="choice41">dir</label></p>
                    <p><input type="radio" name="question4" id="choice42" /> <label for="choice42">delete</label></p>
                    <p><input type="radio" name="question4" id="choice43" /> <label for="choice43">copy</label></p>
                    <p><input type="radio" name="question4" id="choice44" /> <label for="choice44">select</label></p>

                    <h4>5. Какая из перечисленных команд, отвечает за переход в корневой каталог:</h4>
                    <p><input type="radio" name="question5" id="choice51" /> <label for="choice51">cd..</label></p>
                    <p><input type="radio" name="question5" id="choice52" /> <label for="choice52">cd /mnt</label></p>
                    <p><input type="radio" name="question5" id="choice53" /> <label for="choice53">cd /</label></p>
                    <p><input type="radio" name="question5" id="choice54" /> <label for="choice54">select</label></p>

                    <h4>6. Команда "ren" отвечает за... </h4>
                    <p><input type="radio" name="question6" id="choice61" /> <label for="choice61">Сохранение файла</label></p>
                    <p><input type="radio" name="question6" id="choice62" /> <label for="choice62">Удаление файла</label></p>
                    <p><input type="radio" name="question6" id="choice63" /> <label for="choice63">Запуск файла</label></p>
                    <p><input type="radio" name="question6" id="choice64" /> <label for="choice64">Переименование файла</label></p>
                    
                    <h4>7. Команда "-а" выводит на экран...</h4>
                    <p><input type="radio" name="question7" id="choice71" /> <label for="choice71">Оглавление каталога</label></p>
                    <p><input type="radio" name="question7" id="choice72" /> <label for="choice72">Формат файлов</label></p>
                    <p><input type="radio" name="question7" id="choice73" /> <label for="choice73">Информацию о принадлежности объекта</label></p>
                    <p><input type="radio" name="question7" id="choice74" /> <label for="choice74">Дерево подкаталогов со всем содержимым</label></p>

                    <h4>8. Документ это...</h4>
                    <p><input type="radio" name="question8" id="choice81" /> <label for="choice81">Рисунок</label></p>
                    <p><input type="radio" name="question8" id="choice82" /> <label for="choice82">Музыкальный файл</label></p>
                    <p><input type="radio" name="question8" id="choice83" /> <label for="choice83">Любой созданный пользователем файл</label></p>
                    <p><input type="radio" name="question8" id="choice84" /> <label for="choice84">Реферат</label></p>

                    <h4>9. Какую функцию выполняет команда "mkdir" ?</h4>
                    <p><input type="radio" name="question9" id="choice91" /> <label for="choice91">Переходит в домашний каталог пользователя</label></p>
                    <p><input type="radio" name="question9" id="choice92" /> <label for="choice92">Выводит обозначение самого каталога</label></p>
                    <p><input type="radio" name="question9" id="choice93" /> <label for="choice93">Создаёт каталог в домашнем каталоге</label></p>
                    <p><input type="radio" name="question9" id="choice94" /> <label for="choice94">Переходит в другой каталог</label></p>

                    <h4>10. Какой объём информации может в себя вмещать CD-диск ?</h4>
                    <p><input type="radio" name="question10" id="choice101" /> <label for="choice101">От 4 ГБ до 24 ГБ</label></p>
                    <p><input type="radio" name="question10" id="choice102" /> <label for="choice102">От 600 МБ до 800 МБ</label></p>
                    <p><input type="radio" name="question10" id="choice103" /> <label for="choice103">От 24 ГБ до 100 ГБ</label></p>
                    <p><input type="radio" name="question10" id="choice104" /> <label for="choice104">От 10 МБ до 4 ГБ</label></p>

                    <p class="col-xs-12 text-right"><input type="button" value="Показать результат" onclick="showResults();" /> <input type="reset" value="Очистить форму" /></p>
                </form>
            </div>