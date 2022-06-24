<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Home extends CI_Controller {


   function __construct() {
        parent::__construct();
        error_reporting(0);

        $this->load->helper('form');
		
        //$this->load->library('form_validation');
		//$this->load->library('pagination');
        //$this->load->library('session');
        //$this->load->library('email');
        //$this->load->model('login_database');
        //$this->load->model('ph_model');
        //$this->load->helper('url');
        //$this->load->library('encryption');
        //$this->load->helper('download');
		
	 	$methodname = $this->router->fetch_method();
		$this->data = array( );
      }

	public function index()
	{
		$data = $this->data;
		$data['metatitle'] = 'Real Estate Developer | Rathi Life Spaces';
		$this->load->view('index',$data);
	}
	
	
	public function overview()
	{
		$data = $this->data;
		$data['metatitle'] = 'Overview';
		$this->load->view('overview.php',$data);
	}	
	
	public function leadership()
	{
		$data = $this->data;
		$data['metatitle'] = 'leadership';
		$this->load->view('leadership',$data);
	}
	
	public function csr()
	{
		$data = $this->data;
		$data['metatitle'] = 'csr';
		$this->load->view('csr',$data);
	}
		
	public function honors_and_awards()
	{
		$data = $this->data;
		$data['metatitle'] = 'honors and awards';
		$this->load->view('honors_and_awards',$data);
	}
			
	public function experience_with_rathilife_spaces()
	{
		$data = $this->data;
		$data['metatitle'] = 'experience with rathilife spaces';
		$this->load->view('experience_with_rathilife_spaces',$data);
	}
	
	public function project_residential()
	{
		$data = $this->data;
		$data['metatitle'] = 'project_residential';
		$this->load->view('project_residential',$data);
	}	
	
	public function projects()
	{
		$data = $this->data;
		$data['metatitle'] = 'projects';
		$this->load->view('projects',$data);
	}	
	
	public function greenairy()
	{
		$data = $this->data;
		$data['metatitle'] = 'greenairy';
		$this->load->view('greenairy',$data);
	}
	
	public function channelpartner()
	{
		$data = $this->data;
		$data['metatitle'] = 'channel partner';
		$this->load->view('channelpartner',$data);
	}	
	
	public function nri()
	{
		$data = $this->data;
		$data['metatitle'] = 'nri';
		$this->load->view('nri',$data);
	}
	
	public function referral()
	{
		$data = $this->data;
		$data['metatitle'] = 'referral';
		$this->load->view('referral',$data);
	}
	
	public function blog()
	{
		$data = $this->data;
		$data['metatitle'] = 'blog';
		$this->load->view('blog',$data);
	}
	
	public function contact()
	{
		$data = $this->data;
		$data['metatitle'] = 'contact';
		$this->load->view('contact',$data);
	}	
	
	public function parkestate()
	{
		$data = $this->data;
		$data['metatitle'] = '34parkestate';
		$this->load->view('34parkestate',$data);
	}
	
	public function nishchay()
	{
		$data = $this->data;
		$data['metatitle'] = 'nishchay';
		$this->load->view('nishchay',$data);
	}
		
	public function insignia()
	{
		$data = $this->data;
		$data['metatitle'] = 'insignia';
		$this->load->view('insignia',$data);
	}
	
	public function chambers()
	{
		$data = $this->data;
		$data['metatitle'] = 'chambers';
		$this->load->view('chambers',$data);
	}
	
	public function unicorn()
	{
		$data = $this->data;
		$data['metatitle'] = 'unicorn';
		$this->load->view('unicorn',$data);
	}
	
	public function sitemap()
	{
		$data = $this->data;
		$data['metatitle'] = 'sitemap';
		$this->load->view('sitemap',$data);
	}	
	
	public function privacy_policy()
	{
		$data = $this->data;
		$data['metatitle'] = 'privacy policy';
		$this->load->view('privacy_policy',$data);
	}
	
	public function terms_conditions()
	{
		$data = $this->data;
		$data['metatitle'] = 'terms and conditions';
		$this->load->view('terms_conditions',$data);
	}
		
	public function disclaimer()
	{
		$data = $this->data;
		$data['metatitle'] = 'disclaimer';
		$this->load->view('disclaimer',$data);
	}
	
	public function blog_one()
	{
		$data = $this->data;
		$data['metatitle'] = 'Green Living - how impactful is it?';
		$this->load->view('blog/green_living_how_impactful_is_it',$data);
	}
	
			 
			 		
}


	 
	 
	 
	 