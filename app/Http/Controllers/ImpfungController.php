<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impfung;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;


class ImpfungController extends Controller
{
    public function index(){
      $impfung = Impfung::with(['persons'])->get();
       return $impfung;
       // return 'hallo';
       // $impfung = Impfung::all();
        //return $impfung;

        /* $impfung = Imfpung::all();
        return view('impfung.index', compact('impfung')); */
    }

    public function show($impfung){
        $impfung = Impfung::find($impfung);
        return view('impfung.show', compact('impfung'));
    }
}
