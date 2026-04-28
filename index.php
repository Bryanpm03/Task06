<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page!</h1>
    <p>This is the main page of our website.</p>
    <p>Go to the <a href="about.php">About Page</a>.</p>

    <?php
    // Incluimos la clase para demostrar su uso
    include 'Person.php';

    // Creamos un objeto de la clase Person y mostramos un mensaje
    $person = new Person('Eva');
    echo '<p>Hello, ' . $person->getName() . '!</p>';
    ?>
</body>
</html>

