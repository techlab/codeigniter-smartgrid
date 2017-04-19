<?php
/**
 * SmartGrid for CodeIgniter with Bootstrap
 * -----------------------------------------
 * SmartGrid configuration settings
 * -----------------------------------------
 * 
 * @package         SmartGrid
 * @version         v0.6.1-beta
 * @license         MIT License
 * @copyright       Copyright (c) Dipu Raj and TechLaboratory.net
 * @author          Dipu Raj 
 * @author-website  http://dipuraj.me
 * @project-website http://www.techlaboratory.net/smartgrid
 * @github          https://github.com/techlab/codeigniter-smartgrid
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$config['auto_generate_columns'] = false;
$config['paging_enabled'] = true;
$config['page_size'] = 10;
$config['toolbar_position'] = 'both';
$config['grid_form_method'] = 'GET';
$config['grid_name'] = '';
$config['debug_mode'] = false;