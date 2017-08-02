<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ProductController extends Controller
{
    private $_cates = [];
    public function __construct()
    {
        $categories = Category::all();
        foreach ($categories as $category){
            $this->_cates[$category->id] = $category->title;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('keyword')){
            $keyword = $request->get('keyword');
            //die($keyword);

            $products = Product::where('title', 'like', '%' . $keyword . '%')->get();
        }else{
            $products = Product::all();
        }
        
        return view('admin.product.show', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::all();

        return view('admin.product.create', ['categories' => $this->_cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thumbnail = 'no-image.jpg';
        if ($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $thumbnail = $file->getClientOriginalName();
            $path = public_path('uploads/product');
            $file->move($path, $thumbnail);
        }

        $p = new Product();
        $p->title = $request->title;
        $p->category_id = $request->category_id;
        $p->price = $request->price;
        $p->thumbnail = $thumbnail;
        $p->save();

        Session::flash('success', 'Thêm mới sản phẩm thành công');
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);


        //print_r($arrCate);

        return view('admin.product.edit',
            ['product' => $product,
            'categories' => $this->_cates]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $thumbnail = $product->thumbnail;
        if ($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $thumbnail = $file->getClientOriginalName();
            $path = public_path('uploads/product');
            $file->move($path, $thumbnail);
        }

        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->thumbnail = $thumbnail;
        $product->save();

        Session::flash('success', 'Cập nhật sản phẩm thành công');
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Product::findOrFail($id);
        $pro->delete();

        Session::flash('success', "Deleted product successfully!!!");

        return redirect('admin/product');
    }
}
