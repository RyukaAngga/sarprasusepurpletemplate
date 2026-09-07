<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masuk - Sistem Sarana Prasarana</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('purple/purple/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('purple/purple/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="shortcut icon" href="{{ asset('purple/purple/assets/images/favicon.png') }}" />

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            -webkit-font-smoothing: antialiased;
        }
        .login-wrapper {
            width: 100%;
            max-width: 440px;
            padding: 24px 20px;
        }
        .login-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.04), 0 8px 10px -6px rgba(15, 23, 42, 0.02);
            padding: 40px 36px;
        }
        .brand-header {
            margin-bottom: 32px;
            text-align: left;
        }
        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: #0f172a;
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .brand-title {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.02em;
            margin: 0 0 6px 0;
        }
        .brand-subtitle {
            font-size: 14px;
            color: #64748b;
            margin: 0;
            font-weight: 400;
            line-height: 1.5;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }
        .input-control {
            width: 100%;
            height: 46px;
            padding: 10px 14px;
            font-size: 14px;
            font-family: inherit;
            color: #0f172a;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }
        .input-control::placeholder {
            color: #94a3b8;
        }
        .input-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
        }
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: -4px;
            margin-bottom: 24px;
        }
        .remember-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #475569;
            cursor: pointer;
            user-select: none;
        }
        .remember-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1px solid #cbd5e1;
            accent-color: #4f46e5;
            cursor: pointer;
        }
        .btn-submit {
            width: 100%;
            height: 46px;
            background-color: #4f46e5;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: background-color 0.15s ease, transform 0.05s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-submit:hover {
            background-color: #4338ca;
        }
        .btn-submit:active {
            transform: scale(0.99);
        }
        .alert-error {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .alert-info-box {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="brand-header">
                <div class="brand-mark">
                    <i class="mdi mdi-cube-outline"></i>
                </div>
                <h1 class="brand-title">Sarana & Prasarana</h1>
                <p class="brand-subtitle">Masuk ke akun Anda untuk melanjutkan ke sistem.</p>
            </div>

            @if(session('info'))
                <div class="alert-info-box">
                    {{ session('info') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert-error">
                    <i class="mdi mdi-alert-circle-outline" style="font-size: 16px;"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="input-control"
                           placeholder="nama@email.com"
                           value="{{ old('email') }}"
                           required
                           autofocus>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="input-control"
                           placeholder="Masukkan kata sandi"
                           required>
                </div>

                <div class="form-options">
                    <label class="remember-label">
                        <input type="checkbox" name="remember">
                        <span>Ingat saya</span>
                    </label>
                </div>

                <button type="submit" class="btn-submit">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</body>
</html>
