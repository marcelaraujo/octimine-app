<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Beers & Most Drunk</title>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:500">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<style>
		html, body {
			height: 100%;
		}

		body {
			margin: 0;
			padding: 0;
			width: 100%;
			display: table;
			font-weight: 100;
			font-family: 'Roboto';
		}

		body {
			background-color: #edeff0;
			font-size: 14px;
			line-height: 1.62857143;
			color: #778293;
		}

		.wrapper {
			position: relative;
			width: 100%;
			height: 100%;
		}

		.wrapper > .container {
			padding: 30px;
		}

		.margin-top-none {
			margin-top: 0;
		}

		.inline-block {
			display: inline-block;
		}

	</style>
</head>
<body>
	<main class="wrapper">
		<div class="container">
			@yield('content')
		</div>
	</main>
	<script src="//code.jquery.com/jquery-2.2.2.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>