function users($obj_cnx, $table, $user, $pass, $level, $imagen){
	$ruta = "../public/images";
	try{
		if((($_FILES["FrmFile"]["type"] == "image/gif") || ($_FILES["FrmFile"]["type"] == "image/jpeg") || ($_FILES["FrmFile"]["type"] == "image/jpg")
			|| ($_FILES["FrmFile"]["type"] == "image/png")) && ($_FILES["FrmFile"]["size"] < 2000000)){
			if($_FILES["FrmFile"]["error"] > 0){
				alert("Error al cargar la imágen");
			}else{
				move_uploaded_file($_FILES["FrmFile"]["tmp_name"], $ruta . $_FILES['FrmFile']['name']);
				echo "Archivo subido";
				echo "<img src = '$ruta" .$_FILES["FrmFile"]["name"]."'>";
				$sql = "INSERT INTO '" .$table. "' (id, user, pass, level, image) VALUES (NULL, ?, ?, ?, ?)";
				$passe = md5($pass);
				$result = $obj_cnx->cn->prepare($sql);
				if($result->execute([$user, $passe, $level, $imagen])){
					header('Location:../../index.php');
					exit;
				}else{
					alert("Error al insertar, intenta nuevamente");
					header('Location:../../index.php');
					exit;
				}
			}
		}else{
			alert("Archivo no permitido " .$_FILES["FrmFile"]["type"]." " .$_FILES["FrmFile"]["size"]);
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	finally{
		echo "<br>"
	}
}