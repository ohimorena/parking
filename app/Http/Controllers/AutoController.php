<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutoController extends Controller
{

  public function create() {
    return view('custs.create');
  }


  public function store() {
    $auto_new = request()->validate([
      'brand' => 'required',
      'model' => 'required',
      'color' => 'required',
      'reg_number' => 'required|unique:autos',
      'is_parking' => 'required',
      'cust_id' => '',
    ]);
    DB::table('autos')->insert($auto_new);
    return redirect()->route('custs.index');
  }


  public function update($auto_id) {
    $auto_update = request()->validate([
      'brand' => 'required',
      'model' => 'required',
      'color' => 'required',
      'reg_number' => 'required',
      'is_parking' => '',
    ]);
    DB::table('autos')->where('id', $auto_id)->update($auto_update);
    return redirect()->route('custs.index');
  }


  public function destroy($auto_id) {
    DB::table('autos')->where('id', $auto_id)->delete();
    return redirect()->route('custs.index');
  }
}
