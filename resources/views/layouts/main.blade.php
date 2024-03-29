<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <title>Парковка</title>
</head>

<body>
  
  @section('navigation')
  <div class="container">
    <div class="row">
      <nav>
        <ul>
          <li><a href=" {{ route('custs.index') }} ">Все клиенты и автомобили</a></li>
          <li><a href=" {{ route('custs.create') }} ">Добавить клиента</a></li>
          <li><a href=" {{ route('on_parking.index') }} ">Автомобили на стоянке</a></li>
        </ul>
      </nav>
    </div>
  </div>
  @show

  <div class="container">
    @yield('content')
  </div>

  <script src="{{ asset("js/app.js") }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  @yield('script')
  
</body>
    
</html>
                
