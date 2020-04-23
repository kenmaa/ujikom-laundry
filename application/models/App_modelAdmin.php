<?php 
/**
* 
*/
class App_modelAdmin extends CI_Model
{
	
	public function MTampilDataUser()
	{
		return $this->db->get('tb_user')->result_array();
	}

	public function MTampilDataOutlet()
	{
		return $this->db->get('tb_outlet')->result_array();
	}

	public function MTampilDataPaketLaundry()
	{
		return $this->db->get('tb_paket')->result_array();
	}

	public function MprosesTambahUser($nm_user, $username, $password ,$id_outlet, $role)
	{
		return $this->db->insert('tb_user', [   
			'nm_user' => $nm_user, 		
			'username' => $username,	
			'password' => $password,
			'id_outlet' => $id_outlet,
			'role' => $role
			]) > 0;
	}

	public function MeditUser($id)
	{
		$this->db->where('id_user', $id);
		return $hasil = $this->db->get('tb_user')->row_array();
	}

	public function MprosesEditUser($nm_user, $username, $password ,$id_outlet, $role, $id)
	{
		$this->db->where('id_user', $id);
		return $hasil = $this->db->update('tb_user',[
			'nm_user' => $nm_user, 		
			'username' => $username,	
			'password' => $password,
			'id_outlet' => $id_outlet,
			'role' => $role
		]) > 0;
	}

	public function MhapusUser($id)
	{
		$this->db->where('id_user', $id);
		return $hasil = $this->db->delete('tb_user');
	}

	public function MprosesTambahOutlet($nm_outlet, $alamat_outlet, $tlp_outlet) 
	{ 
		return $this->db->insert('tb_outlet', [
			'nm_outlet' => $nm_outlet,
			'alamat_outlet' => $alamat_outlet,
			'tlp_outlet' => $tlp_outlet,
			]) > 0;
	}

	public function MeditOutlet($id)
	{
		$this->db->where('id_outlet', $id);
		return $hasil = $this->db->get('tb_outlet')->row_array();
	}

	public function MprosesEditOutlet($nm_outlet, $alamat_outlet, $tlp_outlet, $id)
	{
		$this->db->where('id_outlet', $id);
		return $hasil = $this->db->update('tb_outlet',[
			'nm_outlet' => $nm_outlet,
			'alamat_outlet' => $alamat_outlet,
			'tlp_outlet' => $tlp_outlet,
		]) > 0;
	}

	public function MhapusOutlet($id)
	{
		$this->db->where('id_outlet', $id);
		return $hasil = $this->db->delete('tb_outlet');
	}

	public function MprosesTambahPaketLaundry($id_outlet, $jenis_paket, $nm_paket, $harga_paket, $deskripsi_paket) 
	{
		return $this->db->insert('tb_paket', [
			'id_outlet' => $id_outlet,
			'jenis_paket' => $jenis_paket,
			'nm_paket' => $nm_paket,
			'harga_paket' => $harga_paket,
			'deskripsi_paket' => $deskripsi_paket
			]) > 0;
	}

	public function MeditPaketLaundry($id)
	{
		$this->db->where('id_paket', $id);
		return $hasil = $this->db->get('tb_paket')->row_array();
	}

	public function MprosesEditPaketLaundry($id_outlet, $jenis_paket, $nm_paket, $harga_paket, $deskripsi_paket, $id)
	{
		$this->db->where('id_paket', $id);
		return $hasil = $this->db->update('tb_paket',[
			'id_outlet' => $id_outlet,
			'jenis_paket' => $jenis_paket,
			'nm_paket' => $nm_paket,
			'harga_paket' => $harga_paket,
			'deskripsi_paket' => $deskripsi_paket
		]) > 0;
	}

	public function MhapusPaketLaundry($id)
	{
		$this->db->where('id_paket', $id);
		return $hasil = $this->db->delete('tb_paket');
	}

}
?>