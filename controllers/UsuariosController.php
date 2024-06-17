<?php
include_once '../models/Usuarios.php';

class UsuariosController extends Users {
    public function LoadLogin() {
        echo "Accion Login" . $this->regresar;
        include_once '../views/login.php';
    }

    public function DoLogin($c1, $c2) {
        $this->User = $c1;
        $this->Pass = $c2;
        echo $c1;

        $r = $this->Read();
        if ($r) {
            session_start();
            $_SESSION['u'] = $this->User;
            header("Location:../views/inicio1.php?usuario=$this->User");
            exit();
        } else {
            header("Location:../views/login.php?error=No se encontró ese registro para el login");
            exit();
        }
    }

    public function CerrarSesion() {
        session_start();
        if (isset($_SESSION['u'])) {
            unset($_SESSION['u']);
            session_destroy();
        }
        header("Location:../Index.php");
        exit();
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'login') {
    echo "accion: " . $_POST['action'];
    $objUsuario = new UsuariosController();
    $objUsuario->DoLogin($_POST['username'], $_POST['password']);
}
?>
