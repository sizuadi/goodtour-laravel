<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TravelPacks;
use App\Transactions;
use App\Countries;
use App\User;
use App\Comments;
use PDF;
use Carbon;


class DashboardController extends Controller
{
    public function index(Request $request){
        return view('pages.admin.dashboard', [
            'travel_packs' => TravelPacks::count(),
            'transactions' => Transactions::count(),
            'countries' => Countries::count(),
            'user' => User::count(),
            'comments' => Comments::count(),
            'transaction_pending' => Transactions::where('transaction_status', 'PENDING')->count(),
            'transaction_incart' => Transactions::where('transaction_status', 'IN_CART')->count(),
            'transaction_cancel' => Transactions::where('transaction_status', 'CANCEL')->count(),
            'transaction_failed' => Transactions::where('transaction_status', 'FAILED')->count(),
            'transaction_success' => Transactions::where('transaction_status', 'SUCCESS')->count()
        ]);
    }
    public function generatePDF()
    {
        $file = 'report-pdf.pdf';
        $data = ['title' => 'Welcome to belajarphp.net'];
        $pdf = PDF::loadView('pages.admin.reportDashboard', [
            'data' => $data,
            'travel_packs' => TravelPacks::count(),
            'transactions' => Transactions::count(),
            'countries' => Countries::count(),
            'user' => User::count(),
            'comments' => Comments::count(),
            'transaction_pending' => Transactions::where('transaction_status', 'PENDING')->count(),
            'transaction_incart' => Transactions::where('transaction_status', 'IN_CART')->count(),
            'transaction_cancel' => Transactions::where('transaction_status', 'CANCEL')->count(),
            'transaction_failed' => Transactions::where('transaction_status', 'FAILED')->count(),
            'transaction_success' => Transactions::where('transaction_status', 'SUCCESS')->count()
            ])
            ->setPaper('a4', 'potrait');
        return $pdf->download($file);
    }
}
