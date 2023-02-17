<?php

use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\TemplateProcessor;

require_once __DIR__ . '/vendor/autoload.php';

$tags = [
    "lastname" => "Bula",
    "firstname" => "mika",
    "age" => "51"
];

$source = __DIR__ . '/var/source.docx';
$pathToSave = __DIR__ . '/var/result.docx';

try {
    $templateProcessor = new TemplateProcessor($source);

    $templateProcessor->setMacroChars('{{', '}}');

    $templateProcessor->setValues($tags);

    $templateProcessor->saveAs($pathToSave);

} catch ( CopyFileException | CreateTemporaryFileException $e ) {
    echo "problème avec le fichier .docx" . $e->getMessage();
}



