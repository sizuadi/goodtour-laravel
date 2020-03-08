<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Mail\TransactionSuccess;
use App\Mail\TransactionFailed;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionsRequest;
use App\Galleries;
use App\TravelPacks;
use App\TransactionDetail;
use App\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transactions::with([
            'details', 'travel_packs', 'user'
        ])->get();

        return view('pages.admin.transactions.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transactions::with([
            'details', 'travel_packs', 'user'
        ])->findOrFail($id);
        
        return view('pages.admin.transactions.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transactions::findOrFail($id);

        return view('pages.admin.transactions.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionsRequest $request, $id)
    {
        $data = $request->all();
        $item = Transactions::with(['details', 'travel_packs.galleries', 'user'])->findOrFail($id);
        $item->update($data);
        if( $item->transaction_status == 'SUCCESS'){
            
            Mail::to($item->user)->send(
                new TransactionSuccess($item)
            );
            return redirect()->route('transactions.index');
        }elseif ($item->transaction_status == 'FAILED') {
            Mail::to($item->user)->send(
                new TransactionFailed()
            );
            return redirect()->route('transactions.index');
        } else{
            return redirect()->route('transactions.index');
        }
        


    }
    public function generatePDF($request)
    {
        
        $file = 'report-transaction.pdf';
        $pdf = PDF::loadView('pages.admin.reportTransactions', [
            
            ])
            ->setPaper('a4', 'potrait');
        return $pdf->download($file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transactions::findOrFail($id);

        $item->delete();

        return redirect()->route('transactions.index');
    }
}
