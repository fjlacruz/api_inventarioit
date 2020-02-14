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

    //====== funcion para obtener los sitios ==================//
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
    //====== funcion para editar los sitios ==================//
    function editarSitio()
    {

        extract($_POST);

        $up = $this->Mantenedor_model->modificarSitio($id_sitio, $descripcion_sitio, $estatus);
        if ($up == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para registrar sitios ==================//
    public function registrar_sitio()
    {
        extract($_POST);

        $arrayData = array(
            'descripcion_sitio' => strtoupper($descripcion_sitio),
            'estatus' => $estatus
        );
        $guardar = $this->Mantenedor_model->guardar_sitio($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }

    //====== funcion para obtener los ambientes ==================//
    public function getAmbientes()
    {
        extract($_GET);
        $id_ambiente = $this->input->get('id_ambiente');

        $x = 1;
        if ($x == 1) {
            $ambientes =  $this->Mantenedor_model->listaAmbientes($id_ambiente);
            echo json_encode(array('response' => $ambientes, 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'Acceso Restringido', 'code' => 404));
        }
    }

    //====== funcion para editar los ambientes ==================//
    function editarAmbiente()
    {

        extract($_POST);

        $up = $this->Mantenedor_model->modificarAmbiente($id_ambiente, $descripcion_ambiente, $estatus);
        if ($up == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para registrar ambientes ==================//
    public function registrar_ambiente()
    {
        extract($_POST);

        $arrayData = array(
            'descripcion_ambiente' => strtoupper($descripcion_ambiente),
            'estatus' => $estatus
        );
        $guardar = $this->Mantenedor_model->guardar_ambiente($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }


    //====== funcion para obtener los ambientes ==================//
    public function getServicios()
    {
        extract($_GET);
        $id_servicio = $this->input->get('id_servicio');

        $x = 1;
        if ($x == 1) {
            $servicios =  $this->Mantenedor_model->listaServicios($id_servicio);
            echo json_encode(array('response' => $servicios, 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'Acceso Restringido', 'code' => 404));
        }
    }
    //====== funcion para editar los servicios ==================//
    function editarServicio()
    {

        extract($_POST);

        $up = $this->Mantenedor_model->modificarServicio($id_servicio, $descripcion_servicio, $estatus);
        if ($up == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para registrar servicios ==================//
    public function registrar_servicios()
    {
        extract($_POST);

        $arrayData = array(
            'descripcion_servicio' => strtoupper($descripcion_servicio),
            'estatus' => $estatus
        );
        $guardar = $this->Mantenedor_model->guardar_servicio($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para obtener los tipos de servidores ==================//
    public function getTipoServidor()
    {
        extract($_GET);
        $id_tipo_servidor = $this->input->get('id_tipo_servidor');

        $x = 1;
        if ($x == 1) {
            $tipoServidor =  $this->Mantenedor_model->listaTipoServidor($id_tipo_servidor);
            echo json_encode(array('response' => $tipoServidor, 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'Acceso Restringido', 'code' => 404));
        }
    }
    //====== funcion para editar los tipos de servidor ==================//
    function editarTipoServidor()
    {

        extract($_POST);

        $up = $this->Mantenedor_model->modificarTipoServidor($id_tipo_servidor, $tipo_servidor, $estatus);
        if ($up == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }

    //====== funcion para registrar tipos de servidor ==================//
    public function registrar_TiposServidor()
    {
        extract($_POST);

        $arrayData = array(
            'tipo_servidor' => strtoupper($tipo_servidor),
            'estatus' => $estatus
        );
        $guardar = $this->Mantenedor_model->guardar_tipoServidor($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para obtener los tipos de software ==================//
    public function getTipoSoftware()
    {
        extract($_GET);
        $id_tipo_software = $this->input->get('id_tipo_software');

        $x = 1;
        if ($x == 1) {
            $tipoSoftware =  $this->Mantenedor_model->listaTipoSoftware($id_tipo_software);
            echo json_encode(array('response' => $tipoSoftware, 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'Acceso Restringido', 'code' => 404));
        }
    }
    //====== funcion para editar los tipos de software ==================//
    function editarTipoSoftware()
    {

        extract($_POST);

        $up = $this->Mantenedor_model->modificarTipoSoftware($id_tipo_software, $descripcion_software, $estatus);
        if ($up == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para registrar tipos de software ==================//
    public function registrar_TiposSoftware()
    {
        extract($_POST);

        $arrayData = array(
            'descripcion_software' => strtoupper($descripcion_software),
            'estatus' => $estatus
        );
        $guardar = $this->Mantenedor_model->guardar_tipoSoftware($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para obtener los software ==================//
    public function getSoftware()
    {
        extract($_GET);
        $id_software = $this->input->get('id_software');

        $x = 1;
        if ($x == 1) {
            $software =  $this->Mantenedor_model->listaSoftware($id_software);
            echo json_encode(array('response' => $software, 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'Acceso Restringido', 'code' => 404));
        }
    }
    //====== funcion para registrar tipos de software ==================//
    public function registrar_Software()
    {
        extract($_POST);

        $arrayData = array(
            'nombre_software' => strtoupper($nombre_software),
            'version_software' => strtoupper($version_software),
            'id_tipo_software' => $id_tipo_software,
            'nro_licencia' => strtoupper($nro_licencia),
            'proveedor' => strtoupper($proveedor),
            'contacto' => strtoupper($contacto),
            'fecha_compra' => $fecha_compra,
            'fecha_expiracion' => $fecha_expiracion,
            'estatus' => $estatus
        );
        $guardar = $this->Mantenedor_model->guardar_Software($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }

    //====== funcion para editar software ==================//
    function editarSoftware()
    {

        extract($_POST);

        $up = $this->Mantenedor_model->modificarSoftware(
            $id_software,
            $nombre_software,
            $version_software,
            $id_tipo_software,
            $nro_licencia,
            $proveedor,
            $contacto,
            $fecha_compra,
            $fecha_expiracion,
            $estatus
        );
        if ($up == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para obtener los servidores ==================//
    public function getServidor()
    {
        extract($_GET);
        $id_servidor  = $this->input->get('id_servidor');
        $buscar = strtoupper($this->input->get('buscar'));

        $x = 1;
        if ($x == 1) {
            $servidores =  $this->Mantenedor_model->listaServidores($id_servidor, $buscar);
            echo json_encode(array('response' => $servidores, 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'Acceso Restringido', 'code' => 404));
        }
    }
    //====== funcion para obtener la cantidad servidores ==================//
    public function cantidadServidores()
    {
        $cantUServidores =  $this->Mantenedor_model->cantidaDeServidores();
        echo json_encode(array('response' => $cantUServidores, 'estatus' => 'OK', 'code' => 200));
    }
    //====== funcion para editar Servidores ==================//
    function editarServidor()
    {

        extract($_POST);

        $up = $this->Mantenedor_model->modificarServidor(
            $id_servidor,
            $nombre_servidor,
            $ip_servidor,
            $id_tipo_servidor,
            $id_ambiente,
            $id_servicio,
            $id_sitio,
            $marca_servidor,
            $modelo_servidor,
            $nro_serie,
            $proveedor,
            $contacto,
            $estatus
        );
        if ($up == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para registrar servidores ==================//
    public function registrar_servidor()
    {
        extract($_POST);

        $arrayData = array(
            'nombre_servidor' => strtoupper($nombre_servidor),
            'id_servidor' => $id_servidor,
            'id_tipo_servidor' => $id_tipo_servidor,
            'id_ambiente' => $id_ambiente,
            'id_servicio' => $id_servicio,
            'id_sitio' => $id_sitio,
            'marca_servidor' => strtoupper($marca_servidor),
            'modelo_servidor' => strtoupper($modelo_servidor),
            'nro_serie' => strtoupper($nro_serie),
            'proveedor' => strtoupper($proveedor),
            'contacto' => strtoupper($contacto),
            'estatus' => $estatus
        );
        $guardar = $this->Mantenedor_model->guardar_servidor($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    //====== funcion para registrar Software-servidor ==================//
    public function registrar_servidorSoftware()
    {
        extract($_POST);

        $arrayData = array(

            'id_servidor' => $id_servidor,
            'id_software' => $id_software
        );

        $guardar = $this->Mantenedor_model->guardar_servidor_software($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }

    //====== funcion para obtener los software asignados a los servidores ==================//
    public function getServidorSoftware()
    {
        extract($_GET);
        $id_servidor  = $this->input->get('id_servidor');
        $buscar = strtoupper($this->input->get('buscar'));

        $x = 1;
        if ($x == 1) {
            $asignados =  $this->Mantenedor_model->listaSoftwareAsignados($id_servidor, $buscar);
            echo json_encode(array('response' => $asignados, 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'Acceso Restringido', 'code' => 404));
        }
    }
}