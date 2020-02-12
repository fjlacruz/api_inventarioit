<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Mantenedor_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // ============== Funcion para cargar sitios ==========================//
  public function listaSitios($id_sitio = NULL)
  {

    $query = "SELECT  id_sitio, UPPER(descripcion_sitio)as descripcion_sitio, 
                        estatus 
                       FROM  n_sitios ";
    if ($id_sitio != NULL) {
      $query .= " where id_sitio='{$id_sitio}'";
    }
    $query = $this->db->query($query);

    return $query->result();
  }
  //=============== Funcion para modificar sitios ==========================//
  public function modificarSitio($id_sitio, $descripcion_sitio, $estatus)
  {
    // extract($$arrayData2);
    $sql = "UPDATE n_sitios set descripcion_sitio = '{$descripcion_sitio}', estatus='{$estatus}'";
    $sql .= " where id_sitio={$id_sitio}";

    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }

  //=============== Funcion para guardar nuevos sitios ========================//
  public function guardar_sitio($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO n_sitios (descripcion_sitio,estatus) VALUES ('{$descripcion_sitio}',{$estatus})";
    $this->db->query($sql);
    //return 1;
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }

  // ============== Funcion para cargar ambientes ==========================//
  public function listaAmbientes($id_ambiente = NULL)
  {

    $query = "SELECT  id_ambiente, UPPER(descripcion_ambiente)as descripcion_ambiente, estatus FROM  n_ambientes ";
    if ($id_ambiente != NULL) {
      $query .= " where id_ambiente='{$id_ambiente}'";
    }
    $query = $this->db->query($query);

    return $query->result();
  }
  //=============== Funcion para modificar Ambientes ==========================//
  public function modificarAmbiente($id_ambiente, $descripcion_ambiente, $estatus)
  {
    // extract($$arrayData2);
    $sql = "UPDATE n_ambientes set descripcion_ambiente = '{$descripcion_ambiente}', estatus='{$estatus}'";
    $sql .= " where id_ambiente={$id_ambiente}";

    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  //=============== Funcion para guardar nuevos ambientes ========================//
  public function guardar_ambiente($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO n_ambientes (descripcion_ambiente,estatus) VALUES ('{$descripcion_ambiente}',{$estatus})";
    $this->db->query($sql);
    //return 1;
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para cargar servicios ==========================//
  public function listaServicios($id_servicio = NULL)
  {

    $query = "SELECT  id_servicio, UPPER(descripcion_servicio)as descripcion_servicio, estatus FROM  n_servicios ";
    if ($id_servicio != NULL) {
      $query .= " where id_servicio='{$id_servicio}'";
    }
    $query = $this->db->query($query);

    return $query->result();
  }
  // ============== Funcion para modificar servicios ==========================//
  public function modificarServicio($id_servicio, $descripcion_servicio, $estatus)
  {
    // extract($$arrayData2);
    $sql = "UPDATE n_servicios set descripcion_servicio = '{$descripcion_servicio}', estatus='{$estatus}'";
    $sql .= " where id_servicio={$id_servicio}";

    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para guardar servicios ==========================//
  public function guardar_servicio($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO n_servicios (descripcion_servicio,estatus) VALUES ('{$descripcion_servicio}',{$estatus})";
    $this->db->query($sql);
    //return 1;
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para cargar tipos de servidor ==========================//
  public function listaTipoServidor($id_tipo_servidor = NULL)
  {

    $query = "SELECT  id_tipo_servidor, UPPER(tipo_servidor)as tipo_servidor, estatus FROM  n_tipo_servidor ";
    if ($id_tipo_servidor != NULL) {
      $query .= " where id_tipo_servidor='{$id_tipo_servidor}'";
    }
    $query = $this->db->query($query);

    return $query->result();
  }
  // ============== Funcion para modificar tipos de servidor ==========================//
  public function modificarTipoServidor($id_tipo_servidor, $tipo_servidor, $estatus)
  {
    // extract($$arrayData2);
    $sql = "UPDATE n_tipo_servidor set tipo_servidor = '{$tipo_servidor}', estatus='{$estatus}'";
    $sql .= " where id_tipo_servidor={$id_tipo_servidor}";

    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para guardar tipos de servidor ==========================//
  public function guardar_tipoServidor($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO n_tipo_servidor (tipo_servidor,estatus) VALUES ('{$tipo_servidor}',{$estatus})";
    $this->db->query($sql);
    //return 1;
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para cargar tipos de software ==========================//
  public function listaTipoSoftware($id_tipo_software = NULL)
  {

    $query = "SELECT  id_tipo_software, UPPER(descripcion_software)as descripcion_software, estatus FROM  n_tipo_software ";
    if ($id_tipo_software != NULL) {
      $query .= " where id_tipo_software='{$id_tipo_software}'";
    }
    $query = $this->db->query($query);

    return $query->result();
  }
  // ============== Funcion para modificar tipos de software ==========================//
  public function modificarTipoSoftware($id_tipo_software, $descripcion_software, $estatus)
  {
    // extract($$arrayData2);
    $sql = "UPDATE n_tipo_software set descripcion_software = '{$descripcion_software}', estatus='{$estatus}'";
    $sql .= " where id_tipo_software={$id_tipo_software}";

    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para guardar tipos de servidor ==========================//
  public function guardar_tipoSoftware($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO n_tipo_software (descripcion_software,estatus) VALUES ('{$descripcion_software}',{$estatus})";
    $this->db->query($sql);
    //return 1;
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
}