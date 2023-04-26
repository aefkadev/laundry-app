<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi</title>

    <!-- bootstraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2a99f4df77.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #AD48FA;">
    <div class="vh-100 d-flex justify-content-center">
        <div class="d-flex justify-content-center align-items-center flex-column w-100">
            <img src="{{asset('assets/img/main-logo.png')}}" style="width: 20rem;" alt="">
            <span class="text-white text-lg fw-medium text-center px-2">Akun anda berhasil dibuat, hubungi admin SOC Lampung untuk verifikasi</span>
            <div class="d-flex flex-row gap-3 pt-4">
                <a href="https://wa.me/+62812345678?text=Verifikasi akun dengan nama {{auth()->user()->nama}}" class="d-flex text-decoration-none btn align-items-center" style="background-color: #D6C37E;">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span class="mx-2">Hubungi admin</span>
                </a>
                <a href="/login" class="d-flex text-decoration-none">
                    <button class="btn" style="background-color: #D6C37E;">Login</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>