<!DOCTYPE html>
<html lang="en">

<head>
    <title>Re-Read ebooks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="icon" href="../img/icon.png">

</head>

<body>

    <div class="logo">
        <h1>Re-Read</h1>
    </div>

    <div class="header">
        <h1>Re-Read</h1>
        <p>En Re-Read podrás encontrar libros de segunda mano en perfecto estado. También vender los tuyos. Porque siempre hay libros leídos y libros por leer. Por eso Re-compramos y Re-vendemos para que nunca te quedes sin ninguno de los dos.</p>
    </div>

    <div class="row">
        <div class="column middle">
            <div class="topnav">
                <a href="index.php">Re-Read</a>
                <a href="libros.php">Libros</a>
                <a href="ebooks.php" class="active">eBooks</a>
            </div>
            <div class="textpage">
                <h3>Toda la actualidad en eBook</h3>
                <!-- ACTIVIDAD 5-->

                <h1>HOLA</h1>

                <!-- ACTIVIDAD 4 -->
                <?php
                    include '../services/connection.php';

                    $query="select * from books";
                    $result = mysqli_query($conn, $query);

                    if (!empty($result) && mysqli_num_rows($result) > 0) {
                    // datos de salida de cada fila (fila = row)
                    $i=2;
                        while ($row = mysqli_fetch_array($result)) {
                            //echo "<p>".$row['img']."</p>";
                            //echo "<p>".$row['Description']."</p>";
                            $i++;
                            if ($i % 3 == 0) {
                                echo "<div class='gallery clear'>
                                <img src='../img/".$row['img']."'>
                                <div class='desc'>".$row['Description']."</div>
                              </div>";
                            }else { 
                                echo "<div class='gallery'>
                                    <img src='../img/".$row['img']."'>
                                    <div class='desc'>".$row['Description']."</div>
                                  </div>";
                            }
                        }
                    }
                        

                ?>

            </div>
        </div>
        <div class="column side">
            <h2>Top ventas</h2>
            <?php
                // 1. Conexión con la base de datos
                include '../services/connection.php';

                // 2. Selección y muestra de datos de la base de datos
                $result = mysqli_query($conn, "SELECT Books.Title FROM Books WHERE eBook != '0'");

                if (!empty($result) && mysqli_num_rows($result) > 0) {
                // datos de salida de cada fila (fila = row)
                    while ($row = mysqli_fetch_array($result)) {
                    echo "<p>".$row['Title']."</p>";
                    }
                } else {
                    echo "0 resultados";
                }
            ?>

        </div>
    </div>

</body>

</html>