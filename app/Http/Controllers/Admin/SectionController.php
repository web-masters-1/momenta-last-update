<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\PageDataTable;
use App\Models\Page;
use DB;
use Illuminate\Http\Request;

class SectionController extends AdminController
{

    public function index(){
        $t = 'Sections';
        $rows = DB::table('sections')->get();
        return view('admin.sections.index', compact('rows', 't'));
    }

    public function store(Request $request){

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
        $t = 'Edit section';
        $row = DB::table('sections')->where('id',$id)->first();
        return view('admin.sections.edit', compact('row', 't'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title'=>'required',
        ]);

        if( $request->file('image')) {
            $file = $request->file('image');
            $file_name = 'slider-' . rand(1, time()) . '.' . $file->getClientOriginalExtension();
            $destinationPath = substr(base_path(), 0, -4) . '/images/sections';
            $file->move($destinationPath, $file_name);
        }else{
            $file_name = DB::table('sections')->where('id', $id)->first()->image;
        }
        if( $request->file('icon')) {
            $file = $request->file('icon');
            $iconFile = 'icon-' . rand(1, time()) . '.' . $file->getClientOriginalExtension();
            $destinationPath = substr(base_path(), 0, -4) . '/images/icons';
            $file->move($destinationPath, $iconFile);
        }else{
            $iconFile = DB::table('sections')->where('id', $id)->first()->icon;
        }

        DB::table('sections')->where('id', $id)->update([
            'title'=>$request->title,
            'sub_title'=>($request->sub_title) ? $request->sub_title : null,
            'text'=>($request->text) ? $request->text : null,
            'link'=>($request->link) ? $request->link : null,
            'image'=>$file_name,
            'icon'=>$iconFile,
        ]);

        return redirect('/admin/section')->with(['success' => 'Section has been Edited!']);
    }






}
