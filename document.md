## Listing URL examples

`localhost:8000/api/customers`
>The above URL will respond with a paginated listing of customers

`localhost:8000/api/customers?with=orders,orders.items`
>listing with related models, here orders is directly related while items is related through orders of customer

## SEARCH AND FILTER:

>search by email

`localhost:8000/api/customers?search=email:yahoo.com&searchFields=email:like`
>>The abbove URL will search customers by email using LIKE operator, operator is specified in the URL under searchFields param

`localhost:8000/api/customers?search=email:fstanton@parker.com&searchFields=email:=`
>> Above URL will search customers by email with exact match


>search by order number

`localhost:8000/api/customers?search=orders.id:20&searchFields=orders.id:=&with=orders`
>>URL above will return customer who has placed order.id=20, with param is optional and can be used to verify that customer actually has order id 20

>search by items

`localhost:8000/api/customers?search=orders.items.product_id:20&searchFields=orders.items.product_id:=&with=orders;orders.items`

>> This URL will return all customers who have placed orders with product_id=20, here again with parameter is optional and is used for fetching related models.


### Implementation details

