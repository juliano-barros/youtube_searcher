<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Youtube searcher</title>
	
	<link rel="stylesheet" type="text/css" href="css/app.css">

	@yield('head');

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>

<body>
        <div class="content">
        	@yield('content')
        </div>
</body>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

@yield('script');

</html>