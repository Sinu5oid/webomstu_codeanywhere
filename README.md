# WebOmSTU

Пример исходного кода и материалы по серверной части курса Web-технологий/Систем программирования.

### Цель проекта: ###

##### Ознакомиться: #####
 - основами функционирования web-систем, включающих серверную и клиентскую часть в виде специализированного приложения;
 - понятием, общей структурой и принципами функционирования web-фреймворков, как средства ускорения разработки серверной части приложения, для упрощения их дальнейшего освоения и использования;
 - основными шаблонами(паттернами) проектирования программного обеспечения;
  
##### Отточить навыки: #####
 - программировния, построения программного обеспечения и применения существующих шаблонов его проектирования;
 - проектирования и работы с базами данных;
 - использования терминала и взаимодействия с Linux-системам;
 - использования системы контроля версий Git
  
### Задача: ###
Разработать собственный простой, легковестный web-фреймворк и реализовать с его помощью серверную часть специализированного приложения по индивидуальному проекту, описаясь на содержимое данного репозитория

### Используемый стек технологий и набор средств разработки: ###
- Контейнер, используемый в качестве виртуального сервера под управлением ОС CentOS (Linux)
- Сервер Apache 2.0
- Язык программирования PHP 7.0
- СУБД MySQL
- Облачная IDE [CodeAnyWhere](https://codeanywhere.com)
- Веб-интерфейс для администрирования СУБД MySQL PHPMyAdmin
- Система контроля версий Git

### Структура проекта: ###
- Каталог [application](https://bitbucket.org/Alexandr1994/webomstu/src/master/application/) - основная часть разрабатываемого web-фреймворка и серверного приложения
- Файл index.php - точка входа в разрабатываемое приложение
- Файл 404.php - временное расположение шаблона ошибки 404
- Файл .htaccess - локальный файл дополнительных настроек сервера Apache
