<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example_smartgrid extends CI_Controller {
    
	public function index()
	{
        $employee_name = trim($this->input->get_post('employee_name', TRUE));   
        
        // Load the SmartGrid Library
        $this->load->library('SmartGrid/Smartgrid');
        
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
        
        // Column settings
        $columns = array(
            "employee_id"=>array("header"=>"Employee ID", "type"=>"label", "align"=>"left", "width"=>"100px"),
            "employee_name"=>array("header"=>"Employee Name", "type"=>"label", "align"=>"left", "width"=>"150px"),
            "employee_dob"=>array("header"=>"Date of Birth", "type"=>"date", "align"=>"center", "width"=>"150px", "date_format"=>"Y-m-d", "date_format_from"=>"Y-m-d H:i:s"),
            "employee_join_date"=>array("header"=>"Join Date", "type"=>"relativedate", "align"=>"left", "width"=>"150px"),
            "employee_gender"=>array("header"=>"Gender", "type"=>"enum", "source"=>$gender_list, "align"=>"center", "width"=>"100px"),
            "employee_salary"=>array("header"=>"Salary", "type"=>"money", "sign"=>"$", "align"=>"right", "width"=>"100px"),
            "performance_index"=>array("header"=>"Performance", "type"=>"progressbar", "align"=>"center", "width"=>"100px"),
           // "employee_img_url"=>array("header"=>"Image", "type"=>"image", "align"=>"center", "width"=>"50px", "image_width"=>"50px"),
        );
        
        // Config settings, optional
        $config = array("page_size"=> 5, 
                        "grid_name"=> "sg_1", 
                        "toolbar_position"=> 'both');
        
        // Set the grid 
        $this->smartgrid->set_grid($sql, $columns, $config);
        
        // Render the grid and assign to data array, so it can be print to on the view
        $data['grid_html'] = $this->smartgrid->render_grid();
        
        // Load view
		$this->load->view('example_smartgrid', $data);
	}
}
