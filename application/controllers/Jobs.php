<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller 
{
	private $_uploaded;

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

	/**
	 * [load job page]
	 * @return [void]
	 */
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
			$data['jobs'] = $this->common_model->getAllData('jobs','*');
		}
		else
		{
			$data['jobs'] = $return_arr;
		}

		$data['page'] = 'jobs';
		$this->load->view('template',$data);
	}

	public function add_job($value='')
	{
		$data['page'] = 'add_new_job';
		$this->load->view('template',$data);
	}

	/**
	 * [Add New Job]
	 */
	public function add_new_job()
	{
		if (!empty(post('check_status'))) 
		{
			$config['upload_path']          = './uploads/job_images/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        // $config['max_size']             = 100;
	        // $config['max_width']            = 1024;
	        // $config['max_height']           = 768;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('img'))
	        {
	                $error = array('error' => $this->upload->display_errors());

	                $this->session->set_flashdata('error', $error);
	                redirect('Jobs','refresh');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $image = $data['upload_data']['file_name'];

	                $new_image = base_url().'uploads/job_images/'.$image;
	               
	        }

	        $data = array(
				            'company_name'   => post('companname'), 
							'mission_title'  => post('mission_title'), 
							'pay_per_job'    => post('pay_per_job'), 
							'short_desc'     => post('short_desc'), 
							'brief_desc'     => post('brief_desc'), 
							'latitude'       => post('lat'), 
							'longitude'      => post('log'), 
							'location'       => post('address'), 
							'company_logo'   => $new_image, 
							'date'           => date('Y-m-d'), 
							'time'           => date('Y-m-d H:i:s'), 
			 			);

	        $this->common_model->InsertData('jobs',$data);

	        $insert_id = $this->db->insert_id();

	        // we retrieve the number of files that were uploaded
	        $number_of_files = sizeof($_FILES['userfile']['tmp_name']);

	        $files = $_FILES['userfile'];

	        // we first load the upload library
	        $this->load->library('upload');

	        // next we pass the upload path for the images
	        $config['upload_path'] = './uploads/';

	        // also, we make sure we allow only certain type of images
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	     
	        // now, taking into account that there can be more than one file, for each file we will have to do the upload
	        for ($i = 0; $i < $number_of_files; $i++)
	        {
	            $_FILES['userfile']['name']     = $files['name'][$i];
	            $_FILES['userfile']['type']     = $files['type'][$i];
	            $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
	            $_FILES['userfile']['error']    = $files['error'][$i];
	            $_FILES['userfile']['size']     = $files['size'][$i];
	              
	            //now we initialize the upload library
	            $this->upload->initialize($config);
	            
	            if ($this->upload->do_upload('userfile'))
	            {
	                $this->_uploaded[$i] = $this->upload->data();

	                $userfile = $this->_uploaded[$i]['file_name'];

	                $img_url = base_url().'uploads/'.$userfile;

	                $data = array('job_id'   => $insert_id,
	                              'images'   => $img_url
	                              );

	                $this->common_model->InsertData('job_images',$data);

	            }
	            else
	            {
	                $error = array('error',$this->upload->display_errors());
	            }
	        }
			
			$this->session->set_flashdata('success','New Job Added Successfully');
            redirect('jobs','refresh');	
		}
		else
		{
			$config['upload_path']          = './uploads/job_images/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        // $config['max_size']             = 100;
	        // $config['max_width']            = 1024;
	        // $config['max_height']           = 768;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('img'))
	        {
	                $error = array('error' => $this->upload->display_errors());

	                $this->session->set_flashdata('error', $error);
	                redirect('Jobs','refresh');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $image = $data['upload_data']['file_name'];

	                $new_image = base_url().'uploads/job_images/'.$image;
	               
	        }

	        $data = array(
				            'company_name'   => post('companname'), 
							'mission_title'  => post('mission_title'), 
							'pay_per_job'    => post('pay_per_job'), 
							'short_desc'     => post('short_desc'), 
							'brief_desc'     => post('brief_desc'), 
							'latitude'       => post('lat'), 
							'longitude'      => post('log'), 
							'location'       => post('address'), 
							'company_logo'   => $new_image, 
							'date'           => date('Y-m-d'), 
							'time'           => date('Y-m-d H:i:s'), 
			 			);

	        $this->common_model->InsertData('jobs',$data);

	        $insert_id = $this->db->insert_id();

	        $last_job_id = array(
					       	'job_last_inserted_id' => $insert_id
					      );
	        
	        $this->session->set_userdata( $last_job_id );

	        // we retrieve the number of files that were uploaded
	        $number_of_files = sizeof($_FILES['userfile']['tmp_name']);

	        $files = $_FILES['userfile'];

	        // we first load the upload library
	        $this->load->library('upload');

	        // next we pass the upload path for the images
	        $config['upload_path'] = './uploads/';

	        // also, we make sure we allow only certain type of images
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	     
	        // now, taking into account that there can be more than one file, for each file we will have to do the upload
	        for ($i = 0; $i < $number_of_files; $i++)
	        {
	            $_FILES['userfile']['name']     = $files['name'][$i];
	            $_FILES['userfile']['type']     = $files['type'][$i];
	            $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
	            $_FILES['userfile']['error']    = $files['error'][$i];
	            $_FILES['userfile']['size']     = $files['size'][$i];
	              
	            //now we initialize the upload library
	            $this->upload->initialize($config);
	            
	            if ($this->upload->do_upload('userfile'))
	            {
	                $this->_uploaded[$i] = $this->upload->data();

	                $userfile = $this->_uploaded[$i]['file_name'];

	                $img_url = base_url().'uploads/'.$userfile;

	                $data = array('job_id'   => $insert_id,
	                              'images'   => $img_url
	                              );

	                $this->common_model->InsertData('job_images',$data);

	            }
	            else
	            {
	                $error = array('error',$this->upload->display_errors());
	            }
	        }
			
			redirect('jobs/multiple_locations','refresh');
		}
	}
	public function delete($id)
	{
		$this->common_model->DeleteDB('jobs_details',array('job_id' => $id));
		
		$this->common_model->DeleteDB('job_images',array('job_id' => $id));

		$delete = $this->common_model->DeleteDB('jobs',array('id' => $id));

		if ($delete) 
		{
			$this->session->set_flashdata('success','Job Deleted Successfully');
            redirect('Jobs','refresh');
        }
        else
        {
        	$this->session->set_flashdata('error','Error');
            redirect('Jobs','refresh');
        }
	}

	public function accepted_jobs()
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


		$user_completed_jobs = $this->common_model->getAllData('jobs','*',array('job_accepted' => 1));

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
			$data['accepted_jobs'] = $this->common_model->getAllData('jobs','*',array('job_accepted' => 1));;
		}
		else
		{
			$data['accepted_jobs'] = $return_arr;
		}

		$data['page'] = 'accepted_jobs';
		$this->load->view('template',$data);
	}
	public function completed_jobs($value='')
	{
		$data['completed_jobs'] = $this->common_model->DJoin('*','jobs_details','jobs','jobs_details.job_id = jobs.id');

		$data['page'] = 'completed_jobs';
		$this->load->view('template',$data);
	}
	public function map_jobs($value='')
	{
		$data['jobs'] = $this->common_model->getAllData('jobs',"*");

		$data['page'] = 'all_jobs_in_map';
		$this->load->view('template',$data);
	}

	public function update_job($id)
	{
		$data = $this->common_model->getAllData('jobs','*',array('id' => $id));

		echo json_encode($data);
	}
	public function update_jobs($value='')
	{
		if (!empty($_FILES["img"]["name"])) 
		{
			$config['upload_path']          = './uploads/job_images/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        // $config['max_size']             = 100;
	        // $config['max_width']            = 1024;
	        // $config['max_height']           = 768;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('img'))
	        {
	                $error = array('error' => $this->upload->display_errors());

	                $this->session->set_flashdata('error', $error);
	                redirect('Jobs','refresh');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $image = $data['upload_data']['file_name'];

	                $new_image = base_url().'uploads/job_images/'.$image;
	               
	        }
		}
		else
		{
			$new_image = post('old_img');
		}

		if (!empty($_FILES['img1']["name"]))  
		{
		   $image1 = $this->FileUpload('img1');

		   $where = array('id' => post('product_resourceID_1'));

		   $data = array(
		   					'images' => base_url().'uploads/job_images/'.$image1, 
		   				);

		   $this->common_model->UpdateDB('job_images',$where,$data);

		}

		if (!empty($_FILES['img2']["name"]))  
		{
		   $image2 = $this->FileUpload('img2');

		   $where = array('id' => post('product_resourceID_2'));

		   $data = array(
		   					'images' => base_url().'uploads/job_images/'.$image2, 
		   				);

		   $this->common_model->UpdateDB('job_images',$where,$data);

		}

		if (!empty($_FILES['img3']["name"]))  
		{
		   $image3 = $this->FileUpload('img3');

		   $where = array('id' => post('product_resourceID_3'));

		   $data = array(
		   					'images' => base_url().'uploads/job_images/'.$image3, 
		   				);

		   $this->common_model->UpdateDB('job_images',$where,$data);

		}

		if (!empty($_FILES['img4']["name"]))  
		{
		   $image4 = $this->FileUpload('img4');

		   $where = array('id' => post('product_resourceID_4'));

		   $data = array(
		   					'images' => base_url().'uploads/job_images/'.$image4, 
		   				);

		   $this->common_model->UpdateDB('job_images',$where,$data);

		}

		if (!empty($_FILES['img5']["name"]))  
		{
		   $image5 = $this->FileUpload('img5');

		   $where = array('id' => post('product_resourceID_5'));

		   $data = array(
		   					'images' => base_url().'uploads/job_images/'.$image5, 
		   				);

		   $this->common_model->UpdateDB('job_images',$where,$data);

		}

      	if (!empty($_FILES["newfile"]["name"]))
      	{
      		// we retrieve the number of files that were uploaded
            $number_of_files = sizeof($_FILES['newfile']['tmp_name']);

            $files = $_FILES['newfile'];

            // we first load the upload library
            $this->load->library('upload');

            // next we pass the upload path for the images
            $config['upload_path'] = './uploads/job_images/';

            // also, we make sure we allow only certain type of images
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
         
            // now, taking into account that there can be more than one file, for each file we will have to do the upload
            for ($i = 0; $i < $number_of_files; $i++)
            {
                $_FILES['newfile']['name']     = $files['name'][$i];
                $_FILES['newfile']['type']     = $files['type'][$i];
                $_FILES['newfile']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['newfile']['error']    = $files['error'][$i];
                $_FILES['newfile']['size']     = $files['size'][$i];
                  
                //now we initialize the upload library
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('newfile'))
                {
                    $this->_uploaded[$i] = $this->upload->data();

                    $newfile = $this->_uploaded[$i]['file_name'];

                    $newfile_url = base_url().'uploads/job_images/'.$newfile;

                    $data = array('job_id'   => post('job_id'),
                                  'images'           => $newfile_url
                                  );

                    $this->common_model->InsertData('job_images',$data);

                }
                else
                {
                    $error = array('error',$this->upload->display_errors());
                }
            }
      	} 

        $data = array(
			            'company_name'   => post('companname'), 
						'mission_title'  => post('mission_title'), 
						'pay_per_job'    => post('pay_per_job'), 
						'short_desc'     => post('short_desc'), 
						'brief_desc'     => post('brief_desc'), 
						'users_id'       => post('users_id'), 
						'job_accepted'   => post('job_accepted'), 
						'latitude'       => post('lat'), 
						'longitude'      => post('log'), 
						'location '      => post('address'), 
						'company_logo'   => $new_image, 
						'date'           => date('Y-m-d'), 
		 			);

        $update = $this->common_model->UpdateDB('jobs',array('id' => post('job_id')),$data);

        if ($update) 
        {
        	$this->session->set_flashdata('success','Job Updated Successfully');
        	redirect('Jobs','refresh');
        }
        else
        {
        	$this->session->set_flashdata('error','Server Error');
        	redirect('Jobs','refresh');
        }
	}

	// function any_uploaded($name) 
	// {
	//   foreach ($_FILES[$name]['error'] as $ferror) 
	//   {
	//     if ($ferror != UPLOAD_ERR_NO_FILE) {
	//       return true;
	//   }
 //  	}
 //  		return false;
	// }
	public function delete_completed_job($id)
	{
		$delete = $this->common_model->DeleteDB('jobs_details',array('job_id' => $id));

		if ($delete) 
		{
			$this->session->set_flashdata('success','Completed Job Deleted');
            redirect('jobs/completed_jobs','refresh');
        }
        else
        {
        	$this->session->set_flashdata('error','Error');
            redirect('jobs/completed_jobs','refresh');
        }
	}
	public function job_update($id)
	{
		$data['jobs_details'] = $this->common_model->getAllData('jobs','*',array('id' => $id));

		$data['edit_job'] = $this->common_model->getAllData('job_images','*',array('job_id' => $id));

		// pr($data);die;

		$data['page'] = 'update_job';
		$this->load->view('template',$data);
	}
	private function FileUpload($filename)
	{
		$config['upload_path'] = './uploads/job_images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		// $config['max_size']	= '10000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($filename))
		{
			$error = array('error' => $this->upload->display_errors());

			$msg = $error['error'];
			$this->session->set_flashdata('error',$msg);
			redirect('Jobs','refresh');
		}
		else
		{	
			$data = array('upload_data' => $this->upload->data());
			// pr($data);
		    return $image_name = $data['upload_data']['file_name'];
		} 

	}

	public function completed_job_details($id)
	{
		$jointbl3 = array('completed_job_multiple_images' => 'completed_job_multiple_images.job_details_id = jobs_details.id');

		$data['jobs_details'] = $this->common_model->DJoin('*','jobs_details','jobs','jobs_details.job_id = jobs.id',$jointbl3,array('jobs_details.job_id' => $id));

		// pr($data);die;

		$data['page'] = 'completed_job_details';
		$this->load->view('template',$data);
	}
	public function multiple_locations()
	{
		if ($this->input->post()) 
		{
			$data = array(
				            'company_name'   => post('companname'), 
							'mission_title'  => post('mission_title'), 
							'pay_per_job'    => post('pay_per_job'), 
							'short_desc'     => post('short_desc'), 
							'brief_desc'     => post('brief_desc'), 
							'latitude'       => post('lat'), 
							'longitude'      => post('log'), 
							'location'       => post('address'), 
							'company_logo'   => post('old_img'), 
							'date'           => date('Y-m-d'), 
							'time'           => date('Y-m-d H:i:s'), 
			 			);




			$result = $this->common_model->InsertData('jobs',$data);

	        $insert_id = $this->db->insert_id();	

			$job_images = $this->common_model->getAllData('job_images','*',array('job_id' =>$this->session->userdata('job_last_inserted_id')));

			foreach ($job_images as $img) 
			{
				$img_data = array(
								'job_id' => $insert_id, 
								'images' => $img->images, 
							  );

				$this->common_model->InsertData('job_images',$img_data);
			}
	        
			if ($result) 
			{
				$msg = "Location Added";
				$this->session->set_flashdata('success',$msg);
				redirect('Jobs/multiple_locations','refresh');
			}
			else
			{
				$msg = "Database Error";
				$this->session->set_flashdata('error',$msg);
				redirect('Jobs/multiple_locations','refresh');
			}
		}
		else
		{

			$data['jobs_details'] = $this->common_model->getAllData('jobs','*',array('id' => $this->session->userdata('job_last_inserted_id')));


			$data['page'] = 'multiple_locations';
			$this->load->view('template',$data);
		}
	}
}

/* End of file Jobs.php */
/* Location: ./application/controllers/Jobs.php */