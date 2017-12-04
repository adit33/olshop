<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;

class ReportController extends Controller
{
    public function report(){
    	$transaction = new Transaction;
        $sum=$transaction->reportTransactionMonthly();
        return view('backend.transaction.report',compact('sum'));
    }
}
