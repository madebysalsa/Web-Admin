<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('home');
        }
        
    }



public function registrasi()
	{
        
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run()==false) {
            $data ['title'] = 'UICCI Registrasi';
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/registrasi');
            $this->load->view('admin/templates/admin_footer');
        } else {

            echo 'data berhasil';
        }

    }

public function index()
	{
      
       $this->load->view('admin/templates/header');
        $this->load->view('admin/home_admin');
        $this->load->view('admin/templates/footer');

    }


    public function upload()
	{
        $data['upload'] = $this->db->get('pets')->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/upload', $data);
        $this->load->view('admin/templates/footer');
        
    }

    public function tampil_tgl(){
    $date1 = $this->input->post('tgl_awal');
    $date2 = $this->input->post('tgl_akhir');
    $tes = array(
    'date1' => $date1,
    'date2' => $date2);
    if ($date1 == "" || $date2 == "") {
    $tes['date_range_error_message'] = "Both date fields are required";
    } else {
    $result = $this->urbansky->export_excel($tes);
    if ($result != false) {
    $tes['result_display'] = $result;
        } else {
    $tes['result_display'] = "No record found !";
    }
    }
    $tes['show_table'] = $this->view_table();
    $this->load->view('select_form', $tes);
    }
    

    public function export_excel(){
        
    $date1 = $this->input->post('tgl_awal');
    $date2 = $this->input->post('tgl_akhir');
    $tes = array(
    'date1' => $date1,
    'date2' => $date2);

    //$condition = "SELECT * FROM pets WHERE birth BETWEEN " . "'" . $tes['date1'] . "'" . " AND " . "'" . $tes['date2'] . "'";
    $this->db->select('*');
    $this->db->from('pets');
    $this->db->where('birth >=', $date1);
    $this->db->where('birth <=', $date2);
    //birth BETWEEN " . "'" . $tes['date1'] . "'" . " AND " . "'" . $tes['date2'] . "'"
    //$this->db->where(['date1'], $this->input->post('tgl_awal'));
    //$this->db->where(['date2'], $this->input->post('tgl_akhir'));
        $data = $this->db->get();
    //$data = $this->db->get();
    //$data['pets'] = $this->db->get_where($condition);
        //return $this->db->get('pets');
        //$data = $this->db->get('pets');
        $allData = $data->result_array();
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Urban Sky");
        $objPHPExcel->getProperties()->setLastModifiedBy("Urban Sky");
        $objPHPExcel->getProperties()->setTitle("Data Kegiatan Sales");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Jenis Event');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Lokasi');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Waktu');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Keterangan');
        $baris=2;
        $x=1;

        foreach($allData  as $data){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x );
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data['gender']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data['breed']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data['birth']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$baris, $data['species']);

            $x++;
            $baris++;
        }

        $filename = "Data-Kegiatan-Sales".date("d-m-Y-H-i-s").'.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data Kegiatan Sales");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $writer->save('php://output');

        exit;

    }

    public function export_excel_prospek(){

    $date1 = $this->input->post('tgl_awal');
    $date2 = $this->input->post('tgl_akhir');
    $tes = array(
    'date1' => $date1,
    'date2' => $date2);
    $this->db->select('*');
    $this->db->from('pameran');
    $this->db->where('tanggal >=', $date1);
    $this->db->where('tanggal <=', $date2);
    $data = $this->db->get();
        $allData = $data->result_array();
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Urban Sky");
        $objPHPExcel->getProperties()->setLastModifiedBy("Urban Sky");
        $objPHPExcel->getProperties()->setTitle("Data Prospek");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama Sales');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Jenis Event');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Nama Calon konsumen');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Nomor Telepon');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Alamat');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Keterangan');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Status');

        $baris=2;
        $x=1;

        foreach($allData  as $data){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x );
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data['nama_sales']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data['jenis_event']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data['no_tlp']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$baris, $data['alamat']);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$baris, $data['tanggal']);
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$baris, $data['keterangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$baris, $data['status']);
            $x++;
            $baris++;
        }

        $filename = "Data-Prospek".date("d-m-Y-H-i-s").'.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data Prospek");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $writer->save('php://output');

        exit;

    }

    public function export_excel_datang(){

    $date1 = $this->input->post('tgl_awal');
    $date2 = $this->input->post('tgl_akhir');
    $tes = array(
    'date1' => $date1,
    'date2' => $date2);
    $this->db->select('*');
    $this->db->from('absen_datang');
    $this->db->where('tanggal >=', $date1);
    $this->db->where('tanggal <=', $date2);
    $data = $this->db->get();
        $allData = $data->result_array();
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Urban Sky");
        $objPHPExcel->getProperties()->setLastModifiedBy("Urban Sky");
        $objPHPExcel->getProperties()->setTitle("Data Absen Datang");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Lokasi');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Tanggal');
        

        $baris=2;
        $x=1;

        foreach($allData  as $data){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x );
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data['nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data['lokasi']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data['tanggal']);
           

            $x++;
            $baris++;
        }

        $filename = "Data-Absen-Datang".date("d-m-Y-H-i-s").'.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data Absen Datang");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $writer->save('php://output');

        exit;

    }

    public function export_excel_pulang(){

        $date1 = $this->input->post('tgl_awal');
        $date2 = $this->input->post('tgl_akhir');
        $tes = array(
        'date1' => $date1,
        'date2' => $date2);
        $this->db->select('*');
        $this->db->from('absen_pulang');
        $this->db->where('tanggal >=', $date1);
        $this->db->where('tanggal <=', $date2);
        $data = $this->db->get();
            $allData = $data->result_array();
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Urban Sky");
        $objPHPExcel->getProperties()->setLastModifiedBy("Urban Sky");
        $objPHPExcel->getProperties()->setTitle("Data Absen Pulang");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Lokasi');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Tanggal');
        

        $baris=2;
        $x=1;

        foreach($allData  as $data){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x );
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data['nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data['lokasi']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data['tanggal']);
           

            $x++;
            $baris++;
        }

        $filename = "Data-Absen-Pulang".date("d-m-Y-H-i-s").'.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data Absen Pulang");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $writer->save('php://output');

        exit;

    }

    public function absen_datang()
	{
        $data['absen_datang'] = $this->db->get('absen_datang')->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/absen_datang', $data);
        $this->load->view('admin/templates/footer');
        
    }
    public function hapus_absen_datang($id)
    {
        $this->db->delete('absen_datang', ['id' => $id]);
        redirect('admin/absen_datang');
    }
    public function absen_pulang()
	{
        $data['absen_pulang'] = $this->db->get('absen_pulang')->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/absen_pulang', $data);
        $this->load->view('admin/templates/footer');
        
    }
    public function hapus_absen_pulang($id)
    {
        $this->db->delete('absen_pulang', ['id' => $id]);
        redirect('admin/absen_pulang');
    }

    public function pendaftar()
	{
        $data['pendaftar'] = $this->db->get('pameran')->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/pendaftar', $data);
        $this->load->view('admin/templates/footer');
        
    }

    public function edit_upload()
	{
        $data['edit_upload'] = $this->db->get('sales')->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/edit_upload', $data);
        $this->load->view('admin/templates/footer');
        
    }

    public function delete_konsumen($id)
    {
        $this->db->delete('pameran', ['id' => $id]);
        redirect('admin/pendaftar');
    }

    public function delete_canvasing($id)
    {
        $this->db->delete('pets', ['id' => $id]);
        redirect('admin/upload');
    }

    public function delete_sales($id)
    {
        $this->db->delete('sales', ['id' => $id]);
        redirect('admin/edit_upload');
    }
    public function delete_sales_login($id)
    {
        $this->db->delete('user_table', ['id' => $id]);
        redirect('admin/data_sales');
    }

    public function edit_sales($id_gambar)
	{
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('c_password','c_password','required');
        if ($this->form_validation->run() == false) {
        $this->load->view('admin/templates/header');
        $this->load->view('admin/edit_sales',$data);
        $this->load->view('admin/templates/footer');
        } else {
           
            $update = [
                'name' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            ];  
            $this->db->update('user_table',$update);
            $this->session->set_flashdata('flash','<div class="alert alert-success">Data Berhasil Ditambahkan</div>');
            redirect('admin/edit_sales_login');
        }
        
    }

    public function data_sales()
	{
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        if ($this->form_validation->run() == false) {

        $data['data_sales'] = $this->db->get('user_table')->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/data_sales', $data);
        $this->load->view('admin/templates/footer');

        } else {


            $insert = [
                'name' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                
            ];  
            $this->db->insert('user_table',$insert);
            $this->session->set_flashdata('flash','<div class="alert alert-success">Data Berhasil Ditambahkan</div>');
            redirect('admin/data_sales');
        }
    }

}