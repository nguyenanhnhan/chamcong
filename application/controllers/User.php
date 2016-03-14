<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth'));
		$this->load->helper(array('url','language'));
	}

	public function user_list()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		elseif(!$this->ion_auth->is_admin())
		{
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$data['current_user'] = $this->ion_auth->user()->row();
			$data['is_admin'] = $this->ion_auth->is_admin();

			$data['users'] = $this->ion_auth->users()->result();

			$this->load->view('user_list', $data);
		}
	}

	public function profile($id)	
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		else
		{
			$data['current_user'] = $this->ion_auth->user()->row();
			$data['is_admin'] = $this->ion_auth->is_admin();
			$data['user'] = $this->ion_auth->user($id)->row();

			$data['message'] = $this->session->flashdata('message');
			$this->load->view('profile', $data);
		}
	}

	public function edit_user($user_id)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		else
		{
			$data['current_user'] = $this->ion_auth->user()->row();
			$data['is_admin'] = $this->ion_auth->is_admin();
			$data['user'] = $this->ion_auth->user($user_id)->row();

			$data['message'] = $this->session->flashdata('message');
			$this->load->view('user_profile', $data);
		}
	}

	public function update_user($user_id)	
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		else
		{
			if (isset($_POST) && !empty($_POST))
			{
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$ip_access = $this->input->post('ip_access');

				$data = array(
						'first_name' => $first_name,
						'last_name' => $last_name,
						'ip_access' => $ip_access
					);

				$this->ion_auth->update($user_id,$data);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('user/edit_user/'.$user_id,'refresh');
			}
		}
	}

	public function change_infor($user_id)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		else
		{
			if (isset($_POST) && !empty($_POST))
			{
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$ip_access = $this->input->post('ip_access');

				$data = array(
						'first_name' => $first_name,
						'last_name' => $last_name,
						'ip_access' => $ip_access
					);

				$this->ion_auth->update($user_id,$data);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('user/profile/'.$user_id,'refresh');
			}
		}
	}

	public function change_password($user_id)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		else
		{
			if (isset($_POST) && !empty($_POST))
			{
				$new_password = $this->input->post('new_password');
				$data = array(
						'password'=>$new_password
					);
				$this->ion_auth->update($user_id,$data);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('user/profile/'.$user_id,'refresh');

			}
		}
	}

	public function add()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		elseif(!$this->ion_auth->is_admin())
		{
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$data['current_user'] = $this->ion_auth->user()->row();
			$data['is_admin'] = $this->ion_auth->is_admin();

			$data['message'] = $this->session->flashdata('message');
			$this->load->view('user_info', $data);	
		}
	}

	public function insert()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		elseif(!$this->ion_auth->is_admin())
		{
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			if (isset($_POST) && !empty($_POST))
			{

				$username = $this->input->post('user_email');
				$password = $this->input->post('new_password');
				$email = $this->input->post('user_email');
				$additional_data = array(
						'first_name'=>$this->input->post('first_name'),
						'last_name'=>$this->input->post('last_name'),
						'ip_access'=>$this->input->post('ip_access')
					);

				$this->ion_auth->register($username,$password,$email,$additional_data);

				$this->session->set_flashdata('message', $this->ion_auth->messages());

				$formSubmit = $this->input->post('submit');

				if ($formSubmit == 'save_n_next')
				{
					redirect('user/add','refresh');
				}
				else 
				{
					redirect('user/list','refresh');
				}

			}
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */