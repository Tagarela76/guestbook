guestbook
Для установки проекта необходимо
1) Установить composer
Для этого необходимо ввести в терминале команду
curl -sS https://getcomposer.org/installer | php
2) Обновить библиотеки и зависимости через composer
sudo php composer.phar update
3) Сконфигурировать файл app/config/services.php для подключения к базе данных
4) Создать бд guestbook
5) В терминале проекта ввести команду
bin/console orm:schema-tool:update —force
6) Создать папки и установить права на запись
/uploads
/src/GB/MainBundle/Resource/smarty/template_c

