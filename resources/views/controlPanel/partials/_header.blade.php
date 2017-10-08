<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Web Panel @yield('title')</title>

<!-- Styles -->
<!-- Latest compiled and minified CSS -->
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
{{--<link rel="stylesheet" href="assets/css/jquery.sidr.light.min.css">--}}
{!! Html::style('assets/css/css/materialize.css') !!}
{!! Html::style('assets/css/css/custom.css') !!}

<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>