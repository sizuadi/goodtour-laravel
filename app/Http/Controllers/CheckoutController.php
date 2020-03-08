<?php

namespace App\Http\Controllers;

use App\TravelPacks;
use App\Transactions;
use App\TransactionDetail;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index(Request $request, $id){
        $item = Transactions::with(['travel_packs', 'details', 'user'])->findOrFail($id);
        
        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id){
        $travel_packs = TravelPacks::findOrFail($id);
        $transaction = Transactions::create([
            'travel_packs_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_packs->price,
            'transaction_status' => 'IN_CART'  
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->transactions_id,
            'username' => Auth::user()->username,
            'nationality' => Auth::user()->nationality,
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->transactions_id);
    }
    public function remove(Request $request, $detail_id){
        $item = TransactionDetail::findOrFail($detail_id);
        $transaction = Transactions::with(['travel_packs', 'details'])->findOrFail($item->transactions_id);

        if ($item->is_visa) {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }
        $transaction->transaction_total += $transaction->travel_packs->price;
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }
    public function create(Request $request, $id){
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transactions::with(['travel_packs'])->find($id);

        if ($request->is_visa) { 
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }
        $transaction->transaction_total += $transaction->travel_packs->price;

        $transaction->save();
        return redirect()->route('checkout', $id);
    }
    public function success(Request $request, $id){

        $transaction = Transactions::findOrFail($id);

        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        return view('pages.checkout-success');
    }
    public function cancel(Request $request, $id){

        $transaction = Transactions::findOrFail($id);

        $transaction->transaction_status = 'CANCEL';

        $transaction->save();
        return redirect()->route('home');
    }
}
