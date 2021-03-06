<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
class UserController extends Controller
{

    public function __construct()
    {

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

            $list = User::where('name', 'like', '%' . $keyword . '%')->get();
        }else{
            $list = User::all();
        }

        /*echo "<pre>";
        print_r($list->toArray());
        die();*/
        return view('admin.user.show', ['user' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $group = Group::all();
        $arrGr = [];
        foreach ($group as $item) {
            $arrGr[$item->id] = $item->name;
        }
        /*print_r($arrGr);*/

        $user = User::findOrFail($id);

        return view('admin.user.edit', [
            'user' => $user,
            'group' => $arrGr
        ]);
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
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->group_id = $request->group_id;
        $user->email = $request->email;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->save();

        Session::flash('success', 'Cap nhat san pham thanh cong');
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('success', "Bạn đã xóa thành công!!!");

        return redirect('admin/user');
    }
}
