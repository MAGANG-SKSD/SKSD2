<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Mengimpor CSS yang digunakan -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Icon FontAwesome jika diperlukan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div id="app">
        <!-- Sertakan navigasi menu, pastikan file layouts.menu ada -->
        @include('layouts.menu')
        
        <!-- Tempat untuk konten utama halaman -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Mengimpor JavaScript yang diperlukan -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
