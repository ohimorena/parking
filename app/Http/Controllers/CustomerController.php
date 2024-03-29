<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
  public function index() {
    $custs_autos = DB::table('customers')
                      ->join('autos', 'customers.id', '=','autos.cust_id')
                      ->select('customers.id','customers.full_name', 'autos.id as auto_id', 'autos.brand', 'autos.model', 'autos.color', 'autos.reg_number')
                      ->paginate(10);                 
    return view('custs.index', compact('custs_autos'));
  }


  public function create() {
    return view('custs.create');
  }


  public function store() {
    $cust_new = request()->validate([
      'full_name' => 'min:3',
      'sex' => 'required',
      'phone' => 'required|unique:customers',
      'address' => 'nullable',
    ]);

    $auto_new = request()->validate([
      'brand' => 'required',
      'model' => 'required',
      'color' => 'required',
      'reg_number' => 'required|unique:autos',
      'is_parking' => 'required',
    ]);
    
    $cust_id = DB::table('customers')->insertGetId($cust_new);
    $auto_new['cust_id'] = $cust_id;
    DB::table('autos')->insert($auto_new);
    return redirect()->route('custs.index');
  }


  public function edit($cust_id) {
    $cust = DB::table('customers')->where('id', $cust_id)->first();
    $autos = DB::table('autos')->where('cust_id', $cust_id)->get();
    return view('custs.edit', compact('cust', 'autos'));
  }


  public function update($cust_id) {
    $cust_update = request()->validate([
      'full_name' => 'min:3',
      'sex' => 'required',
      'phone' => 'required',
      'address' => 'nullable',
    ]);
    DB::table('customers')->where('id', $cust_id)->update($cust_update);
    return redirect()->route('custs.index');
  }


  public function destroy($cust_id) {
    DB::table('customers')->where('id', $cust_id)->delete();
    return redirect()->route('custs.index');
  }
}
