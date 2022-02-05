<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<div id="app">
<nav class="flex items-center justify-between flex-wrap bg-teal p-6 bg-teal-400">
  <div class="flex items-center flex-no-shrink text-white mr-6">
    <span class="font-semibold text-xl tracking-tight mr-1">DAMASCO</span>
    <sub>SYSTEM</sub>
  </div>
</nav>
    @yield('content')
</div>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>