<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\PageDataTable;
use App\Models\Page;
use DB;
use Illuminate\Http\Request;

class MessageController extends AdminController
{

    public function index(){
        $t = 'Feedbacks';
      //$rows = DB::table('messages')->get();
        $rows = DB::table('comments')
            ->join('pages', 'comments.page_id', '=', 'pages.id')
            ->select('comments.*', 'pages.title')
            ->get();

        //dd($rows);



      return view('admin.message', compact('rows', 't'));
    }

    public function show($id)
      {
        $row = DB::table('comments')->where('id',$id)->first();
       if($row->status == 0)
       {
           DB::table('comments')->where('id',$id)->update([
                'status'=>1,
           ]);
       }else{
           DB::table('comments')->where('id',$id)->update([
               'status'=>0,
           ]);
       }
          return back()->with(['message' => __('com.updated')]);
      }


}
