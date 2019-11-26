# Abstract test

## Задача

Есть некая система, которая использует курсы валют.

Логика получения курсов валют следующая. Вызывающий код может получить их из кеша, 
из базы данных или из внешнего источника по http. В случае, если курса валют нет в кеше, 
необходимо проверить базу данных, и если в базе данных есть, сохранить в кэш. 
Если в базе данных нет - проверить внешний источник и, при получении, сохранить в базу данных и в кэш.

Необходимо реализовать описанную логику. Предполагается, что она будет использоваться во множестве разных мест.

Функционал отправки запросов, работы с базой данных и с кэшем реализовывать нет необходимости. 
Достаточно сделать заглушки. Иными словами, не нужно реализовывать трудоемкие технические детали. 
Вместо этого важнее выполнить декомпозицию предметной области, написать необходимые классы с реализацией логики.

## Решение


