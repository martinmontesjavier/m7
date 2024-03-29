<?php
abstract class AbstractFileSystemElement
{
    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class File extends AbstractFileSystemElement
{
    public function __construct($name)
    {
        parent::setName($name);
    }
}

class Folder extends AbstractFileSystemElement
{
    private $files = [];

    public function __construct($name)
    {
        parent::setName($name);
    }

    public function add(AbstractFileSystemElement $file)
    {
        $this->files[] = $file;
    }

    public function getContent()
    {
        return count($this->files) > 0;
    }

    public function getFiles()
    {
        echo $this->getName() . "<br/>";
        if ($this->getContent()) {
            echo "<ul><li>Contenido de la carpeta es:</li><ul>";
            foreach ($this->files as $file) {
                if ($file instanceof Link) {
                    echo $file->listAttributes();
                } elseif ($file instanceof Folder) {
                    $file->getFiles();
                } else {
                    echo "<li>" . $file->getName() . "</li>";
                }
            }
            echo "</ul></ul>";
        }
    }
}

class Link extends AbstractFileSystemElement
{
    private $isSoftLink;
    private $Linkto;

    public function __construct($name, $isSoftLink, $Linkto)
    {
        parent::setName($name);
        $this->isSoftLink = $isSoftLink;
        $this->Linkto = $Linkto;
    }

    public function getisSoftLink()
    {
        return $this->isSoftLink ? "SoftLink" : "HardLink";
    }

    public function Path()
    {
        if (is_object($this->Linkto)) {
            return $this->Linkto->getName();
        } else {
            return "No es un enlace";
        }
    }

    public function getLinkto()
    {
        return $this->Path();
    }

    public function allAttributes()
    {
        return [
            'Nombre' => $this->getName(),
            'Tipo' => $this->getisSoftLink(),
            'Linkto' => $this->getLinkto()
        ];
    }

    public function listAttributes()
    {
        $attributesLink = $this->allAttributes();
        echo "Información del enlace:";
        echo "<ul>";
        foreach ($attributesLink as $key => $value) {
            echo "<li>$key: $value</li>";
        }
        echo "</ul>";
    }
}

$file = new File("Archivo1.jpg");
$file2 = new File("Archivo2.jpg");
$folder = new Folder("Carpeta1");
$folder2 = new Folder("Carpeta2");
$folder3 = new Folder("Carpeta3");
$link = new Link("Enlace1", 1, $folder);
$link2 = new Link("Enlace2", 0, $file);
$link3 = new Link("Enlace3", 1, "error");

$folder->add(new File("imagen.jpg"));
$folder->add(new File("imagen2.jpg"));
$folder->add(new Link("Enlace4", 1, $folder));
$folder->add(new Link("Enlace5", 0, $file));
$folder->add(new Folder("Carpeta Global"));
$folder2->add($folder);
$folder2->add(new Link("Enlace Malo", 1, "error"));
$folder3->add($folder2);


echo $folder3->getFiles();