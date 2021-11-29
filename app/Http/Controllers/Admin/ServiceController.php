<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\PageDataTable;
use App\Models\Page;
use DB;
use Illuminate\Http\Request;

class ServiceController extends AdminController
{

    public function index(){
        $t = 'Services';
        $rows = Page::where('parent_id', 19)->take(8)->get(); // services
        return view('admin.services.index', compact('rows', 't'));
    }

    public function store(Request $request)
    {

        if( $request->file('image')){
            $file = $request->file('image');
            $file_name = 'slider-'.rand(1, time()).'.'.$file->getClientOriginalExtension();
            $destinationPath = substr(base_path(), 0,-4).'/images/sliders';
            $file->move($destinationPath, $file_name);

            DB::table('sliders')->insert([
                'title'=>$request->title,
                'caption'=>$request->caption,
                'button_name'=>$request->button_name,
                'button_value'=>$request->button_value,
                'image'=>$file_name,
                'status'=>1,
            ]);

            return back()->with(['success' => 'Slider has been added!']);
        }

        return back()->with(['error' => 'There is something went wrong']);

    }



    public function show($id)
    {
        $t = 'Edit service';
        $row = Page::where('id',$id)->first();
        //dd($row);
        return view('admin.services.edit', compact('row', 't'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title'=>'required',
        ]);

        if( $request->file('icon')) {
            $file = $request->file('icon');
            $iconFile = 'service_icon-' . rand(1, time()) . '.' . $file->getClientOriginalExtension();
            $destinationPath = substr(base_path(), 0, -4) . '/images/icons';
            $file->move($destinationPath, $iconFile);
        }else{
            $iconFile = DB::table('pages')->where('id', $id)->first()->icon;
        }
        
        if( $request->file('image')) {
            $file = $request->file('image');
            $imageFile = 'service_icon-' . rand(1, time()) . '.' . $file->getClientOriginalExtension();
            $destinationPath = substr(base_path(), 0, -4) . '/images/services';
            $file->move($destinationPath, $imageFile);
        }else{
            $imageFile = DB::table('pages')->where('id', $id)->first()->image;
        }

        DB::table('pages')->where('id', $id)->update([
            'title'=>$request->title,
            'description'=>($request->description) ? $request->description : null,
            'content'=>($request->content) ? $request->content : null,
            'icon'=>$iconFile,
            'image'=>$imageFile
        ]);

        return redirect('/admin/service')->with(['success' => 'Service has been Edited!']);
    }






}
