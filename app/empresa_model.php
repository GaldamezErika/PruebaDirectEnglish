<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresa_model extends Model
{
    //Consulta para eliminar empresas
    public function eliminar_empresa($id){

    	return \DB::table('empresa')->where('id_empresa', '=', $id)->delete();
    }

    //Consulta para guardar las nuevas empresas
    public function set_empresa($array){

    	return \DB::select('CALL pa_insertar_empr(?,?,?)', $array);
    }

    //Consulta para modificar los registro de las empresas
    public function modificar_empresa($datos){

    	return \DB::select('CALL pa_modificar_empr(?,?,?,?)',$datos);
    }
}
