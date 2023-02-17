<?php

use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\TemplateProcessor;

require_once __DIR__ . '/vendor/autoload.php';

$tags = [
    "lastname" => "Bula",
    "firstname" => "mika",
    "name" => "Mickaël Bula",
    "age" => "51"
];

$source = __DIR__ . '/var/source.docx';
$pathToSave = __DIR__ . '/var/result.docx';

try {
    $templateProcessor = new TemplateProcessor($source);

    // même en ajoutant les méthodes manquantes dans la classe TemplateProcessor, je n'obtiens l'effet attendu : les doubles accolades ne sont pas reconnues comme tags.
    $templateProcessor->setMacroChars('{{', '}}');

    // affectation des variables à l'aide d'un tableau
    $templateProcessor->setValues($tags);

    // ajout d'une variable supplémentaire
    $templateProcessor->setValue('date', date("d-m-Y"));

    $templateProcessor->saveAs($pathToSave);

    echo "le fichier a été copié";

} catch ( CopyFileException | CreateTemporaryFileException $e ) {
    echo "problème avec le fichier .docx" . $e->getMessage();
}



