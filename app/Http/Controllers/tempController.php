<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Leads;
class tempController extends Controller
{
    public function index1(){
        $clients =clients::all();
        return view('temp.index1',compact('clients'));
    }

}
