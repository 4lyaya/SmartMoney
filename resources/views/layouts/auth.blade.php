<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartMoney - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/sweet-alert.js'])

    <style>
        .auth-bg {
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .auth-card {
            width: 100%;
            max-width: 28rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        .auth-header {
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .auth-body {
            padding: 2rem;
        }

        .auth-footer {
            padding: 1.5rem;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>

<body>
    <div class="auth-bg">
        <div class="auth-card">
            <div class="auth-header">
                <h1 class="text-3xl font-bold">SmartMoney</h1>
                <p class="mt-2 opacity-90">@yield('title')</p>
            </div>

            <div class="auth-body">
                @yield('content')
            </div>

            <div class="auth-footer">
                @yield('footer-links')
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        @push('scripts')
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            </script>
        @endpush
    @endif

    @if (session()->has('error'))
        @push('scripts')
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}'
                });
            </script>
        @endpush
    @endif
</body>

</html>
