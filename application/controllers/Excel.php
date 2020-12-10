<?php defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
$id=0;
class Excel extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ImportarDatos_model');
    }
function index(){
    $this->load->view('excelImport_view');
}


function fetch(){

   
    $datos=$this->ImportarDatos_model->select();
    $cantidad=$this->ImportarDatos_model->total();
    $output='
    <h3 align="center">Total de Datos - '.$cantidad.'</h3>
    <table class="table table-striped table-bordered">
    <tr>
    <th>Producto</th>
    <th>Presentacion</th>
    <th>Kg/Lt</th>
    
    </tr>';
    foreach($datos->result() as $fila){
        $output.='
        <tr>
        <td>'.$fila->productonombre.'</td>
        <td>'.$fila->presentacion.'</td>
        <td>'.$fila->cantidad.'</td>
        </tr>';
    }
    $output.='</table>';
    echo $output;
}

function import()
{
    
    $contador=0;
    $estadoalmacenes=$this->ImportarDatos_model->estadoAlmacenes();
    $estadoproductos=$this->ImportarDatos_model->estadoProductos();
if(isset($_FILES["file"]["name"]))
{
$xlsx= $_FILES["file"]["tmp_name"];
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load( $_FILES["file"]["tmp_name"]);


$dataArray = $spreadsheet->getActiveSheet()
->rangeToArray(
    'D6:T6',     
    NULL,        
    TRUE,        
    TRUE,        
    TRUE         

);

function datos($hoja,$indice,$cont,$estado){
global $id;
$ind=$indice+1;
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load($hoja);
$worksheet = $spreadsheet->getActiveSheet();
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
    for ($row = 8; $row <= $highestRow; ++$row) {    
        $codigo = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
        $nombre = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
        $presentacion = $worksheet->getCellByColumnAndRow($indice, $row)->getValue();
        $cantidad = $worksheet->getCellByColumnAndRow($ind, $row)->getValue();
        if(ltrim($codigo) == '') continue;
        $id++;
        $datos[] = array(
            'producto_id'=> $id,
            'almacen_id'=>$cont,
            'codigo'=>$codigo,
            'productonombre'  => $nombre,
            'presentacion'   => $presentacion,
            'cantidad'    => $cantidad,  
            'estado' => $estado,  
           );
 } 
 return $datos;
}
if($estadoalmacenes<0){
foreach ( $dataArray as $data ) {
    foreach ( $data as $key => $value ) {
    if(ltrim($value)!='')
    {
        $contador++;
    }
    if(ltrim($value)=='') continue;
        $datos[] = array(
            'almacen_nombre'=>$value,
        );
    }   
}
$this->ImportarDatos_model->insertalmacenes($datos);
}


$datosbase=$this->ImportarDatos_model->consultanombrealmacen();
$cont2=2;
if($estadoproductos<1){
foreach($dataArray as $d){
    foreach ($datosbase as $dato){
        foreach ($d as $k => $v){ 
            foreach ($dato as $j =>$b){
                if(ltrim($v) == ltrim($b)){
                    $cont2=$cont2+2;
                    $contador++;
                    $info=datos($xlsx,$cont2,$contador,0);
                    $this->ImportarDatos_model->insert($info);
                }
            }
        }
    }
}
$id=0;
echo 'Datos ingresados correctamente';
}else{
    foreach($dataArray as $d){
        foreach ($datosbase as $dato){
            foreach ($d as $k => $v){ 
                foreach ($dato as $j =>$b){
                    if(ltrim($v) == ltrim($b)){
                        $cont2=$cont2+2;
                        $contador++;
                        $info=datos($xlsx,$cont2,$contador,0);
                        $this->ImportarDatos_model->actualizar($info);
                    }
                }
            }
        }
    }
    echo 'Datos ingresados correctamente';    
}

$id=0;

 }
}
function prueba(){
    $query=$this->ImportarDatos_model->maxproductos();
  
    echo ($query)+1;
}
}


?>