<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Crosssec feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <style type="text/css">
        [ng\:cloak], [ng-cloak], .ng-cloak {
            display: none !important;
        }
		body {
			background: url(/img/swirl_pattern.png) repeat;
		}
    </style>
</head>
<body>
<div class="container" ng-app="dfjApp" ng-cloak>
    @yield('concent')
</div>
<script src="//code.angularjs.org/1.4.0/angular.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>
<script src="//momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>