<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <title> Halaman laravel</title>

</head>
<body>

    <div class="container py-5">
        @if (Auth::check())
            @include('komponen/menu')
        @endif
        
        @include('komponen/pesan')
        @yield('konten')
        <footer class="footer fixed-bottom" style="background-color: #285185;">
            <div class="container d-flex justify-content-center p-2">
                <!-- <i class="fab fa-facebook-f fa-lg" style="color: white; margin-left:2rem;"></i> {{-- web font icon --}} -->
                <!-- <i class="fab fa-instagram fa-lg" style="color: white; margin-left:2rem;"></i> {{-- web font icon --}} -->
                <!-- <i class="fas fa-question-circle fa-lg" style="color: white; margin-left:2rem;"></i> {{-- web font icon --}} -->
              </div>
            <div class="container d-flex justify-content-center">
              <p class="text-white">&copy; Copyright MOCA</p>
            </div>
        </footer>
    </div>
</body>
</html>