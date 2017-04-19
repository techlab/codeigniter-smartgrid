# CodeIgniter SmartGrid
### A simple PHP datagrid control for CodeIgniter with Bootstrap support


SmartGrid focus on data display than data manipulation. 
We are starting with limited features to make the code very simple and robust, 
yet we will be adding more feature on the go. The code is very simple and well documented, which make it easy for customization.

+ [Homepage](http://techlaboratory.net/smartgrid)
+ [Documentation](http://techlaboratory.net/smartgrid/documentation)

Demos
-----
  + [Basic](http://techlaboratory.net/smartgrid/demo/example-smartgrid)
  + [Array Datasource](http://techlaboratory.net/smartgrid/demo/example-array-grid)
  + [with DataTables](http://techlaboratory.net/smartgrid/demo/example-smartgrid_and-datatables)

Requirements
-----
  + [CodeIgniter 3.x](https://codeigniter.com/download)
  + [Bootstrap 3+](http://getbootstrap.com/getting-started/#download)

Installation
-----
1. [Download](https://github.com/techlab/codeigniter-smartgrid/archive/master.zip) the source files
2. Copy the folder and files `application/libraries/SmartGrid/` to `application/libraries/` folder of your CodeIgniter installation
3. That's it! Start using with the examples below or at [application/controllers/Example_smartgrid.php](https://github.com/techlab/codeigniter-smartgrid/blob/master/application/controllers/Example_smartgrid.php)

Example usage
-----
on your controller:
```php
// Load the SmartGrid Library
$this->load->library('SmartGrid/Smartgrid');

// MySQL Query to get data
$sql = "SELECT * FROM employee"; 

// Column settings
$columns = array("employee_id"=>array("header"=>"Employee ID", "type"=>"label"),
                "employee_name"=>array("header"=>"Name", "type"=>"label"),
                "employee_designation"=>array("header"=>"Designation", "type"=>"label")
        );        
        
// Set the grid 
$this->smartgrid->set_grid($sql, $columns);

// Render the grid and assign to data array, so it can be print to on the view
$data['grid_html'] = $this->smartgrid->render_grid();    

// Load view
$this->load->view('example_smartgrid', $data);
```

and then, on your view:
```html
<!-- For styling, refer the bootstrap from CDN or from your server. 
Ignore this if you already have included in main view -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
```
```php
// Print the grid html
echo $grid_html; 
```
Features
-----
  + Simple datagrid for data display
  + Accepts both MySQL query and array data
  + Automatic Pagination
  + Uses Twitter Bootstrap for styling, so easy to style with any bootstrap template
  + No extra css or js files to include
  
Limitations 
----- 
  - Add, Edit, Del, Themes, Export, Search and Sort are not supported
  - Search, Sort, Themes, Export features are on pipeline
  - Database support: MySQL only for now 
  - Language support: English only for now
  - Ajax is not support now

Version
-----
**SmartGrid v0.6.5-beta**
> Notice:- SmartGrid is on beta version, usage on production environment is not recommended unless tested well. 
> Please report issue at [github issues](https://github.com/techlab/codeigniter-smartgrid/issues/)


License
----
[MIT License](https://github.com/techlab/codeigniter-smartgrid/blob/master/LICENSE)
