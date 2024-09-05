<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function order(Request $request, $id)
    {
        $item = Item::find($id);
        if (!$item) {
            Alert::error('Produk not found');
            return redirect()->back();
        }
        $user = Auth::user();
        $order = Order::where('id_item', $item->id)->first();
        if ($order) {
            $qty = $order->qty + $request->qty;
            $order->update([
                'id_item' => $item->id,
                'id_user' => $user->id,
                'qty' => $qty,
                'cost' => $item->cost * $qty
            ]);
            Alert::success('Order Succses', 'Order updated');
        } else {
            Order::create([
                'id_item' => $item->id,
                'id_user' => $user->id,
                'qty' => $request->qty,
                'cost' => $item->cost * $request->qty
            ]);
            Alert::success('order success', 'Order Created');
        }
        return redirect()->back();
    }
    public function orderUpdate(Request $request,$id){
        $order = Order::where('id',$id)->first();
        $item = Item::find($order->id_item);
        if (!$order) {
            Alert::error('Not Found', 'Your order did\'t have any value');
        }
        $order->update([
            'qty' => $request->qty,
            'cost' => $item->cost * $request->qty
        ]);
        Alert::toast('Order updated','success');
        return redirect()->back();
    }
    public function getOrder(){
        $data['order'] = Sell::with('paymet')->get();
        return view('get_order', $data);
    }
}
