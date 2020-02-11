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

    $query = "SELECT  id_sitio, descripcion_sitio, 
                        estatus 
                       FROM  n_sitios ";
    if ($id_sitio != NULL) {
      $query .= " where id_sitio='{$id_sitio}'";
    }
    $query = $this->db->query($query);

    return $query->result();
  }

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


  public function guardar_sitio($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO n_sitios (descripcion_sitio) VALUES ('{$descripcion_sitio}')";
    $this->db->query($sql);
    //return 1;
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
}