<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
       
        body, html {
            height: 100%;
            display: flex;
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
    <form action="{{ route('signup') }}" method="post">
        @csrf
        <label>Name:</label><br>
        <input type="text" name="name" placeholder="Name">
        <br>
        <label>User Name:</label><br>
        <input type="text" name="username" placeholder="Janh10" ><br>
        <label>Account Type:</label><br>
        <input type="radio" name="account_type" value="individual" required>Individual<br>
        <input type="radio" name="account_type" value="business" required >Business<br>   
        <label>Balance:</label><br>
        <input type="number" name="balance" placeholder="100" ><br>
        <label>Email:</label><br>
        <input type="email" name="email" placeholder="Email"><br>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="Password"><br>
      
        <button type="submit">Sign Up</button><br/><br/>
        <p>Al Ready Have a Account <a href="{{ route('login') }}">Log In</a></p>
    </form>
</body>
</html>
