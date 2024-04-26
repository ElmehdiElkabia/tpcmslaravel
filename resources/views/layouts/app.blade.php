<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Include your CSS and JavaScript files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <main class="d-flex flex-nowrap">
        @include('partials.sidebar')
    </main>
        <!-- Main content -->
        <div class="admin-content">
            @yield('content')
        </div>
    </div>
    <!-- Include your JavaScript files -->
</body>
</html>
