<?php
    if ( $_SERVER["REQUEST_METHOD"] == "POST"){

        try {
            require_once "includes/dbh.inc.php";
        
            $query = " SELECT * FROM ver_categorias";
        
            $stmt = $pdo->prepare($query);
        
            $stmt->execute();
        
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            $pdo = null;
            $stmt = null;
            
        } catch (PDOExeption $e) {
            die("Query failed: " . e->getMessage());
        }
    } else {
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <h2>Catálogo Categorías</h2>
        <?php
            if (empty($results)) {
                echo "<div>";
                echo "<p>No hubo resultados</p>";
                echo "</div>";
            } else {
                foreach($results as $row){
                    echo "<div>";
                    echo "<h4>" . htmlspecialchars($row["nombre_categoria"]) . "</h4>";
                    echo "<h4>" . htmlspecialchars($row["descripcion_categoria"]) . "</h4>";
                    echo "<h4>" . htmlspecialchars($row["foto_categoria"]) . "</h4>";
                    echo "</div>";
                }
            }
        ?>
    </section>    
</body>
</html>