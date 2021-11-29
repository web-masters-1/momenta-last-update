<?php
namespace App\Http\Controllers\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
      Session::put('applocale', $lang);
        return Redirect::to('/');
    }
}
