<?php

/*
* Ejemplo basado en la documentación oficial
* de PHP: http://php.net/manual/es/language.oop5.interfaces.php
*/

// Declarar interfaz
interface iTemplate {
  public function setVariable($name, $var);  
  public function getHtml($template);
  public function getTextHtml($template);  
}

// Implementar interfaz
class Template implements iTemplate {
    private $vars = [];

    public function setVariable($name, $var) {
        $this->vars[$name] = $var;
    }

    public function getHtml($template) {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }  
    
    public function getTextHtml($template) {
        foreach ($this->vars as $key => $value) {
            $template = str_replace($key, $value, $template);
        }
        return $template;
    }
    
}

$myVar = new Template;
$myVar->setVariable('nombre', 'Comunidad');
$myVar->setVariable('apellido', 'Platzi');

// El output es <h1>Comunidad Platzi</h1>
echo $myVar->getHtml('<h1>{nombre} {apellido}<h1> <br>');

$myVar->setVariable('parrafo', 'Aprendiendo interfaces');
echo $myVar->getTextHtml('<p> parrafo </p>');