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
            <button type='button' class='btn btn-sm btn-danger float-right action-clear'>
                <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                </svg>
                Clear Spool
            </button>
            <button type='button' class='btn btn-sm btn-primary float-right action-fetch'>
                <svg class="bi bi-arrow-clockwise" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.17 6.706a5 5 0 017.103-3.16.5.5 0 10.454-.892A6 6 0 1013.455 5.5a.5.5 0 00-.91.417 5 5 0 11-9.375.789z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8.147.146a.5.5 0 01.707 0l2.5 2.5a.5.5 0 010 .708l-2.5 2.5a.5.5 0 11-.707-.708L10.293 3 8.147.854a.5.5 0 010-.708z" clip-rule="evenodd"/>
                </svg>
                Refresh
            </button>
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
