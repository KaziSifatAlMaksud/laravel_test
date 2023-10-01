<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" placeholder="Email"><br/>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="Password"><br/> <br/>
        <button type="submit">Login</button><br/>
        <p>Need To Create a Account <a href="{{ route('signup') }}">Sign Up</a></p>
        @if(session('error'))
        <div>{{ session('error') }}</div>
        @endif
    </form>
   
 
</body>
</html>
