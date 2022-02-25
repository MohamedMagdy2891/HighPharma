<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $rows = User::latest()->paginate(5);
        return view('admin.users.index',compact('rows'))->with('search','')->with('search_name','');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function message()
    {
        return [
            'name.required'=> 'يجب ادخال اسم المستخدم',
            'name.string' => 'اسم المستخدم يجب ان يكون نصوص فقط',
            'email.required' => 'يجب ادخال البريد الالكتروني',
            'email.string' =>'البريد الالكتروني يجب ان يكون نصوص فقط',
            'email.email'=>'يجب ادخال بريد الكتروني صحيح',
            'email.unique' => 'البريد الالكتروني هذا مسجل من قبل',
            'password.required' => 'يجب ادخال كلمة المرور',
            'password.min' =>'كلمة المرور يجب ان تحوت على اكثر من 8 احرف او ارقام',
            'password.string' =>'كلمة المرور يجب ان تحتوي على احرف وارقام',
            'password.confirmed' =>'يجب تطابق كلمتى المرور',
            'is_admin.required' =>'يجب اختيار رتبة المستخدم',
        ];
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['required']
        ],$this->message());

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('admin.users.index')->with('success','تم اضافة المتسخدم '.$request->name.' الى النظام بنجاح.');

    }
    public function show($id)
    {
        $row = User::findOrFail($id);
        return view('admin.users.show',compact('row'));
    }
    public function edit($id)
    {
        $row = User::findOrFail($id);
        return view('admin.users.edit',compact('row'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'is_admin' => ['required']
        ],$this->message());
        $row = User::findOrFail($id);
        if($request->name == $row->name && $request->is_admin == $row->is_admin){
            return redirect()->route('admin.users.edit',$row->id)->with('error','لم يتم تعديل بيانات المستخدم '.$row->name .' لعدم التغيير فى البيانات');
        }else{
            $row->name = $request->name;
            $row->is_admin = $request->is_admin;
            $row->save();

            return redirect()->route('admin.users.edit',$row->id)->with('success','تم تعديل بيانات المستخدم '.$request->name.'  بنجاح');
        }
        
        

    }
    public function destroy($id)
    {
        $row = User::findOrFail($id);
        $row->delete();
        return redirect()->route('admin.users.index',$row->id)->with('success','تم حف المستخدم '.$row->name.'  من النظام بنجاح');
    }

    public function search(Request $request)
    {
        if($request->name == null){
            return redirect()->route('admin.users.index');
        }
        else{
            $rows = User::query()->where('name','LIKE','%'.$request->name.'%')->latest()->paginate(5);
            return view('admin.users.index',compact('rows'))->with('search','search')->with('search_name',$request->name);
        }
    }

}