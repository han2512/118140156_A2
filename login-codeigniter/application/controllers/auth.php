<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	public function index(){
		$this->load->view('login');
	}

	public function registration(){
		$nama = $this->input->post('username');
		$pass =  $this->input->post('password');
		$role = $this->input->post('role');
		$this->db->insert('user' , ['username' => $nama , 'password' => $pass , 'role' => $role ]);
		redirect('index.php/auth');
	}

	public function loginProcess(){
		$username = $this->input->post('username');
		$pass =  $this->input->post('password') ;
		$data = $this->db->get_where('user', ['username' => $username , "password" => $pass]);
		
		$userdata ;
		$userrole ;
		foreach ($data->result() as $nilai) {
			# code...
			$userdata = $nilai->username ;
			$userrole = $nilai->role;
		}

		$this->session->set_userdata('role',$userrole);
		$this->session->set_userdata('username',$userdata);
		redirect('index.php/auth/show');
	}
	public function register(){
		$this->load->view('register');
	}

	public function show(){
		$session = $this->session->userdata('username') ;
		if($session != null ){
			$data['data'] = $this->db->query('select * from artikel') ;

		$this->load->view('view' , $data);
		
		}else{
			redirect('index.php/auth');
		}
	}

	public function hapus($nilai){
		$data = $this->db->get_where('artikel', ['id' => $nilai]) ;
		$userrole ;
		foreach ($data->result() as $row) {
			# code...
			$userrole = $row->role;
		}
		$session = $this->session->userdata('role');
		if($userrole == "admin"){
			$this->db->delete('artikel', array('id' => $nilai) );
			redirect('index.php/auth/show');
		}else if($userrole != $session ){
			echo "Maaf tidak dapat dihapus ";
			redirect('index.php/auth/show');
		}else{
			$this->db->delete('artikel', array('id' => $nilai) );
			redirect('index.php/auth/show');
		}
	}

	public function data(){
	$session = $this->session->userdata('role');
		$this->load->view('tambah');
	}

	public function tambahData(){
        $data = $this->input->post('judul');
        $data2 = $this->input->post('article');
		$data3 = $this->input->post('role');
            $this->db->insert('artikel', ['judul' => $data, 'article' => $data2, 'role' => $data3]);
		redirect('index.php/auth/show');
	}
	

	public function update($nilai){
		$session = $this->session->userdata('role');
		if($session == "admin"){
		$data['nilai'] = $nilai ;
		$this->load->view('update', $data);
	    }else{
		    redirect('index.php/auth/show');
	    }
	}

	public function updateData(){
        $data = $this->input->post('judul');
		$data2 = $this->input->post('article');
		$nilai = $this->input->post('nilai');
		$role = $this->input->post('role');
		$this->db->replace('artikel' , ['id' => $nilai, 'judul' => $data, 'role' => $role, 'article' => $data2]);
		redirect('index.php/auth/show');	
	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
	    redirect('index.php/auth/');	
	}
}