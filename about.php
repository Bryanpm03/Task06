<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Page</title>
</head>
<body>
    <h1>About Us</h1>
    <p>This is the About page where we talk about ourselves.</p>
    <p>Go back to the <a href="index.php">Home Page</a>.</p>

    <?php
    // Incluimos la clase para demostrar su uso
    include 'Person.php';

    // Creamos otro objeto de la clase Person y mostramos un mensaje
    $person = new Person('Carlos');
    echo '<p>Meet ' . $person->getName() . ', another member of our 
team!</p>';
    ?>
</body>
</html>

