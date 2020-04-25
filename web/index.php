<?php
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Swiftmailer Spool Reader</title>
    <meta charset="utf-8">
    <!-- Todo change to bootstrap 4 -->
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/app.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/lib/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/lib/moment.min.js"></script>
    <script type="text/javascript" src="js/lib/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/mithril/mithril.js"></script>
</head>
<body>
<div class="main container-fluid">
    <div class="row">
        <div class="col">
            <h2>Spool Reader</h2>
        </div>
    </div>
    <div class="row py-2">
        <div class="col">
            Found <span class="total-messages">0</span> spooled emails in in <code><?php echo SPOOL_DIR;?></code>
        </div>
        <div class="col">
            <button type='button' class='btn btn-sm btn-danger float-right action-clear'>Clear Spool</button>
            &nbsp;&nbsp;
            <button type='button' class='btn btn-sm btn-primary float-right action-fetch'>Refresh</button>
        </div>
    </div>
    <div class="row">
        <div class="px-3 py-4 col">
            <table class="table table-striped table-hover messages"></table>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/main.js"></script>

</body>
</html>
