<?php

require_once "conexion.php";

class ModeloExpedientes {

	/*=============================================
	MostrarExpedientes
	=============================================*/
    static public function mdlMostrarExpedientes($tabla, $item, $valor){

        if ($item != null) {
			
			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

        } 
        
		else{

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

	}
	
	/*=============================================
	Crear Expediente
	=============================================*/
	static public function mdlCrearExpediente($tabla, $datos){

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

	/*=============================================
	REGISTRAR SEGURO MÉDICO
	=============================================*/
	static public function mdlRegistrarSeguro($tabla2, $datos2){
		
		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO $tabla2(paciente_id_paciente, num_seguro, aseguradora, tipo_covertura, fecha_vencimiento) 
			VALUES (:id_paciente, :num_seguro, :aseguradora, :tipo_covertura, :fecha_vencimiento)");

		$stmt->bindParam(":id_paciente", $datos2["paciente_id_paciente"], PDO::PARAM_INT);
		$stmt->bindParam(":num_seguro", $datos2["num_seguro"], PDO::PARAM_STR);
		$stmt->bindParam(":aseguradora", $datos2["aseguradora"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_covertura", $datos2["tipo_covertura"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_vencimiento", $datos2["fecha_vencimiento"], PDO::PARAM_STR);

		if($stmt->execute()) {

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	REGISTRAR CONTACTO
	=============================================*/
	static public function mdlRegistrarContacto($tabla3, $datos3){

		/*$datos3 = array(
			'paciente_id_paciente' => $last_id,
			'nombre_contacto' => $_POST['nombre_contacto'],
			'apellidop_contacto' => $_POST['apellidop_contacto'],
			'apellidom_contacto' => $_POST['apellidom_contacto'],
			'relacion_paciente' => $_POST['parentesco'],
			'telefono' => $_POST['tel_contacto'],
			'email_contacto' => $email_contacto
		);*/
		
		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO $tabla3(paciente_id_paciente, nombre_contacto, apellidop_contacto, apellidom_contacto, 
			relacion_paciente, telefono, email_contacto) 
			VALUES (:id_paciente, :nombre_contacto, :apellidop_contacto, :apellidom_contacto, 
			:relacion_paciente, :telefono, :email_contacto)");

		$stmt->bindParam(":id_paciente", $datos3["paciente_id_paciente"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre_contacto", $datos3["nombre_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidop_contacto", $datos3["apellidop_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidom_contacto", $datos3["apellidom_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":relacion_paciente", $datos3["relacion_paciente"], PDO::PARAM_INT);
		$stmt->bindParam(":telefono", $datos3["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email_contacto", $datos3["email_contacto"], PDO::PARAM_STR);

		if($stmt->execute()) {

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}

}