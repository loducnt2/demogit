<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use Session;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')){
            $keyword = $request->get('keyword');
            $img =Image::where('name', 'like', '%' . $keyword . '%')->get();
        }else{
            $img =Image::all();
        }

        return view('admin.image.show', ['img' => $img]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('admin.image.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = 'no-image.jpg';
        if ($request->hasFile('name')){
            $file = $request->file('name');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/product');
            $file->move($path, $image);
        }

        $p = new Image();
        $p->product_id = $request->product_id;
        $p->name = $image;
        $p->save();

        Session::flash('success', 'Thêm mới ảnh thành công');
        return redirect('admin/image');


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
        $product = Product::all();
        $arrPro = [];
        foreach ($product as $item) {
            $arrPro[$item->id] = $item->title;
        }
        /*echo "<pre>";
        print_r($arrPro);
        die();*/

        $image = Image::findOrFail($id);

        return view('admin.image.edit',
            ['image' => $image,
                'product' => $arrPro]
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
        $img = Image::findOrFail($id);

        $image = $img->name;
        if ($request->hasFile('name')){
            $file = $request->file('name');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/product');
            $file->move($path, $image);
        }

        $img->product_id = $request->product_id;
        $img->name = $image;
        $img->save();

        Session::flash('success', 'Cap nhat ảnh thành công');
        return redirect('admin/image');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Image::findOrFail($id);
        $img->delete();

        Session::flash('success', "Bạn đã xóa thành công");
        return redirect('admin/image');
    }
}
