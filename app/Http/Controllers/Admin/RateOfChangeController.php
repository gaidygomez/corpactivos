<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RateOfChangeRequest;
use App\Model\RateOfChange;

//use Illuminate\Http\Request;

class RateOfChangeController extends Controller
{
   public function rate(RateOfChangeRequest $request)
   {
       RateOfChange::updateOrCreate([ 'id' => 1 ], [
           'dolar_peso' => $request['dolar_peso'],
           'dolar_bs' => $request['dolar_bs'],
           'peso_bs' => $request['pesos_bs']
       ]);

       return back()->with('success', 'Tasas Actualizadas');
   }

   public function rateOfChange()
   {
       $rate = RateOfChange::select('dolar_peso', 'dolar_bs', 'peso_bs')->first();

       return $rate;
   }
}
