<!DOCTYPE html>
<html>
    <head>
        <title>Document Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

        <nav class="navbar navbar-expand-lg navbar-light">
	        <div style="margin-left:20px; font-weight: bolder">
                <a class="navbar-brand" href="#">Document Management System</b></a>
	            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		            <span class="navbar-toggler-icon"></span>
	            </button>
            </div>
        </nav>

            <body>
                <div class="container">
                    @yield('content')
                </div>
            </body>
</html>