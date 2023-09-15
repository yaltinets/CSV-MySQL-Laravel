<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class ResultController extends Controller
{
    public function showData()
    {
        $transactionModel = new Transaction;
        $showData = $transactionModel->getData();

        return view('result', compact('showData'));
    }
}
