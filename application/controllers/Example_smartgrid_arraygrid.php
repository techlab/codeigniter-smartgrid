<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example_smartgrid_arraygrid extends CI_Controller {
    
	public function index()
	{
        $employee_name = trim($this->input->get_post('employee_name', TRUE));   
        
        // Load the SmartGrid Library
        $this->load->library('SmartGrid/Smartgrid');
        
        // Data as array
        $data_list = array(
            array("order_id"=> "10002001" ,"user_name"=> "Jill Johnson", "order_date"=> "2016-01-08 05:19:12" ,"order_status_id"=> "2", "order_shipping_status"=> "100", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002002" ,"user_name"=> "Kelly Smith", "order_date"=> "2016-03-16 15:19:11" ,"order_status_id"=> "2", "order_shipping_status"=> "100", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002003" ,"user_name"=> "Jane Austin", "order_date"=> "2016-04-18 12:19:12" ,"order_status_id"=> "3", "order_shipping_status"=> "0", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002004" ,"user_name"=> "Sam Kimmel", "order_date"=> "2016-05-11 02:19:14" ,"order_status_id"=> "4", "order_shipping_status"=> "", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002005" ,"user_name"=> "Robert Alfy", "order_date"=> "2016-06-08 03:29:32" ,"order_status_id"=> "3", "order_shipping_status"=> "60", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002006" ,"user_name"=> "Park Mark", "order_date"=> "2016-06-12 05:19:12" ,"order_status_id"=> "5", "order_shipping_status"=> "", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002007" ,"user_name"=> "Paul John", "order_date"=> "2016-06-23 05:19:12" ,"order_status_id"=> "3", "order_shipping_status"=> "20", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002008" ,"user_name"=> "Jessica Bill", "order_date"=> "2016-07-08 05:19:12" ,"order_status_id"=> "4", "order_shipping_status"=> "", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002009" ,"user_name"=> "Jackson Grey", "order_date"=> "2016-07-18 05:19:12" ,"order_status_id"=> "1", "order_shipping_status"=> "", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002010" ,"user_name"=> "Jill Johnson", "order_date"=> "2016-01-08 05:19:12" ,"order_status_id"=> "2", "order_shipping_status"=> "100", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002011" ,"user_name"=> "Jill Johnson", "order_date"=> "2016-01-08 05:19:12" ,"order_status_id"=> "2", "order_shipping_status"=> "100", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002012" ,"user_name"=> "Kelly Smith", "order_date"=> "2016-03-16 15:19:11" ,"order_status_id"=> "2", "order_shipping_status"=> "100", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002013" ,"user_name"=> "Jane Austin", "order_date"=> "2016-04-18 12:19:12" ,"order_status_id"=> "3", "order_shipping_status"=> "0", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002014" ,"user_name"=> "Sam Kimmel", "order_date"=> "2016-05-11 02:19:14" ,"order_status_id"=> "4", "order_shipping_status"=> "", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002015" ,"user_name"=> "Robert Alfy", "order_date"=> "2016-06-08 03:29:32" ,"order_status_id"=> "3", "order_shipping_status"=> "60", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002016" ,"user_name"=> "Park Mark", "order_date"=> "2016-06-12 05:19:12" ,"order_status_id"=> "5", "order_shipping_status"=> "", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002017" ,"user_name"=> "Paul John", "order_date"=> "2016-06-23 05:19:12" ,"order_status_id"=> "3", "order_shipping_status"=> "20", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002018" ,"user_name"=> "Jessica Bill", "order_date"=> "2016-07-08 05:19:12" ,"order_status_id"=> "4", "order_shipping_status"=> "", "order_note"=> "User confirmed" ),
            array("order_id"=> "10002019" ,"user_name"=> "Jackson Grey", "order_date"=> "2016-07-18 05:19:12" ,"order_status_id"=> "1", "order_shipping_status"=> "", "order_note"=> "User confirmed" ),
            );
        
        // Source array for enum field
        $order_status_list = array(
                                "1"=>"Pending",
                                "2"=>"Confirmed",
                                "3"=>"Shipped",
                                "4"=>"Expired",
                                "5"=>"Cancelled"
                            );
        
        // Column settings
        $columns = array(
            "order_id"=>array("header"=>"Order ID", "type"=>"label", "align"=>"left", "width"=>"100px"),
            "user_name"=>array("header"=>"User Name", "type"=>"label", "align"=>"left", "width"=>"200px"),
            "order_date"=>array("header"=>"Order Date", "type"=>"date", "align"=>"center", "width"=>"150px", "date_format"=>"Y-m-d", "date_format_from"=>"Y-m-d H:i:s"),
            "order_status_id"=>array("header"=>"Order Status", "type"=>"enum", "source"=>$order_status_list, "align"=>"center", "width"=>"150px"),
            "order_shipping_status"=>array("header"=>"Shipping Status", "type"=>"progressbar", "show_value"=>false, "align"=>"center", "width"=>"200px"),
            "order_note"=>array("header"=>"Note", "type"=>"label", "align"=>"left", "width"=>""),
        );
        
        // Config settings, optional
        $config = array("page_size"=> 5);
        
        // Set the grid
        $this->smartgrid->set_grid($data_list, $columns, $config);
        
        // Render the grid and assign to data array, so it can be print to on the view
        $data['grid_html'] = $this->smartgrid->render_grid();
        
        // Load view
		$this->load->view('example_smartgrid_arraygrid', $data);
	}
}
