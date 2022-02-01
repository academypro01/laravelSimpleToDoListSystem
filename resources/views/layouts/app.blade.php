<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Styles  -->
    <link rel="stylesheet" href="{{ asset('template/css/all.css') }}">

</head>
<body>
<div class="container">
    <header>
        <nav>
            <h2>Task Management > @yield('title')</h2>
        </nav>
    </header>
    @yield('content')

{{--    scripts --}}
    <script !src="">
    @if ($errors->any())
            alert("{{join("\n",$errors->all())}}");
    @endif

    @if(\Illuminate\Support\Facades\Session::has('add_todo'))
        alert("{{session('add_todo')}}");
    @endif

    @if(\Illuminate\Support\Facades\Session::has('update_todo'))
        alert("{{session('update_todo')}}");
    @endif
    </script>

</div>
</body>
</html>
