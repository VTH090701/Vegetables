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
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function confirm_order(Request $request)
    {
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $request->shipping_name;
        $shipping->shipping_email = $request->shipping_email;
        $shipping->shipping_address = $request->shipping_address;
        $shipping->shipping_phone = $request->shipping_phone;
        $shipping->shipping_note = $request->shipping_note;
        $shipping->shipping_method = $request->shipping_method;
        $shipping->save();

        $shipping_id = $shipping->shipping_id;


        // $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        // $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order->created_at=$today;
        $order->order_date = $order_date;
        $order->save();


        $content = Cart::content();
        if ($content) {
            foreach ($content as $v_content) {

                $order_details = new OrderDetails();
                $order_details->order_id = $order->order_id;
                $order_details->product_id = $v_content->id;
                $order_details->product_name = $v_content->name;
                $order_details->product_price =  $v_content->price;
                $order_details->product_sales_quantity =  $v_content->qty;
                $order_details->product_coupon = $request->order_coupon;
                $order_details->save();
            }
        }

        Session::forget('coupon');
        Cart::destroy();
    }
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function login_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        // $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderby('tbl_product.product_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(4)->get();
        return view('pages.checkout.login_checkout')->with('category', $cate_product)->with('all_product', $all_product);
    }
    public function dang_nhap()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        // $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderby('tbl_product.product_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(4)->get();
        return view('pages.checkout.dang_nhap')->with('category', $cate_product)->with('all_product', $all_product);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return Redirect::to('/checkout');
    }
    // public function checkout(){
    //     $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    //     // $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderby('tbl_product.product_id','desc')->get();
    //     $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
    //     return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('all_product',$all_product);
    // }
    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        return view('pages.checkout.show_checkout')->with('category', $cate_product);
    }
    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);

        return Redirect::to('/payment');
    }
    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product);
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_acc;
        $pwd = md5($request->pwd_acc);
        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $pwd)->first();
        if ($result) {
            Session::put('customer_id', $result->customer_id);

            return Redirect::to('/checkout');
        } else {
            // return Redirect::to('/login-checkout');
            Session::put('message', 'Tài khoản hoặc mật khẩu của bạn đã sai');
            return Redirect::to('/dang-nhap');
        }
    }

    public function order_place(Request $request)
    {
        //get payment method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';

        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // insert order
        $data_od = array();
        $data_od['customer_id'] = Session::get('customer_id');
        $data_od['shipping_id'] = Session::get('shipping_id');
        $data_od['payment_id'] = $payment_id;
        $data_od['order_total'] = Cart::total();
        $data_od['order_status'] = 'Đang chờ xử lý';

        $order_id = DB::table('tbl_order')->insertGetId($data_od);

        //insert od_details
        $content = Cart::content();
        foreach ($content as $v_content) {
            $data_od_d = array();
            $data_od_d['order_id'] = $order_id;
            $data_od_d['product_id'] = $v_content->id;
            $data_od_d['product_name'] =  $v_content->name;
            $data_od_d['product_price'] = $v_content->price;
            $data_od_d['product_sales_quantity'] =  $v_content->qty;
            DB::table('tbl_order_details')->insert($data_od_d);
        }

        if ($data['payment_method'] == '1') {
            echo 'Thanh toán tiền mặt';
        } else {
            // Cart::destroy();
            // $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
            // return view('pages.checkout.handcash')->with('category', $cate_product);
            echo 'Thanh toán ATM';
        }
        return Redirect::to('/thanks');
    }


    //Magane order
    public function manage_order()
    {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->select('tbl_order.*', 'tbl_customers.customer_name')
            ->orderby('tbl_order.order_id', 'desc')->get();

        $manager_order = view('admin.manage_order')->with('all_order', $all_order);

        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }
    public function view_order($orderID)
    {
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->select('tbl_order.*', 'tbl_customers.*', 'tbl_shipping.*', 'tbl_order_details.*')
            ->first();

        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);

        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
    }
}
