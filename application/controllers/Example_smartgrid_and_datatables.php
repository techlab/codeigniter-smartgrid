<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example_smartgrid_and_datatables extends CI_Controller {
    
	public function index()
	{
        // Load the SmartGrid Library
        $this->load->library('SmartGrid/Smartgrid');
        
        // SQl for grid
        $sql = "SELECT * FROM employee "; 
        
        // Column settings
        $columns = array(
            "employee_id"=>array("header"=>"Employee ID", "type"=>"label", "align"=>"left", "width"=>"80px"),
            "employee_name"=>array("header"=>"Employee Name", "type"=>"label", "align"=>"left", "width"=>"150px"),
            "employee_dob"=>array("header"=>"Date of Birth", "type"=>"date", "align"=>"center", "width"=>"230px", "date_format"=>"l jS \of F Y h:i:s A", "date_format_from"=>"Y-m-d H:i:s"),
            "employee_join_date"=>array("header"=>"Join Date", "type"=>"relativedate", "align"=>"left", "width"=>"150px"),
            "employee_gender"=>array("header"=>"Gender", "type"=>"label", "align"=>"center", "width"=>"50px")
        );
        
        // Config settings
        // Setting 'paging_enabled' to false will not add paging controls or limits the rows
        // it will just display the data as it on the datasource
        $config = array("paging_enabled"=> false);
        
        // Set the grid 
        $this->smartgrid->set_grid($sql, $columns, $config);
        
        // Render the grid and assign to data array, so it can be print to on the view
        $data['grid_html'] = $this->smartgrid->render_grid();
        
        // Load view
		$this->load->view('smartgrid_and_datatables', $data);
    }
}
