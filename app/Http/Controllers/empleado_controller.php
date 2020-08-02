<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empleado_model;
use Illuminate\Support\Facades\DB;

class empleado_controller extends Controller
{
	//Creando una variable
    protected $empleado_model;

    //Creando constructor
    public function __construct(empleado_model $empleado_model)
    {
        $this->empleado_model = $empleado_model;
    }

    //Dirige al inicio de la pagina
    public function index(){

    	$empleados = $this->empleado_model->get_empleados();
    	$empresas = $this->empleado_model->get_empresas();
    	$emp = $this->empleado_model->get_emp();

            echo view('template/header');
            echo view('index', compact('empleados','empresas','emp'));
            echo view('template/footer');
    }


    // Elimina empleados
    public function eliminar_empleado($id){

    	$this->empleado_model->eliminar_empleado($id);
        return redirect()->action('empleado_controller@index');
    }


    //Agrega nuevos empleados
    public function agregar_empleado(Request $request){

    	$array = [$request->nombre, $request->apellido, $request->direccion, $request->telefono, $request->empresa];
        $this->empleado_model->set_empleado($array);
        return redirect()->action('empleado_controller@index');

    }

    //Obtiene registros para actualizar y redirecciona a la pagina para actualizar registros
    //En este proceso se utilizo AJAX Y JSON
    public function get_Datos_empleados($id){

    	$data['emp'] = DB::table('empleado as e')->where('e.id_empleado',$id)->get();

    	$empresas = $this->empleado_model->get_empresas();

    	echo view('template/header');
        echo view('empleadoAct',$data, compact('empresas'));
        echo view('template/footer');
    }


    //Modifica los registro de los empleados
    public function modificar_empleado(Request $request){

    	$datos = [$request->nombre_empleado, $request->apellido_empleado, $request->direccion_empleado, $request->telefono_empleado, $request->id_empresa, $request->id_empleado];

        $array = $this->empleado_model->modificar_empleado($datos);
        return response()->json($array);

    }

}
