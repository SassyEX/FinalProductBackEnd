<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients List</title>
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    // Function to fetch and display client data in a table
    function read() {
        $database = "practicabd";
        $table = "users";
        
        include_once("connect.php"); // Include database connection script only once
        $obj_cnx = new connection($database); 

        // Prepare SQL query to fetch clients ordered by ID
        $sql = "SELECT * FROM $table ORDER BY id ASC"; 

        // Prepare and execute SQL query
        $result = $obj_cnx->cn->prepare($sql);
        $result->execute();

        // Start HTML output
        echo '<br>';
        echo '<div class="container">';
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-hover">';
        echo '<caption class="table-dark">Clients</caption>';
        echo '<thead class="table-dark">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Usuario</th>';
        echo '<th>level</th>';
        echo '<th>Profile Picture</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Fetch all rows as objects
        $usuarios = $result->fetchAll(PDO::FETCH_OBJ);

        // Check if there are rows returned
        if ($result->rowCount() > 0) {
            // Output each row as table rows
            foreach ($usuarios as $row) {
                echo '<tr>';
                echo '<td>'.$row->id.'</td>';
                echo '<td>'.$row->user.'</td>';
                echo '<td>'.$row->level.'</td>';
                echo '<td><img src="./public/images/' .$row->image. '" alt="'.$row->user.'" width="50"></td>';
                echo '</tr>';
            }
        } else {
            // No data found message
            echo '<tr><td colspan="7">No hay datos.</td></tr>';
        }

        // End table body and table
        echo '</tbody>';
        echo '<tfoot class="table-dark">';
        echo '<tr>';
        echo '<td colspan="7" class="text-center">';
        echo '&copy; Sistemas Web ' . date("Y");
        echo '</td>';
        echo '</tr>';
        echo '</tfoot>';
        echo '</table>';
        echo '</div>';
        echo '</div>';

        // Close database connection and cleanup
        $result->closeCursor();
        $result = null;
        $cn = null;
    }
    ?>

    <!-- Bootstrap JS (optional, for responsive tables) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Modal Script -->
    
</body>
</html>
