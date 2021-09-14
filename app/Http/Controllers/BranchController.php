<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use DateTime;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // $date = new DateTime(now());
        // dd($date->format('Y-m-d'));
        $branches_balance = Branch::join('Shift', 'Shift.BranchID', '=', 'Branches.ID')
            ->where('Shift.Date', '2017-09-09')
            ->get(['Branches.Branch', 'Shift.OpeningBalance', 'Shift.ClosingBalance']);

        return view('layouts.main')->with('branches_balance', $branches_balance);
    }
}
