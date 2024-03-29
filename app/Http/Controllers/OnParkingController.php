<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnParkingController extends Controller
{
  public function index() {
    $autos = DB::table('autos')
                      ->where('autos.is_parking', 1)
                      ->paginate(10);

    $auto_amount = DB::table('autos')->where('autos.is_parking', 1)->count();

    $custs = DB::table('customers')
                      ->select('id','full_name')
                      ->get();
    return view('on_parking.index', compact('autos', 'auto_amount', 'custs'));
  }


  public function get_autos($cust_id) {
    $autos = DB::table('autos')->where('cust_id', $cust_id)->get();
    return compact('autos');
  }


  public function update_remove($id) {
    DB::table('autos')->where('id', $id)->update(['is_parking' => 0]);
    return redirect()->route('on_parking.index');
  }

  
  public function store() {
    $auto_id = request()->validate([
      'auto_id' => ''
    ]);
    DB::table('autos')->where('id', $auto_id)->update(['is_parking' => 1]);
    return redirect()->route('on_parking.index');
  }
}