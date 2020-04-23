<?php 
/**
* 
*/
class App_controler extends CI_Controller
{
	public function __construct() {

    parent::__construct();

    // load base_url
    $this->load->helper('url');
    

  	}
	
	public function Index()
	{
		$this->load->view('Vlogin');
	}
	
	public function CProsesLogin()
    {
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		$ambilData = [
			'username' => $username,
			'password' => $password
		];

        $user = $this->db->get_where('tb_user', $ambilData)->row_array();

        // jika usernya ada
        if ($user) {
            // cek password
                $data = [
					'username' => $user['username'],
					'nm_user' => $user['nm_user'],
					'id_user' => $user['id_user'],
					'id_outlet' => $user['id_outlet'],
					'role' => $user['role']
                ];
				$this->session->set_userdata($data);
				if($user['role'] == 'admin'){
					$this->session->set_flashdata('status', 'Selamat Datang : ' .$data['username']);
					redirect('App_controlerAdmin/CTampilDataUser');
				} elseif($user['role'] == 'kasir') { 
					$this->session->set_flashdata('status', 'Selamat Datang : ' .$data['username']);
					redirect('App_controler/CTampilMember');
				} else {
					$this->session->set_flashdata('status', 'Selamat Datang : ' .$data['username']);
					redirect('App_controler/CtampilLaporanOwner'); 
				}
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Atau Password Salah</div>');
            redirect();
		}
    }

	public function Clogout()
	{
		$this->session->unset_userdata('username');
		redirect('App_controler');
	}


	public function CTampilMember()
	{
		$id_user = $this->session->userdata('id_user');
		$data = $this->App_model->MTampilMember($id_user);
		$this->load->view('member/VHome', ['data' => $data]);
	}

	public function CtambahMember()
	{
		$this->load->view('member/VtambahMember');
	}

	public function CprosesTambahMember()
	{
		$id_user = $this->session->userdata('id_user');
		$nm_member = $this->input->post('nm_member');
		$tlp_member = $this->input->post('tlp_member');
		$alamat_member = $this->input->post('alamat_member');
		$jk_member = $this->input->post('jk_member');

		$hasil = $this->App_model->MprosesTambahMember($nm_member, $tlp_member, $alamat_member, $jk_member, $id_user);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan Member');

		}else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan Member');
		}
		redirect('App_controler/CTampilMember');
	}

	public function CeditMember($id)
	{
		$data = $this->App_model->MEditMember($id);
		$this->load->view('member/VeditMember', ['data' => $data]);
	}

	public function CprosesEditMember($id_member)
	{
		$id = $id_member;
		$nm_member = $this->input->post('nm_member');
		$tlp_member = $this->input->post('tlp_member');
		$alamat_member = $this->input->post('alamat_member');
		$jk_member = $this->input->post('jk_member');

		$hasil = $this->App_model->MprosesEditMember($nm_member, $tlp_member, $alamat_member, $jk_member, $id);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah Member ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Merubah Member');
		}
		redirect('App_controler/CTampilMember');
	}

	public function ChapusMember($id)
	{
		$this->App_model->MHapusMember($id);
		redirect('App_controler/CTampilMember');
	}

	public function CtampilPaket()
	{
		$ambil_jenis = $this->App_model->MambilJenis();
		$id_outlet = $this->session->userdata('id_outlet');

		foreach ($ambil_jenis as $j) {
			if ($j['jenis_paket'] == 'paketan') {
				$paketan = $this->App_model->MtampilPaket('paketan', $id_outlet);
				$paketan2 = $this->load->view('paket/VLaundryPaket', ['data' => $paketan], true);
			} elseif ($j['jenis_paket'] == 'standar' ) {
				$standar = $this->App_model->MtampilPaket('standar', $id_outlet);
				$standar2 = $this->load->view('paket/VLaundryStandar', ['data' => $standar], true);
			}
		}

		$this->load->view('paket/Vpaket', ['standar' => $standar2, 'paketan' => $paketan2]);

	}

	public function CtampilKeranjang()
	{
		$data = $this->App_model->MtampilKeranjang($this->session->userdata('id_user'));
		$this->load->view('Vkeranjang', ['data' => $data]);
	}

	public function CmasukKeranjang($id)
	{
		
		$id_paket = $id;
		$id_user = $this->session->userdata('id_user');
		$qty = $this->input->post('kuantitas');


		$hasil = $this->App_model->MmasukKeranjang($qty, $id_paket, $id_user);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Masuk Keranjang ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Masuk Keranjang');
		}
		redirect('App_controler/CtampilPaket');
	}

	public function CHapusKeranjang($id_detail_transaksi)
	{
 		$this->App_model->MHapusKeranjang($id_detail_transaksi);
	 	redirect('App_controler/CTampilKeranjang');
	}

	public function CProsesKeranjang()
	{
		$total_harga = $this->input->post('total_bayar');
		$id_member = $this->input->post('id_member');
		$biaya_tambahan = $this->input->post('biaya_tambahan');
		$pajak = $this->input->post('pajak');
		$diskon = $this->input->post('diskon');
		$keterangan = $this->input->post('keterangan');
		$batas_waktu = $this->input->post('batas_waktu');

		$id_user = $this->session->userdata('id_user');
		$id_outlet = $this->session->userdata('id_outlet');
		
		$hasil = $this->App_model->MProsesKeranjang($id_member, $biaya_tambahan, $pajak, $diskon, $id_user, $id_outlet, $batas_waktu, $total_harga);
		$hasil2 = $this->App_model->MUpdateKeranjang($id_user, $keterangan, $id_member);
		
		$invoice = $this->App_model->MAmbilDataTransaksi($id_member);
		$invoice2 = array(
			'kode_invoice' => $invoice['kode_invoice']
			);

		$updateStatus = $this->App_model->MUpdateStatus($invoice2['kode_invoice']);

		if ($hasil == true) {
			$this->session->set_userdata($invoice2);
			$this->session->set_flashdata('status', 'Berhasil Checkout, dengan Kode Invoice : '.$invoice2['kode_invoice']);

		}else {
			$this->session->set_flashdata('status', 'Gagal Checkout');
		}
		redirect('App_controler/CtampilKeranjang');
	}

	public function CTampilPembayaran()
	{
		$id_user = $this->session->userdata('id_user');

		$data = $this->App_model->MTampilPembayaran($id_user);
		$this->load->view('Vpembayaran', ['data' => $data]);
	}

	public function CProsesTampilPembayaran($id_transaksi)
	{
		$data = $this->App_model->MProsesTampilBayar($id_transaksi);
		$this->load->view('VprosesPembayaran', ['data' => $data]);
	}

	public function CHapusPembayaran($id_transaksi)
	{
		$data = $this->App_model->MHapusPembayaran($id_transaksi);
		redirect('App_controler/CTampilPembayaran');
	}

	public function CProsesBayar($id_transaksi)
	{
		$bayar = $this->input->post('bayar');
		$ambil_total_harga = $this->App_model->MAmbilTotal($id_transaksi);
		$total_harga = $ambil_total_harga['total_harga'];

		$hasil = $this->App_model->MProsesBayar($id_transaksi, $bayar, $total_harga);

		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Pembayaran Berhasil ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Melakukan Pembayaran');
		}

		redirect('App_controler/CProsesTampilPembayaran/'.$id_transaksi);
	}

	public function CTampilSelesai($id_transaksi)
	{
		$hasil = $this->App_model->MTampilSelesai($id_transaksi);

		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Data Berhasil Diperbaharui ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Melakukan Pembaharuan');
		}

		redirect('App_controler/CTampilPembayaran/');
	}

	public function CProsesTampilPengambilan($id_transaksi)
	{
		$data = $this->App_model->MProsesTampilBayar($id_transaksi);
		$this->load->view('VprosesPengambilan', ['data' => $data]);
	}

	public function CProsesPengambilan($id_transaksi)
	{
		$hasil = $this->App_model->MProsesPengambilan($id_transaksi);

		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Data Berhasil Diperbaharui ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Melakukan Pembaharuan');
		}

		redirect('App_controler/CTampilPembayaran/');
	}

	public function CtampilLaporan()
	{
		$id_user = $this->session->userdata('id_user');

		$data = $this->App_model->MTampilPembayaran($id_user);
		$this->load->view('VLaporan', ['data' => $data]);
	}

	public function CtampilLaporanOwner() 
	{
		$id_user = $this->session->userdata('id_user');
		
		$data = $this->App_model->MTampilPembayaranOwner();
		$this->load->view('owner/VhomeOwner', ['data' => $data]); 
	}

	public function CcariRange()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$id_user = $this->session->userdata('id_user');

		$data = $this->App_model->MCariRange($id_user, $tgl_awal, $tgl_akhir);
		$this->load->view('Vlaporan', ['data' => $data]);
	}

	public function CcariRangeOwner()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$id_user = $this->session->userdata('id_user');

		$data = $this->App_model->MCariRangeOwner($id_user, $tgl_awal, $tgl_akhir);
		$this->load->view('owner/VhomeOwner', ['data' => $data]);
	}

	public function CPdf()
	{
		
		$data['data'] = $this->App_model->tampil_data()->result();
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan.pdf";
		$this->pdf->load_view('VtampilanPdf', $data);
	}

}

?>