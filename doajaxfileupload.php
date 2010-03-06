<?php
$error = "";
$msg = "";
$fileElementName = 'fileToUpload';
if (!empty($_FILES[$fileElementName]['error'])) {
    switch ($_FILES[$fileElementName]['error']) {

        case '1':
//				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
            $error = 'Rozmiar pliku przekracza maksymalny dozwolony';
            break;
        case '2':
//				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
            $error = 'Rozmiar pliku przekracza maksymalny dozwolony';
            break;
        case '3':
//				$error = 'The uploaded file was only partially uploaded';
            $eror = 'Plik załadowny tylko częściowo';
            break;
        case '4':
//				$error = 'No file was uploaded.';
            $error = "Brak pliku";
            break;

        case '6':
//				$error = 'Missing a temporary folder';
            $error = 'Brak katalogu tymczasowego';
            break;
        case '7':
//				$error = 'Failed to write file to disk';
            $error = "Błąd przy zapisywaniu na dysk";
            break;
        case '8':
//				$error = 'File upload stopped by extension';
            $error = 'Niedozwolony typ pliku';
            break;
        case '999':
        default:
//            $error = 'No error code avaiable';
            $error = "Nieokreślony bład";
    }
} elseif(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none') {
//    $error = 'No file was uploaded..';
    $error = "Brak pliku";
} else {
    $max_file_size = 512 * 1024;
    if (!eregi('image/', $_FILES[$fileElementName]['type'])) {
        $error = 'Plik nie jest obrazkiem';
    } elseif(@filesize($_FILES[$fileElementName]['tmp_name']) > (512 * 1024)) {
        $error = 'Plik ma rozmiar większy niż 500KB';
    } else {
        $path = 'foto/' . $_FILES[$fileElementName]['name'];
        if (file_exists($path)) {
            $error = "Plik o takiej nazwie już istnieje";
        } else {
            move_uploaded_file($_FILES[$fileElementName]["tmp_name"],
                    $path);
            $msg = $path;
        }
    }
}		
@unlink($_FILES[$fileElementName]);
echo	$error . "#" . $msg . "}";
?>
