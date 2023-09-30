<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'transaction_type', 'amount', 'fee', 'date'
    ];

    // Define a method to create a new transaction
    public static function createTransaction($user_id, $transaction_type, $amount, $fee, $date)
    {
        return self::create([
            'user_id' => $user_id,
            'transaction_type' => $transaction_type,
            'amount' => $amount,
            'fee' => $fee,
            'date' => $date,
        ]);
    }

    // Define a method to get all transactions
    public static function getAllTransactions()
    {
        return self::all();
    }

    // Define a method to get deposited transactions
    public static function getDepositedTransactions()
    {
        return self::where('transaction_type', 'deposit')->get();
    }

    // Define a method to get withdrawal transactions
    public static function getWithdrawalTransactions()
    {
        return self::where('transaction_type', 'withdrawal')->get();
    }
}
