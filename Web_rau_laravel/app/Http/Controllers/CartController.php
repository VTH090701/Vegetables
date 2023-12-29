<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\coupon;

// use App\Http\Controllers\coupon;
session_start();

class CartController extends Controller
{
    // public function gio_hang()
    // {
    //     $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
    //     return view('pages.cart.cart_ajax')->with('category', $cate_product);
    // }
    // public function add_cart_ajax(Request $request)
    // {
    //     $data = $request->all();
    //     // print_r($data);
    //     $session_id = substr(md5(microtime()), rand(0, 26), 5);
    //     $cart = Session::get('cart');
    //     if ($cart == true) {
    //         $is_avaiable = 0;
    //         foreach ($cart as $key => $val) {
    //             if ($val['product_id'] == $data['cart_product_id']) {
    //                 $is_avaiable++;
    //             }
    //         }

    //         if ($is_avaiable == 0) {
    //             $cart[] = array(
    //                 'session_id' => $session_id,
    //                 'product_name' =>  $data['cart_product_name'],
    //                 'product_id' =>  $data['cart_product_id'],
    //                 'product_image' => $data['cart_product_image'],
    //                 'product_qty' => $data['cart_product_qty'],
    //                 'product_price' => $data['cart_product_price'],
    //             );
    //             Session::put('cart', $cart);
    //         }
    //     } else {
    //         $cart[] = array(
    //             'session_id' => $session_id,
    //             'product_name' =>  $data['cart_product_name'],
    //             'product_id' =>  $data['cart_product_id'],
    //             'product_image' => $data['cart_product_image'],
    //             'product_qty' => $data['cart_product_qty'],
    //             'product_price' => $data['cart_product_price'],
    //         );
    //     }
    //     Session::put('cart', $cart);
    //     Session::save();
    // }
    // public function del_product($session_id)
    // {
    //     $cart = Session::get('cart');
    //     if ($cart == true) {
    //         foreach ($cart as $key => $val) {
    //             if ($val['session_id'] == $session_id) {
    //                 unset($cart[$key]);
    //             }
    //         }
    //         Session::put('cart', $cart);
    //         return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
    //     } else {
    //         return redirect()->back()->with('message', 'Xóa sản phẩm thất bại');
    //     }
    // }
    // public function update_cart(Request $request)
    // {
    //     $data = $request->all();
    //     $cart = session::get('cart');
    //     if ($cart == true) {
    //         foreach ($data['cart_qty'] as $key => $qty) {
    //             foreach ($cart as $session => $val) {
    //                 if ($val['session_id'] == $key) {
    //                     $cart['$session']['product_qty'] = $qty;
    //                 }
    //             }
    //         }
    //         Session::put('cart', $cart);
    //         return redirect()->back()->with('message', 'Cập nhật sản phẩm thành công');
    //     } else {
    //         return redirect()->back()->with('message', 'Cập nhật sản phẩm thất bại');
    //     }
    // }
    public function save_cart(Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $quantity_kho =  $request->quantity;

        if ($quantity <= $quantity_kho) {
            $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();
            $data['id'] = $product_info->product_id;
            $data['qty'] = $quantity;
            $data['name'] = $product_info->product_name;
            $data['price'] = $product_info->product_price;
            //Số lượng còn tồn
            $data['weight'] =  $quantity_kho;
            $data['options']['image'] = $product_info->product_image;
            Cart::add($data);
            Cart::setGlobalTax(0);
            return Redirect::to('/show-cart');
        } else {
            $alert = 'Làm ơn mua dưới số lượng trong kho';
            return redirect()->back()->with('alert', $alert);
        }


        // Cart::destroy();

    }
    public function show_cart()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        return view('pages.cart.show_cart')->with('category', $cate_product);
    }
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_qty(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->quantity_cart;
        $qty_kho = $request->quantity_kho_cart;
        if ($qty <= $qty_kho) {
            Cart::update($rowId, $qty);
            return Redirect::to('/show-cart');
        } else {
            $alert = 'Làm ơn cập nhật dưới số lượng trong kho';
            return redirect()->back()->with('alert', $alert);
        }
    }
    //Coupon
    public function check_coupon(Request $request)
    {
        // $data[] = $request->all();
        $data['coupon1'] = $request->coupon1;
        $coupon = Coupon::where('coupon_code', $data['coupon1'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session == true) {
                    $is_avaiable = 0;
                    if ($is_avaiable == 0) {
                        $cou[] = array(
                            'coupon_name' => $coupon->coupon_name,
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_name' => $coupon->coupon_name,
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,

                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return Redirect::to('/show-cart')->with('message', 'Thêm mã giảm giá thành công');
            }
        } else {
            return Redirect::to('/show-cart')->with('message', 'Mã giảm giá không đúng');
        }
    }
}
