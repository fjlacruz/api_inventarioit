<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mantenedores extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('email');
        $this->load->model('Mantenedor_model');
        $this->load->library('Configemail');
        $this->load->library('user_agent');
    }


    public function getSitios()
    {
        extract($_GET);
        $id_sitio = $this->input->get('id_sitio');
        
        $x = 1;
        if ($x == 1) {
            $sitios =  $this->Mantenedor_model->listaSitios($id_sitio);
            echo json_encode(array('response' => $sitios, 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'Acceso Restringido', 'code' => 404));
        }
    }

    function editarSitio()
    {

        extract($_POST);
    
        $up = $this->Mantenedor_model->modificarSitio($id_sitio, $descripcion_sitio,$estatus);
        if ($up==1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    public function registrar_sitio()
    {
        extract($_POST);

        $arrayData = array(
            'descripcion_sitio' => strtoupper($descripcion_sitio)       
        );
        $guardar = $this->Mantenedor_model->guardar_sitio($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }

}