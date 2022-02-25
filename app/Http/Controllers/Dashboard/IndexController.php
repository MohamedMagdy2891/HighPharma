<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index()
    {
        $products = count(Product::get()->all());
        $orders = count(Order::get()->all());
        $clients = count(Client::get()->all());
        $users = count(User::get()->all());
        return view('admin.index',compact(['products','orders','clients','users']));
    }

    public function profile()
    {
        return view('admin.profile');
    }
    public function message()
    {
        return [
            'name.required'=> 'يجب ادخال اسم المستخدم',
            'name.string' => 'اسم المستخدم يجب ان يكون نصوص فقط',
            'password.confirmed' =>'يجب تطابق كلمتى المرور',
        ];
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'password' => ['confirmed']
        ],$this->message());
        
        if($request->name == Auth::user()->name && $request->password == null){
            return redirect()->route('admin.profile')->with('error','لم يتم تعديل بياناتك لعدم التغيير فى البيانات');
        }else{
            
            $row = User::findOrFail(Auth::user()->id);
            $password = Hash::make($request->password);
            $row->name = $request->name;
            $row->password = $password;
            $row->save();

            return redirect()->route('admin.profile')->with('success','تم تعديل بياناتك بنجاح');
        }
        
        

    }
}