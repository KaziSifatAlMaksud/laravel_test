<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Transaction</title>
    <style>
       
        body, html {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form {
            text-align: left;
            border: 1px solid black;
            padding: 20px;
            box-shadow: 10px 5px 5px gray;
        }
    </style>
</head>
<body>
    <h1> Name: {{ session('name') }} </h1>
    <h1> Username: {{ session('username') }} </h1>
    <h1> Balance: {{session('balance')}}</h1>
    <br/><br/><br/>

    <form action="{{ route('process_transaction') }}" method="post">
        @csrf
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" value="{{ session('user_id') }}"><br>
    
        <label>Transaction Type:</label><br>
        <input type="radio" name="transaction_type" value="deposit" required> Deposit<br>
        <input type="radio" name="transaction_type" value="withdrawal" required> Withdrawal<br>
    
        <label for="amount">Amount:</label>
        <input type="number" id="amountInput" name="amount" required><br>
       
        <label for="fee" id="feeLabel">Fee:</label>
        <input type="text" name="fee" id="feeInput" value="0.00"><br>
        {{-- <label for="fee" id="feeLabel" style="display:none;">Fee:</label>
        <input type="number" name="fee" id="feeInput" value= 00.0 style="display:none;"><br> --}}
    
        <label for="date">Date:</label>
        <input type="text" id="date" name="date" required><br>
    
        <button type="submit">Submit</button>
    </form>

    
</body>
</html>