## Repository pattern: 
separates the data access logic and maps it to the business entities in the business logic. Communication between the data access logic and the business logic  is done through interfaces. The fundamental idea or the primary goal to use this pattern in a Laravel application is to create a bridge or link between application models and controllers. In other words, to decouple the hard dependencies of models from the controllers.

In order to implement the repository pattern in this project I have integrated a popular laravel package named `prettus/l5-repository` 

One of the most important feature of this package is inbuilt RequestCriteria class which can be configure to be used with any model repositry, once configured, variaous type of search operations can be performed on the listing APIs of any resource. this is achieved by passing different type of url paramenters or GET parameters on the main get url. following operation are supported
- filter by fields with exact or LIKE match
- ordering of records
- loading related models
- page size specification
- filter by related models fields


## Model classes used
>```
>Customer: id, first_name, last_name, email, timestamps
>Products: id, product_name, price, timestamps
>Order: id, customer_id, status, payment_method, timestamps
>OrderItems:id, order_id, product_id, quantity, timestamps

### Models relataions

- Customer:HasMany Orders
- Customer:HasMany Items Through Orders
- Order: HasMany Items

### Table indexes used for query optimisation
>```
> customers table: unique index on email field
> orders table: index on customer_id
> order_items table: index on order_id, product_id

## caching 
can be configured through configuration file config/repository.php
