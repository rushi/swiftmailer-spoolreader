<?php
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html class="h-100">
<head>
    <title>Swiftmailer Spool Reader</title>
    <meta charset="utf-8">
    <link href="../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <link href="css/app.css" rel="stylesheet"/>
    <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/moment/moment.js"></script>
    <script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../node_modules/mithril/mithril.min.js"></script>
</head>
<body class="d-flex flex-column h-100">
    <div class="main container-fluid">
        <div class="row">
            <div class="col">
                <h2>Swiftmailer Spool Reader</h2>
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

    <footer class="footer mt-auto py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    Last refreshed: <span class="last-refreshed"></span>
                </div>
                <div class="col">
                    <div class="float-right">
                        <svg viewBox="0 0 16 16" fill="currentColor"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg>
                        <a target="_blank" href="https://github.com/rushi/swiftmailer-spoolreader">Fork me on Github</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>
