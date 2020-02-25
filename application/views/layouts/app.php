<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= isset($title) ? $title : 'CIShop' ?> - Codeigniter E-Commerce</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome CSS -->
    <link href="/assets/libs/fontawesome/css/all.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/assets/css/app.css" rel="stylesheet">

</head>

<body>
    <!-- navbar -->
    <?php $this->load->view('layouts/_navbar'); ?>
    <!-- akhir navbar -->

    <!-- halaman website -->
    <?php $this->load->view($page); ?>
    <!-- akhir halaman website -->

    <script src="/assets/libs/jquery/jquery-3.4.1.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>