<?php
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Swiftmailer Spool Reader</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="css/bootstrap.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/fetch.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style type="text/css">
        .message-date {
            width: 170px;
        }
        .message-additional-header {
            font-size: 11px;
            font-family: verdana;
            margin-top: 3px;
        }
        .message-additional-header .field-name {
            margin-right: 3px;
        }
        .message-additional-header .field-name:after {
            content: ':';
        }
        .message-actions {
            vertical-align: middle;
        }
        .modal {
            width: 1024px;
            margin-left : 120px;
        }
        .modal-content {
            width: 800px;
        }
        .modal-body {
            padding: 0px;
            padding-bottom: 20px;
        }
        .modal-body iframe {
            border: 0px;
            width: 100%;
            padding: 10px;
            min-height: 500px;
        }
        :focus {
            outline: 0 !important;
        }
    </style>
</head>
<body>
<div id="main" class="container">
    <div class="row">
        <h2>Spool Reader</h2>
    </div>
    <div class="row">
        <p>
            This will read the spool files in <code><?php echo SPOOL_DIR;?></code> and display them here in a tabular format.
        </p>
    </div>
    <div class="row">
        <div style="margin: 10px 0px">Found <span class="total-messages">0</span> spooled emails.</div>
        <table class="table table-striped table-hover messages">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>From</th>
                <th>Reply To</th>
                <th>To</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr class="loading">
                <td colspan="7">Loading...</td>
            </tr>
            </tbody>
        </table>
        <div id="modalHolder"></div>
    </div>
</div>
</body>
</html>