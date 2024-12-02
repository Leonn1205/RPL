<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Login Administrator</title>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        .card-header {
            font-size: 1.8em;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .card-header:hover {
            color: #0056b3;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 25px;
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
            border: 2px solid #ccc;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 10px rgba(0, 86, 179, 0.5);
        }

        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
            padding: 12px;
            border-radius: 25px;
            font-size: 18px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #003d82;
            border-color: #003d82;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #0056b3;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 500px) {
            .login-container {
                width: 80%;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="card">
            <div class="card-header">Login Administrator</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username input -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <!-- Password input -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <!-- Login Button -->
                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                </form>

                <!-- Menampilkan pesan error jika login gagal -->
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

        </div>
    </div>

</body>

</html>
