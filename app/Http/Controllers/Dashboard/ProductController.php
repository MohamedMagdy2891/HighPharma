<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;

class ProductController extends IndexController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $rows = Product::latest()->paginate(5);
        return view('admin.products.index',compact('rows'))->with('search','')->with('search_name','');
    }
    public function create()
    {
        return view('admin.products.create');
    }

    
    public function message()
    {
        return[
            'name.required' => 'يجب ادخال اسم المنتج',
            'name.string' => 'اسم المنتج يجب ان يحتوي على حروف فقط',
            'name.unique' => 'اسم المنتج هذا مسجل فى النظام من قبل',
            'count.required' => 'يجب ادخال عدد المنتج ' ,
            'count.integer' => 'يجب ادخال ارقام فقط' ,

            'price_one.required' => 'يجب ادخال سعر المنتج بالقطعة ' ,

            'price_gomla.required' => 'يجب ادخال سعر المنتج بالجملة ' ,
            

        ];
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|unique:products',
            'count' => 'required|integer',
            'price_one' => 'required',
            'price_gomla' => 'required',
        ],$this->message());
        
        $product = new Product;
        $product->name = $request->name;
        $product->count = $request->count;
        $product->price_one = $request->price_one;
        $product->price_gomla = $request->price_gomla;
        $product->save();
        

        
        return redirect()->route('admin.products.index')->with('success','تم اضافة منتج '.$request->name.' الى المخزن بنجاح.');
    }

    public function show($id)
    {
        $row = Product::findOrFail($id);
        return view('admin.products.show',compact('row'));
    }

    public function edit($id)
    {
        $row = Product::findOrFail($id);
        return view('admin.products.edit',compact('row'));
    }

    public function update($id,Request $request)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'count' => 'required|integer',
            'price_one' => 'required',
            'price_gomla' => 'required',
        ],$this->message());
        $error = 0;
        if($request->name == $product->name){
            $error++;
        }
        if($request->count == $product->count){
            $error++;
        }
        if($request->price_one == $product->price_one){
            $error++;
        }
        if($request->price_gomla == $product->price_gomla){
            $error++;
        }
        if($error == 4){
            return redirect()->route('admin.products.edit',$product)->with('failed','فشل تعديل منتج '.$product->name.' لعدم التغيير فى البيانات.');
        }
        
        $product->name = $request->name;
        $product->count = $request->count;
        $product->price_one = $request->price_one;
        $product->price_gomla = $request->price_gomla;
        $product->update();
        

        
        return redirect()->route('admin.products.index')->with('success','تم تعديل منتج '.$request->name.' بنجاح.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','تم حذف منتج '.$product->name.' من المخزن بنجاح.');
    }

    public function search(Request $request)
    {
        if($request->name == null){
            return redirect()->route('admin.products.index');
        }
        else{
            $rows = Product::query()->where('name','LIKE','%'.$request->name.'%')->latest()->paginate(5);
            return view('admin.products.index',compact('rows'))->with('search','search')->with('search_name',$request->name);
        }
    }
}