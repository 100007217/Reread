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

                <div class="buscabooks">
                    <form action="ebooks.php" method="post">
                        Autor
                        <br>
                        <input type="text" placeholder="Introduce el autor" name="autor">
                        <br>
                        <label for="pais">Selecciona un pais</label>
                        <br>
                        <input list="paises" name="pais">
                        <datalist id="paises">
                        <option value="Cualquiera"></option>
                        
                        <?php
                        include '../services/connection.php';
                        $query="select distinct Country from Authors order by country asc";
                        $result = mysqli_query($conn, $query);
                        
                        foreach ($result as $row) {
                            echo "<p>".$row['Country']."</p>";
                            echo "<option value =".$row['Country']."></option>";
                        };
                        ?>
                        </datalist>
                        <br>
                        <input type="submit" value="Buscar" name="filtro">
                    </form>
                </div>
                <!-- ACTIVIDAD 4 -->
                <?php
                    include '../services/connection.php';
                    if (isset($_POST['pais']) && $_POST['pais']!="" && !isset($_POST['autor'])) {
                        $pais=$_POST['pais'];
                        if ($pais==='Cualquiera') {
                            $pais="";
                        }
                        $query="select books.img,books.Description from books 
                        inner join BooksAuthors on booksauthors.bookid=books.Id 
                        inner join authors on BooksAuthors.AuthorId=authors.id 
                        where authors.country like '%$pais%';";
                    } elseif (isset($_POST['autor']) && !isset($_POST['pais'])){
                        $autor=$_POST['autor'];
                        $query="select books.img,books.Description from books 
                        inner join BooksAuthors on booksauthors.bookid=books.Id 
                        inner join authors on BooksAuthors.AuthorId=authors.id 
                        where authors.name like '%$autor%';";
                    } elseif (isset($_POST['autor']) && isset($_POST['pais'])){
                        $pais=$_POST['pais'];
                        if ($pais==='Cualquiera') {
                            $pais="";
                        }
                        $autor=$_POST['autor'];
                        $query="select books.img,books.Description from books 
                        inner join BooksAuthors on booksauthors.bookid=books.Id 
                        inner join authors on BooksAuthors.AuthorId=authors.id 
                        where authors.name like '%$autor%' and authors.Country like '%$pais%';";
                    }else{
                        $query="select * from books";
                    }
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