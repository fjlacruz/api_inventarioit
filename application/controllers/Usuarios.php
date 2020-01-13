<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('email');
        $this->load->model('Consultas_usuarios_model');
        $this->load->library('Configemail');
        $this->load->library('user_agent');
    }
    //============funcion para loguear usuarios=======================//
    function userLogin()
    {
        $rut = $this->input->post('rut');
        $clave = md5($this->input->post('clave'));
  
        $user = $this->Consultas_usuarios_model->loguear($rut, $clave);
        foreach ($user as $resultado) {
            $id_usuario =  $resultado->id_usuario;
            $nombres =  $resultado->nombres;
            $apellidos =  $resultado->apellidos;
            $rut =  $resultado->rut;
            $usuario =  $resultado->usuario;
            $email =  $resultado->email;
            $clave =  $resultado->clave;
            $token =  $resultado->token;
            $rol =  $resultado->rol;
            $telefono = $resultado->telefono;
        }
        // en caso de existir los datos del usuario se genera el token para el acceso
        if ($user) {
            $token = sha1(rand(0000, 9999));
            $up = $this->Consultas_usuarios_model->actualizarToken($id_usuario, $token);
            if ($up == 1) {
                echo json_encode(array('token' => $token, 'res' => 'success'));
            }
        } else {
            echo json_encode(array('token' => '', 'res' => 'fail'));
        }
    }

    //====== funcion para cerrar la sesion del usuario==========//
    function logout()
    {
        extract($_GET);

        $userToken = $this->Consultas_usuarios_model->usuariosToken($token);

        foreach ($userToken as $resultado) {
            $id_usuario =  $resultado->id_usuario;
        }
        //se actualiza el token a NULL
        $up = $this->Consultas_usuarios_model->cancelarToken($id_usuario);
        if ($up == 1) {
            echo json_encode(array('res' => 'success'));
        } else {
            echo json_encode(array('res' => 'fail'));
        }
    }

    public function getUsers()
    {
        $token = $this->input->get('token');
        $buscar = $this->input->get('buscar'); // Variable que viene por get desde el buscador de usuarios
        $id_usuario = $this->input->get('id_usuario');
        $x = 1;
        if ($x == 1) {
            $usuarios =  $this->Consultas_usuarios_model->usuarios($token, $buscar, $id_usuario);
            echo json_encode(array('response' => $usuarios, 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'Acceso Restringido', 'code' => 404));
        }
    }


    public function cantidadUsuarios()
    {

        $cantUsuarios =  $this->Consultas_usuarios_model->cantidaDeusuarios();
        echo json_encode(array('response' => $cantUsuarios, 'estatus' => 'OK', 'code' => 200));
    }

    function editarUsuario()
    {

        extract($_POST);
        $up = $this->Consultas_usuarios_model->modificarUsuario($id_usuario, $nombres, $apellidos, $rut, $usuario, $email, $telefono, $rol, $estatus);
        if ($up) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }
    public function registrar_usuario()
    {
        extract($_POST);

        $arrayData = array(
            'nombres' => strtoupper($nombres),
            'apellidos' => strtoupper($apellidos),
            'rut' => strtoupper($rut),
            'usuario' => strtoupper($usuario),
            'telefono' => $telefono,
            'email' => strtoupper($email),
            'rol' => $rol,
            'clave' => md5($rut) // se asigna por defecto el rut           
        );
        $guardar = $this->Consultas_usuarios_model->usuarios_guardar($arrayData);
        if ($guardar == 1) {
            echo json_encode(array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
        } else {
            echo json_encode(array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
        }
    }

















    ///CLAVES DE USUARIO recibe el tama�o de la clave
    function generarClaveAleatoria($tamanio)
    {
        $chars        = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charsLength  = strlen($chars);
        $randomString = '';
        for ($i = 0; $i < $tamanio; $i++) {
            $randomString .= $chars[rand(0, $charsLength - 1)];
        }
        return $randomString;
    }

    // CONSULTAMOS SI EXISTE EL CORREO 
    function consultar_correo()
    {
        extract($_POST);

        $consultarUsuario = $this->Consultas_usuarios_model->existe_correo($correo);

        if ($consultarUsuario[0] != '0') {
            echo 1;
        } else {
            echo 2;
        }
    }

    // ENVIAMOS LA CONTRASEÑA ALEATORIA, AL CORREO REGISTRADO
    function recuperarClave()
    {
        extract($_POST);


        $claveNueva = $this->generarClaveAleatoria(8);
        print_r($claveNueva);
        $correo = $this->input->post('correo_recuperar');
        $clave  = md5($claveNueva);

        $this->Consultas_usuarios_model->actualizar_contrasenia($correo, $clave);

        $msje = "Reciba un cordial saludo sr(a)  ud, a solicitado sus datos de acceso al sistema. 
    A continuacion los <b>datos de ingreso</b>: <br>

    Clave: <b>" . $claveNueva . "</b>";

        $configuracionSrvCorreo = $this->configemail->ConfigSrvEmail();
        $this->email->initialize($configuracionSrvCorreo);
        $this->email->from('idsistemas15@gmail.com');
        $this->email->to($correo);
        $this->email->subject('Recuperación de Contraseña');
        $this->email->message($msje);
        $this->email->message($msje);
        $this->email->send();
    }
}
