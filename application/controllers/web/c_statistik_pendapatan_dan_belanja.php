<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_statistik_pendapatan_dan_belanja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('statistik/m_pendapatan_dan_belanja');
		$this->load->model('m_logo');
	}

	function index()
	{
		//piechart pendapatan
		$pendapatan[] = $this->m_pendapatan_dan_belanja->getDataPiePendapatan();
		$json = json_encode($pendapatan);
		$json =	$this->m_pendapatan_dan_belanja->highchartJson($json);
		$data['json'] = $json;
		//piechart belanja
		$belanja[] = $this->m_pendapatan_dan_belanja->getDataPieBelanja();
		$json2 = json_encode($belanja);
		$json2 =	$this->m_pendapatan_dan_belanja->highchartJson($json2);
		$data['json2'] = $json2;
		//stackchart pendapatan realisasi
		$pendapatanstackrealisasi[] = $this->m_pendapatan_dan_belanja->getDataStackPendapatanRealisasi();
		$jsonstackrealisasi = json_encode($pendapatanstackrealisasi);
		$jsonstackrealisasi =	$this->m_pendapatan_dan_belanja->highchartJson($jsonstackrealisasi);
		$data['jsonstackrealisasi'] = $jsonstackrealisasi;
		//stackchart pendapatan belum di realisasi
		$pendapatanstackbelumrealisasi[] = $this->m_pendapatan_dan_belanja->getDataStackPendapatanBelumRealisasi();
		$jsonstackbelumrealisasi = json_encode($pendapatanstackbelumrealisasi);
		$jsonstackbelumrealisasi =	$this->m_pendapatan_dan_belanja->highchartJson($jsonstackbelumrealisasi);
		$data['jsonstackbelumrealisasi'] = $jsonstackbelumrealisasi;
		//stackchart belanja realisasi
		$belanjastackrealisasi[] = $this->m_pendapatan_dan_belanja->getDataStackBelanjaRealisasi();
		$jsonstackbelanjarealisasi = json_encode($belanjastackrealisasi);
		$jsonstackbelanjarealisasi =	$this->m_pendapatan_dan_belanja->highchartJson($jsonstackbelanjarealisasi);
		$data['jsonstackbelanjarealisasi'] = $jsonstackbelanjarealisasi;
		//stackchart belanja belum di realisasi
		$belanjastackbelumrealisasi[] = $this->m_pendapatan_dan_belanja->getDataStackBelanjaBelumRealisasi();
		$jsonstackbelanjabelumrealisasi = json_encode($belanjastackbelumrealisasi);
		$jsonstackbelanjabelumrealisasi =	$this->m_pendapatan_dan_belanja->highchartJson($jsonstackbelanjabelumrealisasi);
		$data['jsonstackbelanjabelumrealisasi'] = $jsonstackbelanjabelumrealisasi;

		//$data['result'] = $this->m_pendapatan_dan_belanja->getDataAkunPendapatan();
		//$data['jumlah'] = $this->m_pendapatan_dan_belanja->getJumlahPekerjaan();

		$data['konten_logo'] = $this->m_logo->getLogo();
		$data['logo'] = $this->load->view('v_logo', $data, TRUE);
		$data['menu'] = $this->load->view('v_navbar', $data, TRUE);
		$data['footer'] = $this->load->view('v_footer', $data, TRUE);
		$data['statistik'] = $this->load->view('web/content/java_statistik/pendapatan', $data, TRUE);
		$temp['content'] = $this->load->view('web/content/pendapatan',$data,TRUE);
		$this->load->view('templateStatistik',$temp);

	}

}