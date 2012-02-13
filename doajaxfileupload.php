<?php
session_start();
if($_SESSION['name']!='admin') {
    exit;
}

include_once 'lib/parameters.php';
include_once 'lib/common.php';
$is_image=(get_int_parameter('image')==1);
$error = "";
$msg = "";
$fileElementName = 'fileToUpload';
if($is_image) {
    $fileElementName = 'imageToUpload';
}
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
    $max_file_size = 2 * 1024 * 1024;
    if ($is_image && !eregi('image/', $_FILES[$fileElementName]['type'])) {
        $error = 'Plik nie jest obrazkiem';
    } elseif(@filesize($_FILES[$fileElementName]['tmp_name']) > ($max_file_size)) {
        $error = 'Plik ma rozmiar większy niż '.($max_file_size/1024/1024).'MB';
    } else {
        $path = 'foto/' . $_FILES[$fileElementName]['name'];
        if (file_exists($path)) {
            $path = 'foto/' . uniqid().$_FILES[$fileElementName]['name'];
        }
        if($is_image) {
            $new_size = calculate_image_size(640, $_FILES[$fileElementName]['tmp_name']);
            $image_type=detect_image_type($_FILES[$fileElementName]['name']);
            if($image_type!='jpg'){
                $path=$path.'.jpg';
            }
            cropImage($new_size[0],$new_size[1], $_FILES[$fileElementName]['tmp_name'], $image_type, $path);

        }else {
            move_uploaded_file($_FILES[$fileElementName]["tmp_name"],
                    $path);
        }
        $msg = $path;
    }
}		
@unlink($_FILES[$fileElementName]);
echo	$error . "#" . $msg . "}";


function calculate_image_size($max_size, $image) {
    $size = getimagesize($image);
    $w = $size[0];
    $h = $size[1];
    if(max($w,$h)<=$max_size) {
        return $size;
    }
    if($h>$w) {
        $ratio = $h/$max_size;
        return array($w/$ratio , $max_size );

    }else {
        $ratio = $w/$max_size;
        return array($max_size, $h/$ratio );
    }
    return $size;
}

function detect_image_type($filename) {
    $filename = basename($filename);

    // break file into parts seperated by .
    $filename = explode('.', $filename);

    // take the last part of the file to get the file extension
    $extension = $filename[count($filename)-1];
    $extension = lower_pl($extension);

    switch ($extension) {
        case 'jpg':
        case 'jpeg':
            return 'jpg';
        default:
            return $extension;
    }

}

function lower_pl($str) {
    return strtr($str, "ĄĆĘŁŃÓŚŹŻABCDEFGHIJKLMNOPRSTUWYZQXV", "ąćęłńóśźżabcdefghijklmnoprstuwyzqxv");
}
?>
