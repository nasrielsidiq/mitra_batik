<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function viewTransaction(Request $request){
        $order_id = explode(',',$request->order_id);
        $data['order'] = Order::whereIn('id', $order_id)->with('item')->get();
        // if (!$data['order']) {
        //     Alert::error('order data not found');
        //     return redirect('/');
        // }
        $user = Auth::user();
        $data['id_orders'] = $request->order_id;
        $data['user'] = User::where('id',$user->id)->with('payment')->first();
        $data['subtotal'] = 0;
        foreach ($data['order'] as $key) {
            $data['subtotal'] = $data['subtotal'] + $key->cost;
        }
        $data['shipping'] = 10000;
        $data['total'] = $data['shipping']+$data['subtotal'];
        return view('checkout', $data);
    }
    public function viewOrder(){
        $user = Auth::user();
        $data['orders'] = Order::where('id_user',$user->id)->with('item')->get();
        $data['subtotal'] = 0;
        foreach ($data['orders'] as $value) {
            $data['subtotal'] = $data['subtotal'] + $value->cost;
        }
        $id_orders = array_map(function($item){
            return $item['id'];
        }, $data['orders']->toArray());
        $data['id_orders'] = implode(',',$id_orders);
        // dd($data['orders']);
        return view('cart',$data);
    }
}
