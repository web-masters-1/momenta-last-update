<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\PageDataTable;
use DB;
use Illuminate\Http\Request;

class RequestController extends AdminController
{

    public function index(){
        $rows = DB::table('requests')->get();
        return view('admin.request', compact('rows'));
    }

    public function show($id)
    {
        DB::table('requests')->where('id',$id)->delete();
        return back()->with(['message' => __('com.deleted')]);
    }


}
