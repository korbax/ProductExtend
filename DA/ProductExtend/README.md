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
