<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Transactions</title>
    <style>
        /* Center-align content */
        body {
            display: flex;
            flex-direction: column;
      
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        table, td, th {
            border: 1px solid;
            
            }

            table {
            width: 50%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    @php
    $totalbalance = 0;


    @endphp
    
   
    @if (session("status") == "logged_in")
    <h1>Welcome {{ session('user_id') }}</h1>
    <h1>Welcome {{ session('name') }}</h1>
    <h1>Welcome {{ session('email') }}</h1>
    <h1>Welcome {{ session('balance') }}</h1>
    <h1>Welcome {{ session('account_type') }}</h1>
    <h1>Welcome {{ session('created_at') }}</h1> 
    @endif
    <h1>All Transactions</h1>
    <br/>
    <br/>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->transaction_type }}</td>
                    <td>{{ $transaction->amount }}</td>
                    @php
                        if ($transaction->transaction_type == 'deposit') {
                            $totalbalance += $transaction->amount;
                        } else if ($transaction->transaction_type == 'withdrawal') {
                            $totalbalance -= $transaction->amount;
                        }
                    @endphp
                </tr>
            @endforeach
        </tbody>
        
    </table>

    <h2> Balance: {!! $totalbalance !!}</h2>
   
</body>
</html>
