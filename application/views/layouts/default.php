<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $template['title']; ?></title>

    <link href="<?php echo base_url("/assets/css/bootstrap.css") ?>" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
    <link href="<?php echo base_url("/assets/css/bootstrap-responsive.css") ?>" rel="stylesheet">

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo base_url("welcome");?>">JT Entry Tool</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url("welcome/results");?>">Results</a></li>
                    <li><a href="<?php echo base_url("welcome");?>">Add Text File Records</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="container">

    <?php echo $template['body']; ?>

    <hr>
    <footer>
        <p>Footer</p>
    </footer>


</div>
<script src="<?php echo base_url("/assets/js/bootstrap.min.js") ?>"></script>

</body>
</html>