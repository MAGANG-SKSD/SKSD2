<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desa Pagar Besi</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .hero {
            background: linear-gradient(to bottom, #1e90ff, #87cefa); /* Gradien biru ke biru muda */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero h1 {
            font-size: 48px;
            margin: 0;
        }

        .hero p {
            font-size: 24px;
            margin: 10px 0;
        }

        .hero a {
            background-color: #f1c40f;
            color: black;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .hero a:hover {
            background-color: #d4ac0d;
        }

        /* Updated Navigation Buttons */
        .nav {
            position: absolute;
            top: 20px;
            right: 40px;
            font-size: 16px;
        }

        .nav a {
            margin-left: 20px;
            color: white;
            background-color: #1e90ff; /* Warna dasar biru */
            padding: 10px 20px;        /* Padding lebih besar untuk tombol */
            text-decoration: none;
            font-size: 16px;
            border-radius: 25px;       /* Membulatkan sudut tombol */
            transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Transisi halus */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan halus */
        }

        .nav a:hover {
            background-color: #87cefa;  /* Ubah warna saat hover ke biru muda */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); /* Bayangan lebih dalam saat hover */
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="nav">
            <a href="#sejarah">APBDes</a>
            <a href="#profil">Dashboard</a>
            <a href="{{ route('login') }}">Login</a> <!-- Button Login -->
        </div>
        <h1>Desa Pagar Besi</h1>
        <p>Selamat Datang di Web Profil</p>
    </div>
</body>
</html>
