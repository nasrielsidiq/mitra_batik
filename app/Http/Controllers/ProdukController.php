<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Sell;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{

    public function addTransaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'payment_type' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $order_id = explode(',',$request->order_id);
        $order = Order::whereIn('id', $order_id)->with('item')->get();
        $order_to_delete = Order::whereIn('id', $order_id)->get();
        $id_item = array_map(function($item){
            return $item['id_item'];
        }, $order->toArray());
        $item = Item::whereIn('id', $id_item)->get();
        // dd($request->order_id);
        // if (!$order) {
        //     Alert::error('order data not found');
        //     return redirect('/');
        // }
        // $user = Auth::user();
        // $user = User::where('id',$user->id)->with('payment')->first();
        $subtotal = 0;
        foreach ($order as $key) {
            $subtotal = $subtotal + $key->cost;
        }
        $shipping = 10000;
        $total = $shipping+$subtotal;
        $payment = new Sell();
        $payment->id_user = Auth::user()->id;
        $payment->id_payment_type = $request->payment_type;
        $payment->order_code = sprintf("ORD%s%d%s", implode('',$order_id), count($order_id), date('Ymd'));
        $payment->addres = $request->address;
        $payment->note = $request->note;
        $payment->bill = $total;
        $payment->shipping = $shipping;
        $payment->save();

        foreach ($item as $key => $value) {
            $value->update([
                'stocks' => $value->stocks - $order[$key]->qty
            ]);
        }

        $order->each(function($order) {
            $order->delete();
        });
        Alert::toast('Ordered','success');
        return redirect('/');

    }
}
