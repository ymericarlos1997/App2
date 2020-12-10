<?php defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class ImportExcel extends CI_Controller{
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
$estado=0;
if(isset($_FILES["file"]["name"]))
{

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load($_FILES["file"]["tmp_name"]);
$worksheet = $spreadsheet->getActiveSheet();
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);


for ($row = 2; $row <= $highestRow; ++$row) {
    
    $producto = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
    $presentacion = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
    $cantidad = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
    if(ltrim($producto) == '' && ltrim($presentacion) == '' && ltrim($cantidad) == '' ) continue;
    if(ltrim($producto)!=''){
        $prod=$producto;
    }    
    $contador++;
    $datos[] = array(
        'id'=>$contador,
        'productonombre'  => $prod,
        'presentacion'   => $presentacion,
        'cantidad'    => $cantidad,  
        'estado' => $estado,  
       );
}
//$this->ImportarDatos_model->insert($datos);
   print_r($datos);
 }
 }
}

?>