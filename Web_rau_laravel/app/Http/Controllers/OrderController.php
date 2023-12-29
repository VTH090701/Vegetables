<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\coupon;

session_start();

use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Statistic;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function update_order_qty(Request $request)
    {
        //update order status
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status =  $data['order_status'];
        $order->save();
        //thêm  
        $order_date = $order->order_date;
        $statistic = Statistic::where('order_date', $order_date)->get();
        if ($statistic) {
            $statistic_count = $statistic->count();
        } else {
            $statistic_count = 0;
        }

        if ($order->order_status == 2) {
            //thêm
            $total_order = 0;
            $sales = 0;
            $profit = 0;
            $quantity = 0;
        
            foreach ($data['order_product_id'] as $key => $product_id) {

                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                //thêm
                $product_price = $product->product_price;
                $product_cost = $product->product_cost;

                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

                foreach ($data['quantity'] as $key2 => $qty) {

                    if ($key == $key2) {
                        $pro_remain = $product_quantity - $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();
                        //update doanh thu
                        $quantity += $qty;
                        $total_order += 1;
                        $sales += $product_price * $qty;
                        $profit = $sales - ($product_cost * $qty);
                    }
                }
            }
            if ($statistic_count > 0) {
                $statistic_update = Statistic::where('order_date', $order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $sales;
                $statistic_update->profit = $statistic_update->profit + $profit;
                $statistic_update->quantity = $statistic_update->quantity + $quantity;
                $statistic_update->total_order = $statistic_update->total_order + $total_order;
                $statistic_update->save();
            } else {
                $statistic_new = new Statistic();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit = $profit;
                $statistic_new->quantity = $quantity;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();
            }
        }
        

    }
    public function manage_order()
    {
        $order = Order::orderby('created_at', 'DESC')->get();
        return view('admin.manage_order')->with(compact('order'));
    }
    public function view_order($order_id)
    {
        // $order_details = OrderDetails::with('product')->where('order_code',$orderCode)->get();
        $order = Order::where('order_id', $order_id)->get();
        foreach ($order as $key => $od) {
            $customer_id = $od->customer_id;
            $shipping_id = $od->shipping_id;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();

        $order_details = OrderDetails::with('product')->where('order_id', $order_id)->get();

        foreach ($order_details as $key => $order_d) {
            $product_coupon = $order_d->product_coupon;
        }
        if ($product_coupon != 'Không có') {
            $coupon = coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;
        }


        return view('admin.view_order')->with(compact('order_details', 'shipping', 'customer', 'coupon_condition', 'coupon_number', 'order'));
    }
    public function manager_order_customer($customer_id)
    {
        $order = Order::where('customer_id',$customer_id)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('pages.cart.manager_order_customer')->with('category',$cate_product)->with('order',$order);
    }
    
}
