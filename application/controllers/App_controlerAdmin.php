<?php 
/**
* 
*/
class App_controlerAdmin extends CI_Controller
{
	public function __construct() {

    parent::__construct();
    $this->load->model('App_modelAdmin');
    
  	}
	
	public function Index()
	{
		$this->load->view('Vlogin');
	}
	

	public function CTampilDataUser()
	{
		$data = $this->App_modelAdmin->MTampilDataUser();
		$this->load->view('admin/user/VhomeAdmin', ['data' => $data]);
	}

	public function CTampilDataOutlet()
	{
		$data = $this->App_modelAdmin->MTampilDataOutlet();
		$this->load->view('admin/outlet/Voutlet', ['data' => $data]);
	}

	public function CTampilDataPaketLaundry()
	{
		$data = $this->App_modelAdmin->MTampilDataPaketLaundry();
		$this->load->view('admin/paket/VpaketLaundry', ['data' => $data]);
	}

	public function CtambahUser()
	{
		$data['outlets'] = $this->db->get_where('tb_outlet')->result_array();
		$this->load->view('admin/user/VtambahUser',$data);
	}

	public function CtambahOutlet()
	{
		$this->load->view('admin/outlet/VtambahOutlet');
	}

	public function CtambahPaketLaundry()
	{
		$this->load->view('admin/paket/VtambahPaketLaundry');
	}

	public function CprosesTambahUser() 
	{
		$nm_user = $this->input->post('nm_user'); 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_outlet = $this->input->post('id_outlet');
		$role = $this->input->post('role');

		$hasil = $this->App_modelAdmin->MprosesTambahUser($nm_user, $username, $password, $id_outlet, $role);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan User');

		}else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan User');
		}
		redirect('App_controlerAdmin/CTampilDataUser');
	}

	public function CeditUser($id)
	{
		$data['users'] = $this->App_modelAdmin->MEditUser($id);
		$data['outlets'] = $this->db->get_where('tb_outlet')->result_array();
		$this->load->view('admin/user/VeditUser', $data);
	}
	
	public function CprosesEditUser($id_user)
	{
		$id = $id_user;
		$nm_user = $this->input->post('nm_user'); 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_outlet = $this->input->post('id_outlet');
		$role = $this->input->post('role');

		$hasil = $this->App_modelAdmin->MprosesEditUser($nm_user, $username, $password, $id_outlet, $role, $id);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah User ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Merubah User');
		}
		redirect('App_controlerAdmin/CTampilDataUser');
	}

	public function ChapusUser($id)
	{
		$this->App_modelAdmin->MhapusUser($id);
		redirect('App_controlerAdmin/CTampilDataUser');
	}

	

	public function CprosesTambahOutlet() 
	{
		$nm_outlet = $this->input->post('nm_outlet');
		$alamat_outlet = $this->input->post('alamat_outlet');
		$tlp_outlet = $this->input->post('tlp_outlet');

		$hasil = $this->App_modelAdmin->MprosesTambahOutlet($nm_outlet, $alamat_outlet, $tlp_outlet);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan Outlet');

		}else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan Outlet');
		}
		redirect('App_controlerAdmin/CTampilDataOutlet');
	}

	public function CeditOutlet($id)
	{
		$data = $this->App_modelAdmin->MeditOutlet($id);
		$this->load->view('admin/outlet/VeditOutlet', ['data' => $data]);
	}

	public function CprosesEditOutlet($id_outlet)
	{
		$id = $id_outlet;
		$nm_outlet = $this->input->post('nm_outlet');
		$alamat_outlet = $this->input->post('alamat_outlet');
		$tlp_outlet = $this->input->post('tlp_outlet');

		$hasil = $this->App_modelAdmin->MprosesEditOutlet($nm_outlet, $alamat_outlet, $tlp_outlet, $id);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah Outlet ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Merubah Outlet');
		}
		redirect('App_controlerAdmin/CTampilDataOutlet');
	}

	public function ChapusOutlet($id)
	{
		$this->App_modelAdmin->MhapusOutlet($id);
		redirect('App_controlerAdmin/CTampilDataOutlet');
	}

	public function CprosesTambahPaketLaundry() 
	{
		$id_outlet = $this->input->post('id_outlet');
		$jenis_paket = $this->input->post('jenis_paket');
		$nm_paket = $this->input->post('nm_paket');
		$harga_paket = $this->input->post('harga_paket');
		$deskripsi_paket = $this->input->post('deskripsi_paket');

		$hasil = $this->App_modelAdmin->MprosesTambahPaketLaundry($id_outlet, $jenis_paket, $nm_paket, $harga_paket, $deskripsi_paket);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan Paket');

		}else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan Paket');
		}
		redirect('App_controlerAdmin/CTampilDataPaketLaundry');
	}

	public function CeditPaketLaundry($id)
	{
		$data = $this->App_modelAdmin->MeditPaketLaundry($id);
		$this->load->view('admin/paket/VeditPaketLaundry', ['data' => $data]);
	}

	public function CprosesEditPaketLaundry($id_paket)
	{
		$id = $id_paket;
		$id_outlet = $this->input->post('id_outlet');
		$jenis_paket = $this->input->post('jenis_paket');
		$nm_paket = $this->input->post('nm_paket');
		$harga_paket = $this->input->post('harga_paket');
		$deskripsi_paket = $this->input->post('deskripsi_paket');

		$hasil = $this->App_modelAdmin->MprosesEditPaketLaundry($id_outlet, $jenis_paket, $nm_paket, $harga_paket, $deskripsi_paket, $id);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah Paket Laundry ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Merubah Paket Laundry');
		}
		redirect('App_controlerAdmin/CTampilDataPaketLaundry');
	}

	public function ChapusPaketLaundry($id)
	{
		$this->App_modelAdmin->MhapusPaketLaundry($id);
		redirect('App_controlerAdmin/CTampilDataPaketLaundry');
	}


	
}
?>