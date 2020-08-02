<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleado_model extends Model
{

	//Obteniendo todos los empleados
    public function get_empleados(){

    	return \DB::select('CALL pa_consultar()');
    }


    //Consulta para eliminar empleados
    public function eliminar_empleado($id){

    	return \DB::table('empleado')->where('id_empleado', '=', $id)->delete();
    }

    //Consulta para obtener las empresas
    public function get_empresas(){

    	return \DB::table('empresa')->get();
    }

    //Consulta para guardar los nuevos empleados
    public function set_empleado($array){

    	return \DB::select('CALL pa_insertar(?,?,?,?,?)', $array);
    }


    //Consulta para modificar los registro de los empledos
    public function modificar_empleado($datos){

    	return \DB::select('CALL pa_modificar(?,?,?,?,?,?)',$datos);
    }

    //Obteniendo todos las empresas
    public function get_emp(){

    	return \DB::select('CALL pa_consultar_emp()');
    }

}
