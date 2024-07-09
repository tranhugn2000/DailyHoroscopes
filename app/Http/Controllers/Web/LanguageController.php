<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLocale(Request $request)
    {
        $request->validate(['locale' => 'required|string|in:en,vi']);
        Session::put('locale', $request->locale);
        return redirect()->back();
    }
}
