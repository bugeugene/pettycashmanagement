<?php

namespace App\Http\Controllers;

use App\Models\PettyCashEntriesModel;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function showSummaryPage(){
        return view('/pcms-sum/list');
    }

    public function generateSummary(Request $request){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $model = new PettyCashEntriesModel();
        $summary = $model->getSummaryByPeriod($request->start_date, $request->end_date);

        return view('/pcms-sum/report', [
            'summary' => $summary,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date, ]);
    }

}
