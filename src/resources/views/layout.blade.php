<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('vendor/backpack/installer/css/installer.css') }}" rel="stylesheet">
  </head>

  <body>
    <div class="row">
      <div class="logo col-lg-4 offset-lg-4">
        <img src="{{ asset('vendor/backpack/installer/imgs/backpack_logo.png') }}" alt="Backpack For Laravel Installer"/>
      </div>
      <div class="col-lg-4 offset-lg-4">
        <div class="card">
          <div class="card-header">
            {{ $title }}
            <ul class="list-inline steps">
              @php $lastStep = 0; $current = false; @endphp
              @foreach($steps as $icon => $completed)
                @php if($lastStep > $completed) { $current = true; } @endphp

                <li class="list-inline-item @if($completed) performed @endif @if($current) active @endif"><i class="fas {{ $icon}}"></i></li>
              @endforeach
            </ul>
          </div>
          <div class="card-body">
            @yield('content')
          </div>
        </div>
        <p class="copyright">Powered By <a href="http://backpackforlaravel.com/?ref=installer_footer_link">Backpack For Laravel</a></p>
      </div>

    </div>

  </body>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>
