<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
<div class="container-fluid header">
    <div class="container">
        <span class="logo">LP</span>
        <h2>Laravel Application</h2>
    </div>
</div>
<section id="app"></section>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{ asset('js/app.js') }}"> </script>
<style>
    .header{
        background-color: #38c172;
        color: #ffffff;margin-bottom: 60px;

    }
    .logo{
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #ffffff;
        color: #38c172;
        display: inline-block;
        font-size: 32px;
        text-align: center;
    }
   h2{
       padding: 30px 50px;
       text-transform: uppercase;
       display: inline-block;
   }
</style>