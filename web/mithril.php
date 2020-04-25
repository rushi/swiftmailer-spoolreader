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
    <script type="text/javascript" src="js/lib/bootstrap.js"></script>
    <script src="https://unpkg.com/mithril/mithril.js"></script>
</head>
<body>
<div class="main container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h2>Spool Reader</h2>
        </div>
    </div>
    <div class="row" style='margin-top: 20px;'>
        <div class="col-xs-6">
            Found <span class="total-messages">0</span> spooled emails in in <code><?php echo SPOOL_DIR;?></code>
        </div>
        <div class="col-xs-6">
            <button type='button' class='btn btn-sm btn-danger pull-right action-clear'>Clear Spool</button>
            &nbsp;&nbsp;
            <button type='button' class='btn btn-sm btn-primary pull-right action-fetch'>Refresh</button>
        </div>
    </div>
    <div class="row" style='margin-top: 20px;'>
        <div class="col-xs-12">
            <table class="table table-striped table-hover messages"></table>
            <div id="modalHolder"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/mithril-app.js"></script>

</body>
</html>
