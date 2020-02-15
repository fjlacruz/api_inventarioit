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
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para cargar los software ==========================//
  public function listaSoftware($id_software = NULL)
  {

    $query = "SELECT  s.id_software, UPPER(s.nombre_software)as nombre_software, 
                      UPPER(t.descripcion_software) as descripcion_software,s.version_software,s.estatus,
                      s.nro_licencia,s.proveedor,s.contacto,s.fecha_compra, s.fecha_expiracion,t.id_tipo_software,
                      TIMESTAMPDIFF(DAY, DATE_FORMAT(now(),'%Y-%m-%d'), s.fecha_expiracion) AS vencimiento,s.asignado
                      FROM  t_software s
                      left join n_tipo_software t on (s.id_tipo_software = t.id_tipo_software)
                      ";
    if ($id_software != NULL) {
      $query .= " where id_software='{$id_software}' order by s.fecha_expiracion ASC";
    }


    $query = $this->db->query($query);

    return $query->result();
  }
  // ============== Funcion para guardar software ==========================//
  public function guardar_Software($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO t_software (nombre_software,version_software,id_tipo_software,nro_licencia,proveedor,
                                    contacto,fecha_compra,fecha_expiracion,estatus) 
                            VALUES ('{$nombre_software}','{$version_software}','{$id_tipo_software}','{$nro_licencia}',
                                   '{$proveedor}','{$contacto}','{$fecha_compra}','{$fecha_expiracion}','{$estatus}')";
    $this->db->query($sql);
    //return 1;
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para modificar software ==========================//
  public function modificarSoftware(
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
  ) {
    $sql = "UPDATE t_software set nombre_software = '{$nombre_software}', 
                                  version_software = '{$version_software}',
                                  id_tipo_software = '{$id_tipo_software}',
                                  nro_licencia = '{$nro_licencia}',
                                  proveedor = '{$proveedor}',
                                  contacto = '{$contacto}',
                                  fecha_compra = '{$fecha_compra}',
                                  fecha_expiracion = '{$fecha_expiracion}',
                                  estatus='{$estatus}'";
    $sql .= " where id_software={$id_software}";

    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para cargar Servidores ==========================//
  public function listaServidores($id_servidor  = NULL, $buscar = NULL)
  {
    $query = "SELECT  s.id_servidor,s.id_ambiente,s.id_servicio, UPPER(s.nombre_servidor)as nombre_servidor, 
                       s.ip_servidor,s.id_sitio,s.id_tipo_servidor, UPPER(s.marca_servidor)as marca_servidor,
                       UPPER(s.modelo_servidor)as modelo_servidor, s.nro_serie, UPPER(s.proveedor)as proveedor,
                       UPPER(s.contacto)as contacto,s.estatus, a.descripcion_ambiente,se.descripcion_servicio,
                       si.descripcion_sitio,ts.tipo_servidor,s.id_software,sf.nombre_software,a.estatus as estA
                        FROM  t_servidores s 
                        left join n_ambientes a on (s.id_ambiente=a.id_ambiente)
                        left join n_servicios se on (s.id_servicio=se.id_servicio)
                        left join n_sitios si on (s.id_sitio=si.id_sitio)
                        left join n_tipo_servidor ts on (s.id_tipo_servidor=ts.id_tipo_servidor)
                        left join t_software sf on (s.id_software=sf.id_software)
                        
                        ";
    if ($id_servidor  != NULL) {
      $query .= " where s.id_servidor ='{$id_servidor}'";
    }
    if ($buscar != NULL) {
      $query .= " where s.nombre_servidor like '%{$buscar}%' or s.ip_servidor like '%{$buscar}%' or ts.tipo_servidor like '%{$buscar}%'  
      or s.marca_servidor like '%{$buscar}%' or s.modelo_servidor like '%{$buscar}%'";
    }
    if ($buscar == NULL) {
      $query .= " ORDER by s.id_servidor desc limit 10";
    }

    $query = $this->db->query($query);

    return $query->result();
  }
  // ============== Funcion para contar la cantidad de  Servidores ==========================//
  public function cantidaDeServidores()
  {
    $query = $this->db->query("SELECT count(*)as cantidad FROM t_servidores");
    return $query->result();
  }
  // ============== Funcion para modificar software ==========================//
  public function modificarServidor(
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
  ) {
    $sql = "UPDATE t_servidores set nombre_servidor = '{$nombre_servidor}', 
                                  ip_servidor = '{$ip_servidor}',
                                  id_tipo_servidor = '{$id_tipo_servidor}',
                                  id_ambiente = '{$id_ambiente}',
                                  id_servicio = '{$id_servicio}',
                                  id_sitio = '{$id_sitio}',
                                  marca_servidor = '{$marca_servidor}',
                                  modelo_servidor='{$modelo_servidor}',
                                  nro_serie='{$nro_serie}',
                                  proveedor='{$proveedor}',
                                  contacto='{$contacto}',
                                  estatus='{$estatus}'             
                                  ";

    $sql .= " where id_servidor={$id_servidor}";
    // print_r($sql);
    //exit;
    $query = $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para guardar servidores ==========================//
  public function guardar_servidor($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO t_servidores 

    (nombre_servidor,id_servidor,id_tipo_servidor,id_ambiente,id_servicio,id_sitio,marca_servidor,modelo_servidor,nro_serie,proveedor,contacto,estatus) 
    VALUES 
    ('{$nombre_servidor}',{$id_servidor},{$id_tipo_servidor},{$id_ambiente},{$id_servicio},{$id_sitio},'{$marca_servidor}','{$modelo_servidor}','{$nro_serie}','{$proveedor}','{$contacto}',{$estatus})";

    $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para guardar Software-servidor ==========================//
  public function guardar_servidor_software($arrayData)
  {
    extract($arrayData);

    $sql = "INSERT INTO  t_servidor_software (id_servidor,id_software) VALUES ('{$id_servidor}',{$id_software})";

    $this->db->query($sql);
    if ($this->db->affected_rows() > 0) {
      return 1;
    } else {
      return 0;
    }
  }
  // ============== Funcion para cargar tipos de software asignados ==========================//
  public function listaSoftwareAsignados($id_servidor, $buscar = NULL)
  {

    $query = "SELECT  ss.id_software,ss.id_servidor,s.nombre_software,n.descripcion_software,ss.id_servidor_software,
                      TIMESTAMPDIFF(DAY, DATE_FORMAT(now(),'%Y-%m-%d'), s.fecha_expiracion) AS vencimiento,s.estatus
                    FROM  t_servidor_software ss
                    left join t_software s on (ss.id_software= s.id_software)
                    left join n_tipo_software n on (s.id_tipo_software= n.id_tipo_software)

                    ";
    if ($id_servidor != NULL) {
      $query .= " where id_servidor='{$id_servidor}'";
    }

    $query = $this->db->query($query);

    return $query->result();
  }
  // ============== Funcion para eliminar de software asignados ==========================//
  public function eliminarAsignacion($id_servidor_software)
  {
    $this->db->where('id_servidor_software', $id_servidor_software);
    $this->db->delete('t_servidor_software');
  }
}