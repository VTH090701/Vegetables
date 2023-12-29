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

use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
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
    public function duyet_comment($comment_id)
    {
        $this->AuthLogin();
        DB::table('tbl_comment')->where('comment_id', $comment_id)->update(['comment_status' => 0]);
        Session::put('message', 'Duyệt comment thành công');
        return Redirect::to('/comment');
    }
    public function khongduyet_comment($comment_id)
    {
        $this->AuthLogin();
        DB::table('tbl_comment')->where('comment_id', $comment_id)->update(['comment_status' => 1]);
        Session::put('message', 'Không duyệt comment thành công');
        return Redirect::to('/comment');
    }

    public function list_comment()
    {
        $comment = Comment::with('product')->orderBy('comment_status', 'DESC')->get();
        return view('admin.comment.list_comment')->with(compact('comment'));
    }
    public function send_comment(Request $request)
    {
        $product_id =  $request->product_id;
        $comment_name =  $request->comment_name;
        $comment_content =  $request->comment_content;
        $comment = new Comment();
        $comment->comment_name =   $comment_name;
        $comment->comment =   $comment_content;
        $comment->comment_product_id =   $product_id;
        $comment->comment_status = 1;

        $comment->save();
    }
    public function load_comment(Request $request)
    {
        $product_id =  $request->product_id;
        $comment  = Comment::where('comment_product_id', $product_id)->where('comment_status', 0)->get();
        $output = '';
        foreach ($comment as $key => $comm) {
            $output .= '
            <div class="row style_comment">
            <div class="col-md-2 mt-3">
                <img width="100%" src="public/frontend/img/avatar_icon2.png">
            </div>
            <div class="col-md-10">
                <p style="color:green;">@' . $comm->comment_name . '</p>
                <p style="color:black;">' . $comm->comment_date . '</p>
                <p style="color:black;">' . $comm->comment . '</p>
            </div>
        </div>
        <p></p>';
        }
        echo $output;
    }
    public function all_product()
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->orderby('tbl_product.product_id', 'desc')->get();

        $manager_product = view('admin.all_product')->with('all_product', $all_product);

        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();

        return view('admin.add_product')->with('cate_product', $cate_product);
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['product_cost'] = $request->product_cost;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_image;
        $data['product_sold'] = 0;

        $get_image = $request->file('product_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));

            // $new_image = $get_name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $new_image = $get_name_image;
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('/add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Kích hoạt sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Không kích hoạt sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['product_cost'] = $request->product_cost;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));

            // $new_image = $get_name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $new_image = $get_name_image;
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('/all-product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    //USER PAGE
    public function details_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        $details_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->where('tbl_product.product_id', $product_id)->get();

        foreach ($details_product as $key => $value) {
            $cate_id = $value->category_id;
        }
        //gallery
        $gallery = Gallery::where('product_id', $product_id)->get();
        //update_views
        $product = Product::where('product_id', $product_id)->first();
        $product->product_views =  $product->product_views + 1;
        $product->save();

        $related_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->where('tbl_category_product.category_id', $cate_id)->whereNotIn('tbl_product.product_id', [$product_id])->get();

        return view('pages.sanpham.show_details')->with('category', $cate_product)->with('details_product', $details_product)->with('related_product', $related_product)->with('gallery', $gallery);
    }
}
