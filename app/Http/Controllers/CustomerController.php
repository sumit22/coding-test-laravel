<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    /**
     * like search by customer email
     * localhost:8000/api/customers?search=email:yahoo.com&searchFields=email:like
     * 
     * exact match for email | fstanton@parker.com
     * localhost:8000/api/customers?search=email:fstanton@parker.com&searchFields=email:=
     * 
     * search by order id
     * localhost:8000/api/customers?search=orders.id:20&searchFields=orders.id:=&with=orders
     * localhost:8000/api/customers?search=orders.id:20&searchFields=orders.id:=&with=orders
     * 
     * search by items/product id
     * localhost:8000/api/customers?search=orders.items.product_id:20&searchFields=orders.items.product_id:=&with=orders;orders.items
     * 
     */
    public function index(CustomerRepository $customerRepo)
    {
        $customerRepo->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $customerRepo->paginate();
    }
}
