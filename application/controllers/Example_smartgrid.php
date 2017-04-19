<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example_smartgrid extends CI_Controller {
    
	public function index()
	{
        $employee_name = $this->input->post_get('employee_name', TRUE);   
        $data['employee_name'] = $employee_name;
        // SQl for grid
        $where = '';
        $where .= !empty($employee_name) ? " AND employee_name LIKE '%$employee_name%' " : "";
        $sql = "SELECT *
                    FROM employee 
                    WHERE 1=1 $where "; 
        
        // Source array for enum field
        $gender_list = array(
                                "0"=>"Others",
                                "1"=>"Male",
                                "2"=>"Female"
                            );
        
        $buttons_html = '<div class="btn-group" role="group" aria-label=""><button type="button" class="btn btn-default btn-xs" value="{field_name}">View</button><button type="button" class="btn btn-success btn-xs" value="{field_name}">Edit</button> <button type="button" class="btn btn-danger btn-xs" value="{field_name}">Delete</button></div>';
        
        // Column settings
        $columns = array(
            "employee_id"=>array("type"=>"label", "header"=>"Employee ID", "align"=>"left", "width"=>"100px"),
            "employee_name"=>array("type"=>"label", "header"=>"Employee Name", "align"=>"left", "width"=>""),
            "employee_dob"=>array("type"=>"date", "header"=>"Date of Birth", "align"=>"center", "header_align"=>"center", "width"=>"150px", "date_format"=>"Y-m-d", "date_format_from"=>"Y-m-d H:i:s"),
            "employee_join_date"=>array("type"=>"relativedate", "header"=>"Join Date", "align"=>"left", "width"=>"100px"),
            "employee_gender"=>array("type"=>"enum", "header"=>"Gender", "source"=>$gender_list, "align"=>"center", "width"=>"80px"),
            "employee_salary"=>array("type"=>"money", "header"=>"Salary", "sign"=>"$", "align"=>"right", "width"=>"100px"),
            "performance_index"=>array("type"=>"progressbar", "header"=>"Performance", "align"=>"center", "width"=>"150px", "style" => "progress-bar-info"),
            "employee_img_url"=>array("type"=>"custom", "header"=>"Buttons", "field_data"=>$buttons_html, "align"=>"center", "width"=>"130px"),
        );
        
        // Config settings, optional
        $config = array("page_size"=> 5, 
                        "toolbar_position"=> 'both');
        
        // Load the SmartGrid Library
        $this->load->library('SmartGrid/Smartgrid');
        // Set the grid 
        $this->smartgrid->set_grid($sql, $columns, $config);
        // Render the grid and assign to data array, so it can be print to on the view
        $data['grid_html'] = $this->smartgrid->render_grid();
        
        // Load view
		$this->load->view('example_smartgrid', $data);
	}
}
