<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Session;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;

session_start();
class CustomerController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function all_customer()
    {
        $this->AuthLogin();
        $customer = DB::table('tbl_customers')->orderby('customer_id', 'desc')->get();
        return view('admin.customer.list_customer')->with(compact('customer'));


        // $all_customer = DB::table('tbl_customers')
        //     ->join('tbl_c', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
        //     ->select('tbl_order.*', 'tbl_customers.customer_name')
        //     ->orderby('tbl_order.order_id', 'desc')->get();

        // $manager_order = view('admin.manage_order')->with('all_order', $all_order);

        // return view('admin_layout')->with('admin.manage_order', $manager_order);
    }


}
