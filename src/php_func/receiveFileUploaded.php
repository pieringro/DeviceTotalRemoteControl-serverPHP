<?php

function doUploadNow($userFolder) {
    $completePath = FILES_FOLDER."".FILE_SEPARATOR_CHAR."".$userFolder;

    if (!file_exists($completePath)) {
        mkdir($completePath, 0777, true);
    }
    
    // verifico che il file sia stato caricato
    if (!is_uploaded_file($_FILES['file']['tmp_name']) ||
            $_FILES['file']['error'] > 0) {
        throw new Exception("Error uploading file. error=".$_FILES['file']['error']);
    }

    $filePath = $completePath."".FILE_SEPARATOR_CHAR."".$_FILES['file']['name'];
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        $filePathWeb = FILES_FOLDER_WEB."".FILE_SEPARATOR_CHAR."".$userFolder."".FILE_SEPARATOR_CHAR."".$_FILES['file']['name'];
        return $filePathWeb;
    }
    else{
        throw new Exception("Unable to upload file.");
    }
}


