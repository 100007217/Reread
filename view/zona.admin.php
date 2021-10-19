<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Zona Admin</title>
    <link rel="shortcut icon" href="../img/book-dead-solid.svg" type="image/x-icon">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include '../services/connection.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!isset($_SESSION['email'])) {
        header('Location: login.html');
    }
    ?>
    <ul class="padding-lat">
        <li><a>Hola <?php echo $_SESSION['username'];?></a></li>
        <li class="right">
            <a href="../processes/logout.proc.php">Logout</a>
        </li>
    </ul>
    <div class="row padding-top padding-lat">
        <div class="column-2">
            <form action="" method="post">
                <input type="submit" value="añadir libro">
            </form>
        </div>
        <!--ACTIVIDAD 2-->
        <div class="column-2" id="filter">
            <form action="zona.admin.php" method="post">
                <input type="text" placeholder="buscar por título..." name="titulo">
                <input type="submit" value="filtrar" name="filtro">
            </form>
        </div>
    </div>
    
    <div class="row padding-top-less padding-lat">
        <div class="column-1">
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Autor</th>
                </tr>
                <!-- Recoger libros de la base de datos -->
                <?php
                //ACTIVIDAD 1 y 2
                if (isset($_POST['titulo'])) {
                    $query = "SELECT books.title,books.description,authors.name from books 
                    inner join BooksAuthors on booksauthors.bookid=books.id 
                    inner join authors on booksauthors.authorid=authors.id where books.title like '%". $_POST['titulo']."%'";
                }else {
                    $query = "SELECT books.title,books.description,authors.name from books 
                    inner join BooksAuthors on booksauthors.bookid=books.id 
                    inner join authors on booksauthors.authorid=authors.id";
                }
                
                $result = mysqli_query($conn, $query);

                        if (!empty($result) && mysqli_num_rows($result) > 0) {
                        // datos de salida de cada fila (fila = row)
                            while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>".$row['title']."</td>";
                            echo "<td>".$row['description']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "</tr>";
                            }
                        } else {
                            echo "0 resultados";
                        }
                ?>
 
            </table>
        </div>
    </div>
</body>

</html>
