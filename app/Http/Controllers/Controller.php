<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home(){
        $data['items'] = Item::get();
        $data['count'] = count($data['items']);
        return view('index', $data);
    }
    public function viewLogin(){
        return view('login');
    }
    public function admin(){
        return view('welcome');
    }
    public function detail($id){
        $data['item'] = Item::where('id',$id)->with('type')->first();
        return view('detail', $data);
    }
    
}
