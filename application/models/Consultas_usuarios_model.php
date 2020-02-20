<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Consultas_usuarios_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // ============== Funcion para cargar usuarios ==========================//
  public function usuarios($token = NULL, $buscar = NULL, $id_usuario = NULL)
  {

    $query = "SELECT u.id_usuario,u.nombres,u.apellidos,u.rut,u.clave,r.descripcion_rol,u.email,u.usuario,u.rol,r.descripcion_rol,
              u.telefono,u.token,u.estatus,DATE_FORMAT(u.fecha_registro,'%d-%m-%Y')as fecha_registro
              FROM t_usuarios u 
              ";
    $query .= " left join n_roles r on (r.id_rol=u.rol)";


    if ($token != NULL) {
      $query .= " where u.token='{$token}'";
    }
    if ($buscar != NULL) {
      $query .= " where u.nombres like '%{$buscar}%' or u.apellidos like '%{$buscar}%' or u.rut like '%{$buscar}%'  
      or r.descripcion_rol like '%{$buscar}%' or u.telefono like '%{$buscar}%'";
    }
    if ($id_usuario != NULL) {
      $query .= " where u.id_usuario='{$id_usuario}'";
    }
    if ($buscar == NULL) {
      $query .= " ORDER by u.id_usuario desc limit 10";
    }

    //print_r($query);
    $query = $this->db->query($query);

    return $query->result();
  }


  public function loguear($rut, $clave)
  {
    $query = $this->db->query("SELECT id_usuario,nombres,apellidos,rut,clave,rol,email,
                                      telefono,token,estatus,usuario
                                      FROM t_usuarios 
                                      where rut='{$rut}' and clave='{$clave}' and estatus=1");
    return $query->result();
  }

  public function actualizarToken($id_usuario, $token)
  {
    // extract($$arrayData2);
    $sql = "UPDATE t_usuarios set token = '{$token}' where id_usuario={$id_usuario}";
    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }

  public function cancelarToken($id_usuario)
  {

    $sql = "UPDATE t_usuarios set token = null where id_usuario={$id_usuario}";
    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }

  public function usuariosToken($token)
  {
    $query = $this->db->query("SELECT * FROM t_usuarios WHERE  token='{$token}'");
    return $query->result();
  }

  public function cantidaDeusuarios()
  {
    $query = $this->db->query("SELECT count(*)as cantidad FROM t_usuarios");
    return $query->result();
  }

  public function modificarUsuario($id_usuario, $nombres, $apellidos, $rut, $usuario, $email, $telefono, $rol, $estatus, $confirmarClave = NULL)
  {
    // extract($$arrayData2);
    $sql = "UPDATE t_usuarios set nombres = '{$nombres}',";
    $sql .= " apellidos = '{$apellidos}',";
    $sql .= " rut = '{$rut}',";
    $sql .= " usuario = '{$usuario}',";
    $sql .= " telefono = '{$telefono}',";
    $sql .= " rol = '{$rol}' ,";
    $sql .= " estatus = '{$estatus}',";
    if ($confirmarClave != NULL) {
      $sql .= " clave = '{$confirmarClave}'";
    }
    $sql .= " where id_usuario={$id_usuario}";

    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }

  public function usuarios_guardar($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO t_usuarios (nombres, apellidos, rut,email,usuario,clave,telefono,rol) 
                          VALUES  ('{$nombres}','{$apellidos}','{$rut}','{$email}','{$usuario}','{$clave}','{$telefono}',{$rol})";
    $this->db->query($sql);
    //return 1;
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  public function existe_rut($rut)
  {
    $sql = "SELECT * from t_usuarios where rut = '{$rut}'";
    $query = $this->db->query($sql);
    $result = $query->result();

    if (isset($result[0])) {
      return "1";
    } else {
      return "0";
    }
  }

  public function existe_usuario($usuario)
  {
    $sql = "SELECT * from t_usuarios where usuario = '{$usuario}'";
    $query = $this->db->query($sql);
    $result = $query->result();

    if (isset($result[0])) {
      return "1";
    } else {
      return "0";
    }
  }
  // ============== Funcion para cargar lista de usuarios en select==========================//
  public function usuariosListSelect()
  {

    $query = "SELECT u.id_usuario,CONCAT(u.nombres,' ', u.apellidos)as usuario
              FROM t_usuarios u 
              left join n_roles r on (r.id_rol=u.rol)
    where u.estatus=1
    order by u.nombres,u.apellidos";

    //print_r($query);
    $query = $this->db->query($query);

    return $query->result();
  }
}