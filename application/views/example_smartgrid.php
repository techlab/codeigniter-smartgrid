<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SmartGrid for CodeIgniter - Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h1>SmartGrid for CodeIgniter with Bootstrap - Example</h1>
        </div>

        <form class="form-inline" method="POST">
            <div class="form-group">
              <label for="employee_name">Employee Name</label>
              <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Employee Name" value="<?php echo isset($employee_name) ? $employee_name : ''; ?>">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
        <hr />

        <!-- Print the SmartGrid html -->
        <?php echo isset($grid_html) ? $grid_html : ''; ?>
        
    </div>

</body>
</html>