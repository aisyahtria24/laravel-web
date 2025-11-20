<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f0f0; }
        .container { width: 350px; margin: 80px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #2c7be5; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1a5fc4; }
        .alert { background: #ffd1d1; color: #900; padding: 10px; margin-bottom: 10px; border-radius: 4px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Login</h2>


    @if(session('error'))
        <div class="alert">{{ session('error') }}</div>
    @endif


    @if($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ url('/auth/login') }}" method="POST">
        @csrf
        <label>Email:</label>
        <input type="text" name="email" value="{{ old('email') }}" placeholder="Masukkan email">


        <label>Password:</label>
        <input type="password" name="password" placeholder="Masukkan password">


        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
