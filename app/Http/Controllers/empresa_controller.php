<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empresa_model;
use Illuminate\Support\Facades\DB;

class empresa_controller extends Controller
{
    //Creando una variable
    protected $empresa_model;

    //Creando constructor
    public function __construct(empresa_model $empresa_model)
    {
        $this->empresa_model = $empresa_model;
    }

    // Elimina empresas
    public function eliminar_empresa($id){

    	$this->empresa_model->eliminar_empresa($id);
        return redirect()->action('empleado_controller@index');
    }

    //Agrega nueva empresa
    public function agregar_empresa(Request $request){

    	$array = [$request->empresa, $request->direccion, $request->telefono];
        $this->empresa_model->set_empresa($array);
        return redirect()->action('empleado_controller@index');

    }

    //Obtiene registros para actualizar y redirecciona a la pagina para actualizar registros
    //En este proceso se utilizo AJAX Y JSON
    public function get_Datos_empresa($id){

    	$data['empre'] = DB::table('empresa as e')->where('e.id_empresa',$id)->get();

    	echo view('template/header');
        echo view('empresaAct',$data);
        echo view('template/footer');
    }

    //Modifica los registro de las empresas
    public function modificar_empresa(Request $request){

    	$datos = [$request->nombre_empresa, $request->direccion_empresa, $request->telefono_empresa, $request->id_empresa];

        $array = $this->empresa_model->modificar_empresa($datos);
        return response()->json($array);

    }
}
