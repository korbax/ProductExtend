 Задание
В товар требуется добавить информацию о его покупках используя Extension attributes https://devdocs.magento.com/guides/v2.0/extension-dev-guide/attributes.html Т.е. товар будет иметь атрибут sales_information который будет возвращать интерфейс с методами:
- getQty() : integer - общее количество этого товара из всех ордеров с каким-то статусом
- getLastOrder(): string - дата последней продажи

Очень важно использовать именно интерфейс, так как мы эти данные (кол-во и дата последней продажи) должны получать по требованию в каком то определенном случае.
Тебе нужно будет инициализировать интерфейс ИД товара, а вызов методов уже будет запускать логику.
Важно. Это должены быть лейзи-лоад данные, мы не можем нагрузить каталог, т.е. данные будут загружаться только когда будет вызван метод getQty() или getLastOrder()

Так же нужно иметь возможность через di.xml передавать в класс параметры - статус ордера. Т.е. только ордеры с определенным статусом можно использовать для статистики в getQty()


Какие цели приследует это задание

Код мадженты если будешь копировать то его обязательно рефактори, он не соответствует их гайдлайну.
Magento technical guidelines https://devdocs.magento.com/guides/v2.2/coding-standards/technical-guidelines.html пожалуйста ориентируйся на него.

Так же установи себе сниффер PSR-2 у нас и у клиента очень «жесткие» требования к стандартам
CI/DI не пропускает ничего.
Ссылка для PHPStorm https://confluence.jetbrains.com/display/PhpStorm/PHP+Code+Sniffer+in+PhpStorm


----------------------------------
##Task
1. Add to Product extension attributes **sales_information**
2. **sales_information** must be return interface with method:
   - getQty()        // amount of all product has sold, with some status
   - getLastOrder()  // date of last sale
3. Use Interface
4. Important, this method must be lazy load
5. Via di.xml we need to have a possibility to send parameter (order status)
---------------
##Test Flow
1. For show ExtensionAttributes open url:
 http://site.local/sales-information/index/index/sku/123/extensionAttributes/show
2. For don't load ExtensionAttributes open url:
http://site.local/sales-information/index/index/sku/123/extensionAttributes/hide