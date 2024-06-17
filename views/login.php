<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  <link rel="stylesheet" href="../public/CSS/login.css">
  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../public/JS/login.js"></script>
</head>
<body>
  <div id="back">
    <div class="backRight"></div>
    <div class="backLeft"></div>
  </div>

  <div id="slideBox">
    <div class="topLayer">
      <div class="left">
        <div class="content">
          <h2>Sign Up</h2>
          <form method="post" onsubmit="return false;">
            <div class="form-group">
              <input type="text" id="signup-username" placeholder="username" />
            </div>
            <!-- Add more fields for Sign Up as needed -->
            <button id="goLeft" class="off">Login</button>
            <button id="signup" type="submit">Sign up</button>
            <button id="btn_home" class="off">Regresar</button>
          </form>
        </div>
      </div>
      <div class="right">
        <div class="content">
          <h2>Login</h2>
          <form method="post" action="../controllers/UsuariosController.php">
            <div class="form-group">
              <input type="hidden" name="action" value="login">
              <input type="text" id="login-username" name="username" placeholder="username" required>
              <input type="password" id="login-password" name="password" placeholder="password" required>
            </div>
            <button id="goRight" class="off">Sign Up</button>
            <button id="login" type="submit">Login</button>
            <?php 
              if(isset($_GET['error'])){
                echo "<br><span class='error'>".$_GET['error']."</span><br>";
              }
            ?>
            <button id="btn_home" class="action">Regresar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Inspiration from: http://ertekinn.com/loginsignup/-->
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  <link rel="stylesheet" href="../public/CSS/login.css">
  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../public/JS/login.js"></script>
</head>
<body>
  <div id="back">
    <div class="backRight"></div>
    <div class="backLeft"></div>
  </div>

  <div id="slideBox">
    <div class="topLayer">
      <div class="left">
        <div class="content">
          <h2>Sign Up</h2>
          <form method="post" onsubmit="return false;">
            <div class="form-group">
              <input type="text" id="signup-username" placeholder="username" />
            </div>
            <!-- Add more fields for Sign Up as needed -->
            <button id="goLeft" class="off">Login</button>
            <button id="signup" type="submit">Sign up</button>
            <button id="btn_home" class="off">Regresar</button>
          </form>
        </div>
      </div>
      <div class="right">
        <div class="content">
          <h2>Login</h2>
          <form method="post" action="../controllers/UsuariosController.php">
            <div class="form-group">
              <input type="hidden" name="action" value="login">
              <input type="text" id="login-username" name="username" placeholder="username" required>
              <input type="password" id="login-password" name="password" placeholder="password" required>
            </div>
            <button id="goRight" class="off">Sign Up</button>
            <button id="login" type="submit">Login</button>
            <?php 
              if(isset($_GET['error'])){
                echo "<br><span class='error'>".$_GET['error']."</span><br>";
              }
            ?>
            <a href="../index.php">Regresar</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Inspiration from: http://ertekinn.com/loginsignup/-->
</body>
</html>
