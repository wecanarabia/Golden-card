<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::latest()->get();
        return view('admin.transactions.index',compact('data'));
    }

    public function show(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('admin.transactions.show',compact('transaction'));
    }

    public function destroy(Request $request)
    {
        Transaction::findOrFail($request->id)->delete();
        return redirect()->route('admin.transactions.index')->with('success','Transaction has been removed successfully');
    }
}
