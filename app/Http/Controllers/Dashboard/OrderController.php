<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Client;
use App\Product;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $client = Client::findOrFail($id);
        $rows = Order::query()->where('client_id',$id)->latest()->get();
        return view('admin.orders.index',compact(['rows','client']));
    }

    public function create($id)
    {
        $client = Client::findOrFail($id);
        $rows = Product::latest()->get();
        return view('admin.orders.create',compact(['rows','client']));
    }

    public function message()
    {
        return [
            'order.required'=>'يجب اختيار المنتج',
            'count.required'=>'الكمية مطلوبة',
            'count.integer'=>'يجب ادخال ارقام صحيحة فقط',
            'count.min'=>'لا يمكن ادخال رقم اقل من 1',
            'count.numeric'=>'يجب ادخال ارقام فقط',
            'count.required'=>'الكمية مطلوبة',
            'type.required'=>'يجب اختيار النوع',
        ];
    }
    public function store($id,Request $request)
    {
        $request->validate([
            'order'=>'required',
            'count' => 'required|numeric|integer|min:1',
            'type' => 'required'
        ],$this->message());
        $client = Client::findOrFail($id);
        $product = Product::findOrFail($request->order);
        if($request->count <=  $product->count){

            $order = new Order();
            $order->product_id = $request->order;
            $order->client_id = $client->id;
            $order->count = $request->count;
            $order->status = $request->type;

            if($request->type == 0){
                $order->salary = $product->price_one;
            }else{
                $order->salary = $product->price_gomla;
            }
            
            if($order->save()){
                $product->count = $product->count-$request->count;
                $product->save();
            }

            return redirect()->route('admin.orders.index',$client->id)->with('success','تم اضافة الطلب الى السلة وتم خصم الكمية المطلوبة من المخزن بنجاح');
        }else{
            return redirect()->route('admin.orders.create',$client->id)->with('error','الكمية المطلوبة اكبر من الكمية المتاحة فى المخزن')
            ->with('order',$request->order)->with('count',$request->count)->with('type',$request->type);
        }
        
    }
    

    public function destroy($id,$order_id)
    {
        $client = Client::findOrFail($id);
        $order = Order::findOrFail($order_id);
        
        $product = Product::findOrFail($order->product_id);
       
        
        if($order->delete()){
            $product->count = $product->count+$order->count;
            $product->save();
        }

        return redirect()->route('admin.orders.index',$client->id)->with('success','تم حذف كمية '.$order->count.'من منتج '.$product->name.' من السلة وتم استرجعاه الى المخزن بنجاح');
        
    }
}