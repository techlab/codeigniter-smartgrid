<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SmartGrid for CodeIgniter - Example with DataTables</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <!-- Styles for datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h1>SmartGrid for CodeIgniter with Bootstrap - Example with DataTables</h1>
        </div>
        
        <!-- Print the SmartGrid html -->
        <?php echo isset($grid_html) ? $grid_html : ''; ?>
        <br />
    </div>
    
    <!-- JQuery include -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
    <!-- Javascrips for datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>    
    <!-- Now make the SmartGrid work with datatables 
         'sg-table' is the id of the main table in SmartGrid -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sg-table').DataTable();
        });
    </script> 
</body>
</html>