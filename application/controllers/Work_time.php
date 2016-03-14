<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_time extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('work_time_model','work_time');
		$this->load->model('work_time_detail_model','work_time_detail');
	}

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		else
		{

			$data['current_user'] = $this->ion_auth->user()->row();
			$data['is_admin'] = $this->ion_auth->is_admin();

			$this->session->flashdata('message');

			$data['check_in'] = FALSE;
			$date_now = now();

			$where = array (
				"user_id" => $data['current_user']->id,
				"from_unixtime(work_date,'%d/%m/%Y')" => mdate('%d/%m/%Y', $date_now)
				);
			$date_of_user = $this->work_time->get_by($where);
			// Nếu không bằng NULL thì kiểm tra tiếp ở work_time_detail
			// Để kiểm tra đã ra ngoài hoặc đang làm
			if ($date_of_user != NULL)
			{
				$where = array (
					"work_time_id" => $date_of_user->id,
					"check_out" => NULL
					);

				if ( $this->work_time_detail->get_by($where) != NULL)
				{
					$data['check_in'] = TRUE;	
				}

				$data['working_time'] = $this->work_time_detail->get_many_by('work_time_id',$date_of_user->id);
			}

			$this->load->view('dashboard',$data);	
		}
	}

	public function check()	
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refresh');
		}
		else
		{
			$current_user = $this->ion_auth->user()->row();

			if (isset($_POST) && !empty($_POST))
			{
				$formSubmit = $this->input->post('check_time');

				$date_now = now();

				$where = array (
					"user_id" => $current_user->id,
					"from_unixtime(work_date,'%d/%m/%Y')" => mdate('%d/%m/%Y', $date_now)
					);
				$date_of_user = $this->work_time->get_by($where);

				if ($formSubmit == 'check_in')
				{
					// Neu la lan dau tien trong ngay thi se khoi tao ngay moi
					if ($date_of_user == NULL )
					{
						// Them vao bang work_time
						$data_insert = array (
							'user_id'      => $current_user->id,
							'work_date'    => now(),
							'note'         => '',
							'created_by'   => $current_user->first_name.' '.$current_user->last_name,
							'created_date' => now()
						);

						$insert_id = $this->work_time->insert($data_insert);

						$data_insert = array (
								'work_time_id' => $insert_id,
								'check_in' => now(),
								'created_by' => $current_user->first_name.' '.$current_user->last_name,
								'created_date' => now()
							);

						$this->work_time_detail->insert($data_insert);
						redirect('work_time/index','refresh');
						// echo $insert_id;
					}
					else
					{
						$data_insert = array (
								'work_time_id' => $date_of_user->id,
								'check_in' => now(),
								'created_by' => $current_user->first_name.' '.$current_user->last_name,
								'created_date' => now()
							);

						$this->work_time_detail->insert($data_insert);
						redirect('work_time/index','refresh');
					}

				}
				elseif ($formSubmit == 'check_out') {
					$where = array (
						"work_time_id" => $date_of_user->id,
						"check_out" => NULL
						);
					$time_detail_of_user = $this->work_time_detail->get_by($where);

					if ($time_detail_of_user!=NULL)
					{
						$data_update = array (
								'check_out' => now(),
								'modified_by' => $current_user->first_name.' '.$current_user->last_name,
								'modified_date' => now(),
							);
						$where_update = array (
								"work_time_id" => $date_of_user->id,
								"id" => $time_detail_of_user->id,
							);
						$this->work_time_detail->update_by($where_update,$data_update);

						redirect('work_time/index','refresh');
					}
				}
			}
		}
	}
}

/* End of file Work_time.php */
/* Location: ./application/controllers/Work_time.php */