<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        // $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderby('tbl_product.product_id','desc')->get();
        $product_views = Product::orderBy('product_views','DESC')->take(4)->get();
        return view('pages.home')->with('category',$cate_product)->with('product_views',$product_views);
    }
    public function search(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        // $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderby('tbl_product.product_id','desc')->get();
        // $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
        $keywords = $request->keywords_submit;
        $search_product=DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.sanpham.search')->with('category',$cate_product)->with('search_product',$search_product);
    }
    public function blog(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        // $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderby('tbl_product.product_id','desc')->get();
        // $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
        return view('pages.blog')->with('category',$cate_product);
    }
}
