<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class WelcomeController extends Controller {
    /**
    * Responds to requests to GET /
    */
    public function getIndex() {
        if(\Auth::check()) {
            return redirect()->to('/recipes');
        }
        return view('welcome.index');
    }
}
