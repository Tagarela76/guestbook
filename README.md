guestbook<br>
Для установки проекта необходимо<br>
1) Установить composer<br>
Для этого необходимо ввести в терминале команду<br>
curl -sS https://getcomposer.org/installer | php<br>
2) Обновить библиотеки и зависимости через composer<br>
sudo php composer.phar update<br>
3) Сконфигурировать файл app/config/services.php для подключения к базе данных<br>
4) Создать бд guestbook<br>
5) В терминале проекта ввести команду<br>
bin/console orm:schema-tool:update --force<br>
папка bin должна иметь права 777
6) Создать папки и установить права на запись<br>
/uploads<br>
/src/GB/MainBundle/Resource/smarty/template_c<br>

