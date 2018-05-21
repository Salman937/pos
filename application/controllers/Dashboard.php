<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('common_model');

		if ($this->session->userdata('logged_in') != TRUE) 
		{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$job_completed = $this->common_model->DJoin('*','jobs_details','jobs','jobs.id = jobs_details.job_id');

		$completed_job_arr = array();

		foreach ($job_completed as $value) 
		{
			$completed_jobs = $this->common_model->getAllData('jobs_details','*',array('job_id' => $value->id));
		
			if (count($completed_jobs) > 0) 
			{
				array_push($completed_job_arr,$completed_jobs );
			}

		}


		$new_arr = array();

		foreach ($completed_job_arr as $arr) 
		{
			$array = $arr[0]->job_id;
			
			array_push($new_arr,$array );
		}


		$user_completed_jobs = $this->common_model->getAllData('jobs','*');

		$return_arr = array();

		for ($i=0; $i < count($new_arr); $i++) 
		{ 
			foreach ($user_completed_jobs as $item => $index) 
			{
				if ($index->id == $new_arr[$i]) 
				{
					unset($user_completed_jobs[$item]);
					$return_arr = $user_completed_jobs;
				}
			}
		}


		if (empty($return_arr)) 
		{
			$data['jobs'] = $this->common_model->getAllData('jobs','COUNT(id) AS total_jobs');
		}
		else
		{
			$data['not_completed_jobs'] = count($return_arr);
		}

		$count = 0;

		foreach ($return_arr as $key => $value) 
		{
		    if ($value->job_accepted == '1') 
		    {
		        $count++;
		    }
		}

		if($count == 0) 
		{
			$count_accepted_jobs = $this->common_model->getAllData('jobs','COUNT(id) AS job_accepted',array('job_accepted' => 1));

			$data['job_accepted'] = $count_accepted_jobs[0]->job_accepted;
		}
		else
		{
			$data['job_accepted'] = $count;
		}




		$data['completed_jobs'] = $this->common_model->DJoin("COUNT(jobs.id) As completed_jobs",'jobs_details','jobs','jobs_details.job_id = jobs.id');

		$data['page'] = 'dashboard';
		$this->load->view('template',$data);
	}
}
