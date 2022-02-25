<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class ClientController extends IndexController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $rows = Client::latest()->paginate(5);
        return view('admin.clients.index',compact('rows'))->with('search','')->with('search_name','');
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function message()
    {
        return [
            'name.required' => 'اسم العميل مطلوب',
            'address.required' => 'عنوان العميل مطلوب',
            'first_phone.required' => 'رقم هاتف العميل مطلوب',
            'first_phone.numeric' => 'رقم الهاتف يجب ان يحتوب على ارقام فقط',
            'first_phone.digits' => 'يجب ادخال رقم هاتف صحيح',
            'second_phone.numeric' => 'رقم الهاتف يجب ان يحتوب على ارقام فقط',
            'second_phone.digits' => 'يجب ادخال رقم هاتف صحيح',
        ];
    }
    public function store(Request $request)
    {
        
        if($request->second_phone != null){
            $request->validate([
                'name'=>'required',
                'address'=>'required',
                'first_phone' => 'required|numeric|digits:11',
                'second_phone'=>'numeric|digits:11'
            ],$this->message());
        }else{
            $request->validate([
                'name'=>'required',
                'address'=>'required',
                'first_phone' => 'required|numeric|digits:11',
            
            ],$this->message());
        }

        $row = new Client();
        $row->name = $request->name;
        $row->address = $request->address;
        $row->first_phone = $request->first_phone;
        $row->second_phone = $request->second_phone;

        $row->save();
        return redirect()->route('admin.clients.index')->with('success','تم اضافة العميل '.$request->name .' الى النظام بنجاح');
       
        
    }

    public function show($id)
    {
        $row = Client::findOrFail($id);
        return view('admin.clients.show',compact('row'));
    }

    public function edit($id)
    {
        $row = Client::findOrFail($id);
        return view('admin.clients.edit',compact('row'));
    }

    public function update($id ,Request $request)
    {
        
        if($request->second_phone != null){
            $request->validate([
                'name'=>'required',
                'address'=>'required',
                'first_phone' => 'required|numeric|digits:11',
                'second_phone'=>'numeric|digits:11'
            ],$this->message());
        }else{
            $request->validate([
                'name'=>'required',
                'address'=>'required',
                'first_phone' => 'required|numeric|digits:11',
            
            ],$this->message());
        }

        $row = Client::findOrFail($id);
        if($request->name == $row->name && $request->address == $row->address && $request->first_phone == $row->first_phone
            && $request->second_phone == $row->second_phone
        ){
            return redirect()->route('admin.clients.edit',$row->id)->with('error','لم يتم تعديل بيانات العميل '.$row->name .' لعدم التغيير فى البيانات');
        }
        
        $row->name = $request->name;
        $row->address = $request->address;
        $row->first_phone = $request->first_phone;
        $row->second_phone = $request->second_phone;

        $row->save();
        return redirect()->route('admin.clients.edit',$row->id)->with('success','تم تعديل بيانات العميل '.$request->name .' في النظام بنجاح');
       
        
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $orders = Order::query()->where('client_id',$id)->get();
        
        $client->delete();
        foreach ($orders as $order) {
            $order->delete();
        }
        return redirect()->route('admin.clients.index')->with('success','تم حذف بيانات العميل '.$client->name .' وجميع طلباته من النظام بنجاح');

    }

    public function search(Request $request)
    {
        if($request->name == null){
            return redirect()->route('admin.clients.index');
        }
        else{
            $rows = Client::query()->where('name','LIKE','%'.$request->name.'%')->latest()->paginate(5);
            return view('admin.clients.index',compact('rows'))->with('search','search')->with('search_name',$request->name);
        }
    }
}