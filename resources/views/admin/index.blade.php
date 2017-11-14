<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dispatch</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .content {
                text-align: center;
				padding-bottom: 250px;
            }

            .title {
                font-size: 7.5em;
                margin-bottom: 30px;
            }
			a {
                border: 2px solid #000;
                background-color: cornsilk;
                padding: 5px;
                color: blue;
                font-weight: bold;
           }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
					<h1>Dispatch</h1>
                </div>
				<h2>Admin Home</h2>
				<p><a href="/dispatchers/">Dispatcher Home</a></p>
                <p>admin folder</p>
                <h2><?php echo Config('constants.domain');?></h2>
            </div>
        </div>
    </body>
</html>
