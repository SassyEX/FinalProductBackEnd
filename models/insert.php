<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];
    $table = $_POST['table'];

    $connection = new connection('practicabd');

    $imagen = '';
    if (isset($_FILES['FrmFile']) && $_FILES['FrmFile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['FrmFile']['tmp_name'];
        $fileName = $_FILES['FrmFile']['name'];
        $fileSize = $_FILES['FrmFile']['size'];
        $fileType = $_FILES['FrmFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = '../public/images/';
            $dest_path = $uploadFileDir . $fileName;
            
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $imagen = $fileName;
            } else {
                echo 'Error moving the file.';
                exit;
            }
        } else {
            echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            exit;
        }
    }

    $passHash = md5($pass);

    try {
        $sql = "INSERT INTO $table (user, pass, level, image) VALUES (?, ?, ?, ?)";
        $stmt = $connection->cn->prepare($sql);
        if ($stmt->execute([$user, $passHash, $level, $imagen])) {
            header('Location: ../index.php');
            exit;
        } else {
            echo 'Error al insertar, intenta nuevamente';
            exit;
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    } finally {
        $connection->CloseConnection();
    }
}
?>
