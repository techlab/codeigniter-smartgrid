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
        $sql = "SELECT *, '<div>HIHIHI</div>' as htmlEx, 'http://php.net/images/logo.php' as imgEx FROM employee WHERE 1=1 $where "; 
        
        // Column settings
        $columns = array(
            "employee_id"=>array("header"=>"Employee ID", "type"=>"label", "align"=>"left", "width"=>"80px"),
            "employee_name"=>array("header"=>"Employee Name", "type"=>"label", "align"=>"left", "width"=>"150px"),
            "employee_dob"=>array("header"=>"Date of Birth", "type"=>"date", "align"=>"center", "width"=>"230px", "date_format"=>"l jS \of F Y h:i:s A", "date_format_from"=>"Y-m-d H:i:s"),
            "employee_join_date"=>array("header"=>"Join Date", "type"=>"relativedate", "align"=>"left", "width"=>"150px"),
            "employee_gender"=>array("header"=>"Gender", "type"=>"label", "align"=>"center", "width"=>"50px"),
            "htmlEx"=>array("header"=>"HTML", "type"=>"html", "align"=>"center", "width"=>"50px"),
            "imgEx"=>array("header"=>"Image", "type"=>"image", "align"=>"center", "width"=>"50px", "image_width"=>"50px")
        );
        // Config settings, optional
        $config = array("page_size"=> 5, 
                        "grid_name"=> "sg_1", 
                        "paging_enabled"=> true,
                        "toolbar_position"=> 'top',
                        "auto_generate_columns"=> true);
        // Set the grid 
        $this->smartgrid->set_grid($sql, $columns, $config);
        // Render the grid and assign to data array, so it can be print to on the view
        $data['grid_html1'] = $this->smartgrid->render_grid();
        
        // Data as array
        $data_list = array(
            array("employee_id"=> "1" ,"employee_name"=> "Dipu Raj1", "employee_join_date"=> "2017-03-18 15:09:02" ,"employee_gender"=> "Male", "employee_dob"=> "1981-03-17" ),
            array("employee_id"=> "2" ,"employee_name"=> "Dipu Raj2", "employee_join_date"=> "2017-03-18 15:09:02" ,"employee_gender"=> "Male", "employee_dob"=> "1981-03-17" ),
            array("employee_id"=> "3" ,"employee_name"=> "Dipu Raj3", "employee_join_date"=> "2017-03-18 15:09:02" ,"employee_gender"=> "Male", "employee_dob"=> "1981-03-17" ),
            array("employee_id"=> "4" ,"employee_name"=> "Dipu Raj4", "employee_join_date"=> "2017-03-18 15:09:02" ,"employee_gender"=> "Male", "employee_dob"=> "1981-03-17" ),
            array("employee_id"=> "5" ,"employee_name"=> "Dipu Raj5", "employee_join_date"=> "2017-03-18 15:09:02" ,"employee_gender"=> "Male", "employee_dob"=> "1981-03-17" ),
            array("employee_id"=> "6" ,"employee_name"=> "Dipu Raj6", "employee_join_date"=> "2017-03-18 15:09:02" ,"employee_gender"=> "Male", "employee_dob"=> "1981-03-17" ),
            array("employee_id"=> "7" ,"employee_name"=> "Dipu Raj7", "employee_join_date"=> "2017-03-18 15:09:02" ,"employee_gender"=> "Male", "employee_dob"=> "1981-03-17" ),
            array("employee_id"=> "8" ,"employee_name"=> "Dipu Raj8", "employee_join_date"=> "2017-03-18 15:09:02" ,"employee_gender"=> "Male", "employee_dob"=> "1981-03-17" ),
            array("employee_id"=> "9" ,"employee_name"=> "Dipu Raj9", "employee_join_date"=> "2017-03-18 15:09:02" ,"employee_gender"=> "Male", "employee_dob"=> "1981-03-17" ),
            );
        
        // Column settings
        $columns = array(
            "employee_id"=>array("header"=>"Employee ID", "type"=>"label", "align"=>"left", "width"=>"80px"),
            "employee_name"=>array("header"=>"Employee Name", "type"=>"label", "align"=>"left", "width"=>"150px"),
            "employee_dob"=>array("header"=>"Date of Birth", "type"=>"date", "align"=>"center", "width"=>"230px", "date_format"=>"l jS \of F Y h:i:s A", "date_format_from"=>"Y-m-d H:i:s"),
            "employee_join_date"=>array("header"=>"Join Date", "type"=>"relativedate", "align"=>"left", "width"=>"150px"),
            "employee_gender"=>array("header"=>"Gender", "type"=>"label", "align"=>"center", "width"=>"50px"),
        );
        // Config settings, optional
        $config = array("page_size"=> 5, 
                        "grid_name"=> "sg_2", 
                        "paging_enabled"=> true,
                        "toolbar_position"=> 'both',
                        "auto_generate_columns"=> true);
        // Set the grid
        $this->smartgrid->set_grid($data_list, $columns, $config);
        // Render the grid and assign to data array, so it can be print to on the view
        $data['grid_html2'] = $this->smartgrid->render_grid();
        
        // Load view
		$this->load->view('example_smartgrid', $data);
	}
}
