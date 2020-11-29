<?php

require_once "conexion.php";

class ModeloConsultas {

	/*=============================================
	Mostrar Consultas
	=============================================*/
    static public function mdlMostrarConsultas($tabla, $item, $valor){

        if ($item != null) {
			
			# "SELECT * from $tabla WHERE $item = :$item"
			$stmt = Conexion::conectar()->prepare(
				"SELECT 
					c.id_consulta as 'id_consulta',
					c.paciente_id_paciente as 'id_paciente',
					concat(p.nombre_paciente,' ', p.apellido_p,' ', p.apellido_m) as 'nombre_paciente',
					p.fecha_nacimiento as 'fecha_nacimiento',
					c.doctor_id_doctor as 'id_doctor',
					concat(d.nombre_doctor,' ',d.apellidop_doctor,' ',d.apellidom_doctor) as 'nombre_doctor',
					c.fecha_consulta as 'fecha_consulta'
				FROM $tabla as c 
				join paciente as p ON c.paciente_id_paciente = p.id_paciente
				join doctor as d on c.doctor_id_doctor = d.id_doctor
				WHERE $item = :$item"
			);

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

        } 
        
		else{

			$stmt = Conexion::conectar()->prepare(
				"SELECT 
					c.id_consulta as 'id_consulta',
					c.paciente_id_paciente as 'id_paciente',
					concat(p.nombre_paciente,' ', p.apellido_p,' ', p.apellido_m) as 'nombre_paciente',
					p.fecha_nacimiento as 'fecha_nacimiento',
					concat(d.nombre_doctor,' ',d.apellidop_doctor,' ',d.apellidom_doctor) as 'nombre_doctor',
					c.fecha_consulta as 'fecha_consulta'
				FROM $tabla as c 
				join paciente as p ON c.paciente_id_paciente = p.id_paciente
				join doctor as d on c.doctor_id_doctor = d.id_doctor
				order by c.paciente_id_paciente"
			);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

	}
	
	/*=============================================
	Crear Consulta
	=============================================*/
	static public function mdlCrearConsulta($tabla, $datos){

		/*$datos = array(
			'paciente_id_paciente' => $_POST['id_paciente'],
			'doctor_id_doctor' => $_POST['id_doctor'],
			'diagnostico' => $_POST['diagnostico'],
			'receta_medica' => $_POST['receta'],
			'fecha_consulta' => $fechaConsulta
			//'estudios_true' => $_POST['edo_civil']			
		);*/

		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO $tabla(
				paciente_id_paciente, doctor_id_doctor, diagnostico, receta_medica, fecha_consulta) 
			VALUES (
				:id_paciente, :id_doctor, :diagnostico, :receta, :fechaConsulta)");

		$stmt->bindParam(":id_paciente", $datos["paciente_id_paciente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_doctor", $datos["doctor_id_doctor"], PDO::PARAM_INT);
		$stmt->bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
		$stmt->bindParam(":receta", $datos["receta_medica"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaConsulta", $datos["fecha_consulta"], PDO::PARAM_STR);

		if($stmt->execute()) {

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	
	/*=============================================
	OBTENER ÚLTIMO ID
	=============================================*/
	static public function mdlUltimoID(){

		// obtener el último registro SELECT MAX(column_name) FROM table_name;
		$stmt = Conexion::conectar()->prepare("SELECT MAX(id_paciente) FROM paciente");

		if($stmt->execute()){

			return $stmt -> fetchAll();

		}		
		else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}

}