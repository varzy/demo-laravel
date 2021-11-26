<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100">
    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @include('layouts.header')
      </div>
    </header>

    <!-- Page Content -->
    <main>
      <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        {{ $slot }}
      </div>
    </main>

    <!-- Page Footer -->
    <footer class="bg-black text-white">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @include('layouts.footer')
      </div>
    </footer>
  </div>

  <!-- Scripts -->
  @stack('scripts_prepend')
  <script src="{{ mix('/js/manifest.js') }}"></script>
  <script src="{{ mix('/js/vendor.js') }}"></script>
  <script src="{{ mix('/js/app.js') }}"></script>
  @stack('scripts')
</body>

</html>
