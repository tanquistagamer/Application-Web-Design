<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Halcón Express</title> 
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> 
</head> 
<body> 
  <div class="container my-4"> 
    <h1 class="text-center mb-4">Halcón express</h1>
    @yield('content') 
  </div> 
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> 
</body> 
</html> 
