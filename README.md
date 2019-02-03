# simple_registrations
Цель задания: 
Выявить уровень владения языками PHP, JS. Особое внимание следует уделить архитектурному решению, стилю написания кода, аспектам безопасности, возможному росту приложения. Задание выполнять на 100% не обязательно. Самое главное - демонстрация процесса разработки. Также, не следует заострять внимание на визуальной составляющей задания (можно использовать любой CSS фреймворк). 
Срок выполнения:
до 3 дней
Инструменты разработки: 
серверная часть - PHP 5.6+, запрещено использовать сторонние библиотеки и composer
клиентская часть - можно использовать jQuery, но было бы предпочтительнее написать все на чистом JS без использования библиотек, разрешено использовать любой CSS фреймворк (bootstrap, uikit, foundation, etc).
Описание задания: 
Создать приложение, позволяющее проходить регистрацию на вымышленном событии путем заполнения формы. Форма должна работать без перезагрузки страницы (ajax). Поля формы: 
имя 
фамилия 
дата рождения 
компания 
должность 
телефон 

Поля 1,2,6 являются обязательными для заполнения. Поле телефон должно содержать только числа и знак "+". Поле дата рождения соответствовать маске dd.mm.yyyy. После отправки формы данные записываются в CSV файл. Помимо формы регистрации разработать страницу для администратора, которая позволяет просматривать список зарегистрированных пользователей в удобном виде, а также выгружать данные с сайта. Страница администратора должна быть закрыта от свободного доступа.
