<?php
/**
 * Clase Person.
 *
 * Esta clase representa a una persona con un nombre.
 */
class Person
{
    /**
     * @var string El nombre de la persona.
     */
    private $name;

    /**
     * Constructor de la clase.
     *
     * @param string $name El nombre de la persona.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Obtiene el nombre de la persona.
     *
     * @return string El nombre de la persona.
     */
    public function getName()
    {
        return $this->name;
    }
}
?>

