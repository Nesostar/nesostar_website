
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrator Login | Nesostar</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: #f4f6fa;
            color: #172033;
            font-family: 'DM Sans', sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
            padding: 42px;
            background: #ffffff;
            border: 1px solid #e8ebf1;
            border-radius: 18px;
            box-shadow: 0 18px 55px rgba(20, 35, 65, 0.08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 36px;
        }

        .brand img {
            width: 49px;
            height: 49px;
            object-fit: contain;
        }

        .brand-name {
            font-family: 'Manrope', sans-serif;
            font-size: 22px;
            font-weight: 800;
        }

        .brand-label {
            display: block;
            margin-top: 2px;
            color: #7b8495;
            font-size: 12px;
        }

        h1 {
            margin-bottom: 9px;
            font-family: 'Manrope', sans-serif;
            font-size: 27px;
            font-weight: 800;
        }

        .subtitle {
            margin-bottom: 30px;
            color: #778195;
            font-size: 14px;
            line-height: 1.7;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            height: 49px;
            padding: 0 14px;
            border: 1px solid #dce1e9;
            border-radius: 9px;
            outline: none;
            font: inherit;
            font-size: 14px;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 4px 0 23px;
            color: #626e82;
            font-size: 13px;
        }

        .remember input {
            width: 15px;
            height: 15px;
        }

        button {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 9px;
            background: #172b4d;
            color: white;
            font: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: background .2s;
        }

        button:hover {
            background: #254779;
        }

        .error {
            margin-bottom: 18px;
            padding: 12px 14px;
            border: 1px solid #fecaca;
            border-radius: 8px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 13px;
            line-height: 1.6;
        }

        .success {
            margin-bottom: 18px;
            padding: 12px 14px;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            background: #f0fdf4;
            color: #166534;
            font-size: 13px;
        }

        .footer {
            margin-top: 28px;
            text-align: center;
            color: #8992a2;
            font-size: 12px;
        }

        .back-link {
            display: block;
            margin-top: 18px;
            text-align: center;
            color: #52627b;
            font-size: 13px;
            text-decoration: none;
        }

        .back-link:hover {
            color: #2563eb;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 29px 23px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <main class="login-container">

        <div class="brand">
            <img src="{{ asset('images/nesostar-logo.png') }}" alt="Nesostar logo">

            <div>
                <div class="brand-name">Nesostar</div>
                <span class="brand-label">Administrator Portal</span>
            </div>
        </div>

        <h1>Welcome back</h1>

        <p class="subtitle">
            Sign in to manage your Nesostar website and administration.
        </p>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="email">Administrator email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your administrator email"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <label class="remember">
                <input type="checkbox" name="remember" value="1">
                Remember me
            </label>

            <button type="submit">
                Sign in to Dashboard
            </button>
        </form>

        <a href="{{ route('home') }}" class="back-link">
            ← Return to Nesostar website
        </a>

        <div class="footer">
            © {{ date('Y') }} Nesostar Company Ltd.
            <br>
            Secure Administrator Access
        </div>

    </main>

</body>
</html>
