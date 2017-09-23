<?php

define('FILENAME_NUMBER_SEPARATOR', "_");

function doUploadNow($userFolder) {
    $completeRealPath = FILES_FOLDER . "" . FILE_SEPARATOR_CHAR . "" . $userFolder;
    $completeWebPath = FILES_FOLDER_WEB . "" . FILE_SEPARATOR_CHAR . "" . $userFolder;
    if (!file_exists($completeRealPath)) {
        mkdir($completeRealPath, 0777, true);
    }

    // verifico che il file sia stato caricato
    if (!is_uploaded_file($_FILES['file']['tmp_name']) ||
            $_FILES['file']['error'] > 0) {
        throw new Exception("Error uploading file. error=" . $_FILES['file']['error']);
    }

    $fileRealName = $_FILES['file']['name'];
    $fileRealPath = $completeRealPath . "" . FILE_SEPARATOR_CHAR . "" . $fileRealName;

    //controllo che il file a quel path non esista, se esiste devo cambiare il nome
    $counter = 0;
    while (file_exists($fileRealPath)) {
        $fileRealPath = UpdateFilename($fileRealPath, $counter);
        $counter++;
    }
    
    //muovo il file nel percorso del server
    if (move_uploaded_file($_FILES['file']['tmp_name'], $fileRealPath)) {
        $fileWebPath = $completeWebPath . "" . FILE_SEPARATOR_CHAR . "" . $fileRealName;
        return $fileWebPath;
    } else {
        throw new Exception("Unable to upload file.");
    }
    
}

function UpdateFilename($filename, $counter = null) {
    $filenameExtension = "";
    
    //rimuovo l'estensione nel filename se presente
    $indexOfDot = strrpos($filename, '.');
    if ($indexOfDot !== false) {
        $filenameExtension = substr($filename, $indexOfDot);
        $filename = substr($filename, 0, $indexOfDot);
    }
    
    //rimuovo il contatore precedente se presente
    $indexOfNumberSeparator = strrpos($filename, FILENAME_NUMBER_SEPARATOR);
    if ($indexOfNumberSeparator !== false) {
        $filename = substr($filename, 0, $indexOfNumberSeparator);
    }
    
    if(isset($counter)){
        $filenameExtension = FILENAME_NUMBER_SEPARATOR . $counter . $filenameExtension;
    }
    
    $tmpFilename = $filename . "" . $filenameExtension;
    return $tmpFilename;
}

