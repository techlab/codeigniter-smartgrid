<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SmartGrid for CodeIgniter - Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="page-header">
        <h1>SmartGrid for CodeIgniter with Bootstrap - Example</h1>
    </div>
    
    <form class="form-inline" method="POST">
        <div class="form-group">
          <label for="employee_name">Employee Name</label>
          <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Employee Name" value="<?php echo trim($this->input->get_post('employee_name', TRUE)); ?>">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
    <hr />
    
	<?php echo isset($grid_html1) ? $grid_html1 : ''; ?>
    
    <?php echo isset($grid_html2) ? $grid_html2 : ''; ?>
</div>

</body>
</html>