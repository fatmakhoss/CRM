<?php

namespace App\Http\Controllers;
use App\Models\Contrats;
use App\Models\interactions;
use App\Models\Leads;
use App\Models\Clients;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $leadsCount = Leads::count();
        $interactionsCount = interactions::count();
        $contratsCount = Contrats::count();
        $clientsCount=Clients::count();

        return view('dashboard.index', compact('leadsCount', 'interactionsCount', 'contratsCount', 'clientsCount'));
    }
}

