<?php

require_once "conexion.php";

class ModeloConsultas {

	/*=============================================
	Mostrar Consultas
	=============================================*/
    static public function mdlMostrarConsultas($tabla, $item, $valor){

        if ($item != null) {

/*SELECT 
	c.id_consulta as 'id_consulta',
	c.paciente_id_paciente as 'id_paciente',
	concat(p.nombre_paciente,' ', p.apellido_p,' ', p.apellido_m) as 'nombre_paciente',
	p.fecha_nacimiento as 'fecha_nacimiento',
	concat(d.nombre_doctor,' ',d.apellidop_doctor,' ',d.apellidom_doctor) as 'nombre_doctor',
	c.fecha_consulta as 'fecha_consulta'
FROM consulta as c 
join paciente as p ON c.paciente_id_paciente = p.id_paciente
join doctor as d on c.doctor_id_doctor = d.id_doctor
WHERE c.id_consulta = 1 */

			
			# "SELECT * from $tabla WHERE $item = :$item"
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
				order by c.id_consulta"
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

		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO $tabla(nombre_paciente, apellido_p, apellido_m, fecha_nacimiento, sexo, 
				estado_civil, email, telefono, tipo_sangre, alergias, 
				antecedentes_medicos, antecedentes_familiares, domicilio, fecha_creacion) 
			VALUES (:nombre, :apellidop, :apellidom, :fecha_n, :sexo,
				:edo_civil, :email, :tel, :tipo_sangre, :alergias,
				:antecedentes_m, :antecedentes_f, :domicilio, now())");

		$stmt->bindParam(":nombre", $datos["nombre_paciente"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidop", $datos["apellido_p"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidom", $datos["apellido_m"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_n", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_INT);
		$stmt->bindParam(":edo_civil", $datos["estado_civil"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_sangre", $datos["tipo_sangre"], PDO::PARAM_INT);
		$stmt->bindParam(":alergias", $datos["alergias"], PDO::PARAM_STR);
		$stmt->bindParam(":antecedentes_m", $datos["antecedentes_medicos"], PDO::PARAM_STR);
		$stmt->bindParam(":antecedentes_f", $datos["antecedentes_familiares"], PDO::PARAM_STR);
		$stmt->bindParam(":domicilio", $datos["domicilio"], PDO::PARAM_STR);

		if($stmt->execute()) {

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	// obtener el último registro SELECT MAX(column_name) FROM table_name;

	/*=============================================
	OBTENER ÚLTIMO ID
	=============================================*/
	static public function mdlUltimoID(){

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