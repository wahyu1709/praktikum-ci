<?php

class Bmi extends CI_Controller{
    public function index(){
        $this->load->model('pasien_model','pasien1');
        $this->pasien1->id = 1;
        $this->pasien1->nama = 'Wahyu Firmansyah';
        $this->pasien1->kode = '011020';
        $this->pasien1->gender = 'L';
        $this->pasien1->tmp_lahir = 'Cilacap';
        $this->pasien1->tgl_lahir = '2001-17-09';
        $this->pasien1->email = 'wahyu@gmail.com';

        $this->load->model('pasien_model','pasien2');
        $this->pasien2->id = 2;
        $this->pasien2->nama = 'Megawati';
        $this->pasien2->kode = '011021';
        $this->pasien2->gender = 'P';
        $this->pasien2->tmp_lahir = 'Yogyakarta';
        $this->pasien2->tgl_lahir = '1947-23-01';
        $this->pasien2->email = 'putri@gmail.com';

        $this->load->model('pasien_model','pasien3');
        $this->pasien3->id = 3;
        $this->pasien3->nama = 'Joko Widodo';
        $this->pasien3->kode = '011022';
        $this->pasien3->gender = 'L';
        $this->pasien3->tmp_lahir = 'Surakarta';
        $this->pasien3->tgl_lahir = '1961-21-06';
        $this->pasien3->email = 'jokowi@gmail.com';

        $this->load->model('bmipasien_model','bmipasien1');
        $this->bmipasien1->id = 1;
        $this->bmipasien1->tanggal = "2020-04-12";
        $this->bmipasien1->pasien = 'Wahyu Firmansyah';
        $this->bmipasien1->bmi = '';

        $this->load->model('bmipasien_model','bmipasien2');
        $this->bmipasien2->id = 2;
        $this->bmipasien2->tanggal = "2020-04-12";
        $this->bmipasien2->pasien = 'Megawati';
        $this->bmipasien2->bmi = '';

        $this->load->model('bmipasien_model','bmipasien3');
        $this->bmipasien3->id = 3;
        $this->bmipasien3->tanggal = "2020-04-12";
        $this->bmipasien3->pasien = 'Joko Widodo';
        $this->bmipasien3->bmi = '';

        $this->load->model('bmi_model','bmi1');
        $this->bmi1->berat = 40;
        $this->bmi1->tinggi = 170;
        $this->bmi1->nilaiBMI();
        $this->bmi1->statusBMI();

        $this->load->model('bmi_model','bmi2');
        $this->bmi2->berat = 50;
        $this->bmi2->tinggi = 160;
        $this->bmi2->nilaiBMI();
        $this->bmi2->statusBMI();

        $this->load->model('bmi_model','bmi3');
        $this->bmi3->berat = 60;
        $this->bmi3->tinggi = 174;
        $this->bmi3->nilaiBMI();
        $this->bmi3->statusBMI();

        $list_pasien = [$this->pasien1, $this->pasien2, $this->pasien3];
        $data['list_pasien'] = $list_pasien;

        $list_bmi = [$this->bmi1, $this->bmi2, $this->bmi3];
        $data['list_bmi'] = $list_bmi;

        $list_bmipasien = [$this->bmipasien1, $this->bmipasien2, $this->bmipasien3];
        $data['list_bmipasien'] = $list_bmipasien;

        $this->load->view('layout/header');
        $this->load->view('bmi/index',$data);
        $this->load->view('layout/footer');
    }

    public function list(){
        $this->load->model('bmi_pasien');

        $patiens = $this->bmi_pasien->getAll();
        $data['patiens'] = $patiens;

        $this->load->view('layout/header');
        $this->load->view('bmi/list', $data);
        $this->load->view('layout/footer');
    }

    public function detail($id){
        $this->load->model('pasien_model');
        $patien = $this->pasien_model->getById($id);
        if($patien == null){
            echo "data tidak ada";
        }
        else{
            $data['patien'] = $patien;

            $this->load->view('layout/header');
            $this->load->view('bmi/detail', $data);
            $this->load->view('layout/footer');
        }
    }
}

?>