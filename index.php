<?php
    try {
        require_once "includes/dbh.inc.php";
        
        $query = " SELECT * FROM ver_categorias";
        
        $stmt = $pdo->prepare($query);
        
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $pdo = null;
        $stmt = null;
           
    } catch (PDOException $e) {
           die("Query failed: " . e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>  
    <header>
        <div class="title-container">
            <img src="">
            <p>Disenart</p>
        </div>
    </header>
    <script>
        setInterval(function(){
            location.reload();
        }, 5000);
    </script>
    <header>Menú</header>
        
    <div class="principal title-container">  
        <h2>Catálogo Categorías</h2>
        <?php
            if (empty($results)) {
                echo "<div>";
                echo "<p>No hubo resultados</p>";
                echo "</div>";
            } else {
                foreach($results as $row) {
                    echo "<a class='cat-img-display' href='" . htmlspecialchars($row["enlace_categoria"]) . "'>";
                    echo "<h4>" . htmlspecialchars($row["nombre_categoria"]) . "</h4>";
                    echo "<img src='". htmlspecialchars($row["foto_categoria"]) ."'>";
                    echo "</a>";
                }
            }
        ?>
    </div>
</body>
</html>