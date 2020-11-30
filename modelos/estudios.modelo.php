<?php

require_once "conexion.php";

class ModeloEstudios {

	/*=============================================
	Mostrar Consultas
	=============================================*/
    static public function mdlMostrarEstudios($tabla, $item, $valor){

        if ($item != null) {
			
			$stmt = Conexion::conectar()->prepare(
                "SELECT 
                    e.id_estudio as 'id_estudio',
                    e.paciente_id_paciente as 'id_paciente',
                    e.consulta_id_consulta as 'id_consulta',
                    concat(p.nombre_paciente,' ', p.apellido_p,' ', p.apellido_m) as 'nombre_paciente',
                    p.fecha_nacimiento as 'fecha_nacimiento',
                    e.nombre_estudio as 'nombre_estudio',
                    e.descripcion_estudio as 'descripcion_estudio',
                    e.fecha_solicitud as 'fecha_solicitud',
                    c.fecha_consulta as 'fecha_consulta',
                    e.ruta_archivo as 'ruta_archivo'
                FROM $tabla as e
                join paciente as p ON e.paciente_id_paciente = p.id_paciente
                join consulta as c ON e.consulta_id_consulta = c.id_consulta
                WHERE e.$item = :$item;"
            );

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

        }


    }

}
