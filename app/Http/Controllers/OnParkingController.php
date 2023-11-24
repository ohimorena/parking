<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnParkingController extends Controller
{
  public function index() {
    $autos = DB::table('autos')
                      ->where('autos.is_parking', 1)
                      ->paginate(3);

    $auto_amount = DB::table('autos')->where('autos.is_parking', 1)->count();
    return view('on_parking.index', compact('autos', 'auto_amount'));
  }


  public function update($id) {
    DB::table('autos')->where('id', $id)->update(['is_parking' => 0]);
    return redirect()->route('on_parking.index');
  }
}
