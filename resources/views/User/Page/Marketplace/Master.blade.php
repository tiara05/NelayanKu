<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NelayanKu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="icon" type="image/x-icon" href="../favicon.png" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assetscust/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="{{asset('assetscust/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assetscust/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assetscust/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assetscust/css/style.css')}}" rel="stylesheet">
</head>

<body>

  {{-- navbar --}}
  @include('User.Page.Marketplace.Layout.Navbar')


  <main id="main">
    {{-- content --}}
    @yield('content')
  </main>

  {{-- footer --}}
  @include('User.Page.Marketplace.Layout.Footer')


  <!-- Vendor JS Files -->
  <script src="{{asset('assetscust/vendor/aos/aos.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="{{asset('assetscust/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assetscust/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assetscust/js/main.js')}}"></script>

</body>

</html>