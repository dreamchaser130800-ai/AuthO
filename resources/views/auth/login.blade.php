<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Amikom Event Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased selection:bg-purple-200 selection:text-purple-900"
      style="min-height:100vh; background: linear-gradient(135deg, #f0f0ff 0%, #e8e4ff 50%, #ede8ff 100%); display:flex; align-items:center; justify-content:center; padding:1.5rem;">

    <div style="background:#fff; border-radius:20px; padding:2.5rem; width:100%; max-width:420px; box-shadow:0 8px 32px rgba(83,74,183,0.12), 0 2px 8px rgba(83,74,183,0.08);">

        {{-- Logo --}}
        <div style="width:52px; height:52px; background:#6C63D4; border-radius:14px; display:flex; align-items:center; justify-content:center; margin:0 auto 1.25rem;">
            <span style="color:white; font-size:18px; font-weight:700; letter-spacing:-0.5px;">AH</span>
        </div>

        <h1 style="font-size:22px; font-weight:700; color:#1a1433; text-align:center; margin-bottom:4px;">Masuk ke Admin</h1>
        <p style="font-size:13px; color:#8b87b0; text-align:center; margin-bottom:2rem; letter-spacing:0.04em;">AMIKOM EVENT HUB — PANEL ADMIN</p>

        {{-- Error message --}}
        @if($errors->any())
        <div style="background:#fff0f0; border:1px solid #fcc; border-radius:10px; padding:10px 14px; display:flex; align-items:flex-start; gap:8px; margin-bottom:1.25rem;">
            <span style="color:#e24b4a; font-size:18px; flex-shrink:0;">&#9888;</span>
            <span style="font-size:13px; color:#a32d2d; font-weight:500; line-height:1.5;">
                Email atau kata sandi salah. Periksa kembali dan coba lagi.
            </span>
        </div>
        @endif

        <form method="POST" action="/admin/login">
            @csrf

            {{-- Email --}}
            <div style="margin-bottom:1.25rem;">
                <label for="email" style="display:block; font-size:12px; font-weight:600; color:#534AB7; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:8px;">
                    Alamat Email
                </label>
                <input type="email" name="email" id="email" required
                    value="{{ old('email') }}"
                    placeholder="admin@amikom.ac.id"
                    style="width:100%; height:46px; padding:0 14px; border:1.5px solid {{ $errors->has('email') ? '#e24b4a' : '#e2dfff' }}; border-radius:10px; font-size:14px; color:#1a1433; background:{{ $errors->has('email') ? '#fff8f8' : '#faf9ff' }}; outline:none; font-family:'Inter',sans-serif; transition:border-color 0.15s;"
                    onfocus="this.style.borderColor='#6C63D4'; this.style.boxShadow='0 0 0 3px rgba(108,99,212,0.15)';"
                    onblur="this.style.borderColor='{{ $errors->has('email') ? '#e24b4a' : '#e2dfff' }}'; this.style.boxShadow='none';">
            </div>

            {{-- Password --}}
            <div style="margin-bottom:1.75rem;">
                <label for="password" style="display:block; font-size:12px; font-weight:600; color:#534AB7; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:8px;">
                    Kata Sandi
                </label>
                <input type="password" name="password" id="password" required
                    placeholder="••••••••"
                    style="width:100%; height:46px; padding:0 14px; border:1.5px solid {{ $errors->has('password') ? '#e24b4a' : '#e2dfff' }}; border-radius:10px; font-size:14px; color:#1a1433; background:{{ $errors->has('password') ? '#fff8f8' : '#faf9ff' }}; outline:none; font-family:'Inter',sans-serif; transition:border-color 0.15s;"
                    onfocus="this.style.borderColor='#6C63D4'; this.style.boxShadow='0 0 0 3px rgba(108,99,212,0.15)';"
                    onblur="this.style.borderColor='{{ $errors->has('password') ? '#e24b4a' : '#e2dfff' }}'; this.style.boxShadow='none';">
                @error('password')
                <div style="font-size:12px; color:#e24b4a; margin-top:5px; font-weight:500;">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                style="width:100%; height:48px; background:#534AB7; color:white; border:none; border-radius:10px; font-size:14px; font-weight:700; letter-spacing:0.04em; text-transform:uppercase; cursor:pointer; font-family:'Inter',sans-serif; transition:background 0.15s;"
                onmouseover="this.style.background='#4339a0';"
                onmouseout="this.style.background='#534AB7';">
                Masuk
            </button>

        </form>

        <div style="margin-top:1.5rem; text-align:center;">
            <a href="{{ route('org.login') }}"
               style="display:block; width:100%; height:48px; line-height:48px; background:#6C63D4; color:white; border:none; border-radius:10px; font-size:14px; font-weight:700; letter-spacing:0.04em; text-transform:uppercase; cursor:pointer; font-family:'Inter',sans-serif; transition:background 0.15s; text-decoration:none; margin-bottom: 0.75rem;"
               onmouseover="this.style.background='#534AB7';"
               onmouseout="this.style.background='#6C63D4';">
                Login Organisasi
            </a>
            <a href="{{ route('org.register') }}"
               style="display:block; width:100%; height:48px; line-height:48px; background:#A7A1E1; color:white; border:none; border-radius:10px; font-size:14px; font-weight:700; letter-spacing:0.04em; text-transform:uppercase; cursor:pointer; font-family:'Inter',sans-serif; transition:background 0.15s; text-decoration:none;"
               onmouseover="this.style.background='#8C86CC';"
               onmouseout="this.style.background='#A7A1E1';">
                Register Organisasi
            </a>
        </div>

        <hr style="border:none; border-top:1px solid #ede9ff; margin:1.5rem 0 1rem;">
        <p style="text-align:center; font-size:13px; color:#8b87b0;">
            <a href="/" style="color:#534AB7; font-weight:500; text-decoration:none;">← Kembali ke halaman utama</a>
        </p>

    </div>

</body>
</html>