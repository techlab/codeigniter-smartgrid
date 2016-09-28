<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SmartGrid for CodeIgniter - Example with DataTables</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h1>SmartGrid for CodeIgniter with Bootstrap - Example array grid</h1>
        </div>

        <?php echo isset($grid_html) ? $grid_html : ''; ?>
        <br />
    </div>

</body>
</html>