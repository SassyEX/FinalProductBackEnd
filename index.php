<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto DWI</title>
    <link rel="stylesheet" href="public/CSS/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="pw" id="inicio">
        <h1 class="link">Diseño de Backend Services.</h1>
        <i class='bx bxs-doughnut-chart'></i>
        <script src="public/JS/funciones.js"></script>

        <nav class="nav_pw">
            <div class="container nav_container">
                <div class="logo">
                    <h2 class="logo_name">Cursos DP<span class="point">.</span></h2>
                </div>
                <div class="links">
                    <a href="#inicio" class="link">Inicio</a>
                    <a href="#cursos" class="link">Cursos</a>
                    <a href="#proyectos" class="link" onclick="mostrarSubopciones('subopciones'); 
                    ocultarSubopciones('javaexample27');
                    ocultarSubopciones('javaexample26');
                    ocultarSubopciones('javaexample11');"
                    >Proyectos</a>
                    <a href="#clientes" class="link">Clientes</a>
                    <a href="#contacto" class="link">Contacto</a>
                    <a href="views/login.php" class="link link--active">Login</a>
                </div>
            </div>    
        </nav>

        <div class="subopciones" id="ejemplos">
            <nav class="nav_pw">
                <div class="container nav_container">
                    <a href="#inicio" class="link" onclick="mostrarSubopciones('javaexample27');
                    ocultarSubopciones('javaexample26');
                    ocultarSubopciones('javaexample11');"
                    >Ejemplo 27</a>
                    <a href="#cursos" class="link" onclick="mostrarSubopciones('javaexample26');
                    ocultarSubopciones('javaexample27');
                    ocultarSubopciones('javaexample11');"
                    >Ejemplo 26</a>
                    <a href="#proyectos" class="link" onclick="mostrarSubopciones('javaexample11');
                    ocultarSubopciones('javaexample26');
                    ocultarSubopciones('javaexample27');"
                    >Ejemplo 11</a>
                </div>
            </nav>
        </div>

        <section class="container pw_main">
            <div class="pw_textos">
                <h1 class="title">Tú mejor <span class="title_active">Experiencia en Cursos</span></h1>
                <p class="copy">Nos encargamos de llevar tu conocimiento <span class="copy_active">al siguiente nivel</span></p>
                
            </div>
            <img src="public/images/course.jpg" class="mockup">
        </section>
        
        <section class="projects container" id="clientes">
            <h1 class="section-title">Clientes</h1>
            <?php
            include("models/read.php");
            read();
            ?>
            <button id="btn-abrir-modal" class="cta">Abrir modal</button>
            <?php include ("views/modal.php"); ?>
            <script src="public/JS/propsModal.js"></script>
        </section>
    </header>
</body>
</html>
