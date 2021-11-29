<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\PageDataTable;
use App\Models\Page;
use DB;
use Illuminate\Http\Request;

class SliderController extends AdminController
{

      public function index(){
          $t = 'Sliders';
        $sliders = DB::table('sliders')->get();
        return view('admin.slider', compact('sliders', 't'));
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

      public function show($id) // act as del function
        {
          DB::table('sliders')->where('id',$id)->delete();
            return back()->with(['message' => __('com.deleted')]);
        }

    public function editSlider($id)
    {
        $t = 'Edit slider';
        $row = DB::table('sliders')->where('id',$id)->first();
        return view('admin.sliders.edit', compact('row', 't'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
           'title'=>'required',
            'caption'=>'required'
        ]);

        if( $request->file('image')) {
            $file = $request->file('image');
            $file_name = 'slider-' . rand(1, time()) . '.' . $file->getClientOriginalExtension();
            $destinationPath = substr(base_path(), 0, -4) . '/images/sliders';
            $file->move($destinationPath, $file_name);
        }else{
            $file_name = DB::table('sliders')->where('id', $id)->first()->image;
        }
        DB::table('sliders')->where('id', $id)->update([
            'title'=>$request->title,
            'caption'=>$request->caption,
            'button_name'=>$request->button_name,
            'button_value'=>$request->button_value,
            'image'=>$file_name,
            'status'=>$request->status,
        ]);

        return redirect('/admin/slider')->with(['success' => 'Slider has been Edited!']);
    }






}
