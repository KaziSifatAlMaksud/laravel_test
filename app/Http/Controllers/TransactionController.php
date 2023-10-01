<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //create transection
                public function showCreateForm()
            {
                if (session('email')) {
                    return view('create_transaction');
                } else {
                    return redirect()->route('login')->with('error', 'You must be logged in to create a transaction.');
                }
              
            }

            public function processTransaction(Request $request)
            {
                $request->validate([
                    'user_id' => 'required',
                    'transaction_type' => 'required',
                    'amount' => 'required',
                    'fee' => 'required',
                    'date' => 'required',
                ]);

                if ($request->transaction_type == 'deposit') {
                    if (session('user_id')) {                        
                        $user = User::where('id', $request->user_id)->first();
                        $user->balance += $request->amount; 
                        $user->save();
                        session(['balance' => $user->balance]);
                    }
                    Transaction::create([
                        'user_id' => $request->user_id,
                        'transaction_type' => $request->transaction_type,
                        'amount' => $request->amount,
                        'fee' => $request->fee,
                        'date' => $request->date,
                    ]);

                
    
                    return redirect('/')->with('success', 'Transaction deposited successfully');

                } elseif ($request->transaction_type == 'withdrawal') {
                    
                        $accountType = $request->account_type; 
                    
                      
                        $withdrawalFee = $request->amount * 0.015;
                    
                        Transaction::create([
                            'user_id' => $request->user_id,
                            'transaction_type' => $request->transaction_type,
                            'amount' => $request->amount,
                            'fee' => $withdrawalFee,
                            'date' => $request->date,
                        ]);
                    
                        return redirect('/')->with('success', 'Transaction deposited successfully');
                    }
                    

                        // $withdrawalAmount = $request->amount;
                        // $accountType = $request->account_type;


                        
                        // // Apply appropriate withdrawal rate based on account type
                        // $withdrawalRate = ($accountType == 'individual') ? 0.015 : 0.025;
                        // $withdrawalFee = $withdrawalAmount * $withdrawalRate;

                        // // Implement free withdrawal conditions for Individual accounts
                        // if ($accountType == 'individual') {
                            
                        //     if (date('N') == 5 && $withdrawalAmount <= 1000) {
                        //         $withdrawalFee = 0;
                        //     }

                            
                        //     if ($withdrawalAmount <= 5000) {
                        //         $withdrawalFee = 0;
                        //     }

                        //     // Check if the withdrawal amount is within the free limit
                        //     if ($withdrawalAmount <= 1000) {
                        //         $withdrawalFee = 0;
                        //     }
                        // }

                       
                        // if ($accountType == 'Business') {
                          
                            
                                // $withdrawalFee = $withdrawalAmount * 0.015;
                                // Transaction::create([
                                //     'user_id' => $request->user_id,
                                //     'transaction_type' => $request->transaction_type,
                                //     'amount' => $request->amount,
                                //     'fee' => $withdrawalFee,
                                //     'date' => $request->date,
                                // ]);
                 
                                // return redirect('/')->with('success', 'Transaction deposited successfully');
                            
                      //  }

                   
                

               
            }


    public function showAllTransactions()
    {
        // Get all transactions and current balance
        if (session('email')) {
            $transactions = Transaction::all();
            $balance = User::sum('balance');
            return view('transactions', compact('transactions'));
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to create a transaction.');
        }
       

        
    }

    public function showDepositedTransactions()
    {
        if (session('email')) {
            // Get deposited transactions
            $transactions = Transaction::where('transaction_type', 'deposit')->get();
            return view('transactions', compact('transactions'));
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to create a transaction.');
        }
        
    }



    public function showWithdrawalTransactions()
    {
        // Get withdrawal transactions
        if (session('email')) {
            $transactions = Transaction::where('transaction_type', 'withdrawal')->get();
            return view('transactions', compact('transactions'));
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to create a transaction.');
        }
        
    }

   
}
