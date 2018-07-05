<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright		Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @copyright		Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		
		
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		//$this->load->model('user','',TRUE);
		$this->load->library('session');
		log_message('debug', "Controller Class Initialized");
		
		if(!$this->session->userdata('user_logged_in')) {
			//~ if($this->session->userdata('guest_session')) {
				//~ $session_id = $this->session->userdata('guest_session');      			
			//~ }
			//~ else{
				//~ $session_id=$this->session->userdata('session_id');				
				//~ 
			//~ }		
			//~ 
			//~ $data = $this->user->getcartdetails($session_id);
			
	    }else{
			//~ $userdata = $this->session->userdata('user_logged_in');
			//~ $user_id = $userdata['userid'];			
			//~ $data = $this->user->getLoggedInUsercartdetails($user_id);
			//~ $data_wishlist = $this->user->getLoggedInUserwishlisttdetails($user_id);
		}
		//~ $this->session->set_userdata('wishlist_qty',$data_wishlist['qty']);		
		//~ $this->session->set_userdata('wishlist_amt',$data_wishlist['amt']);
		//~ 
		//~ $this->session->set_userdata('cart_qty',$data['qty']);		
		//~ $this->session->set_userdata('cart_amt',$data['amt']);	
	}

	public static function &get_instance()
	{
		return self::$instance;
	}
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */
