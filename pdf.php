<?php
if(!isset($_GET['file']))die('LOGGED! no file specified');
 
$file_path=$_SERVER['DOCUMENT_ROOT'].'/'.strip_tags(htmlentities($_GET['file'])).'.pdf';
 
if ($fp = fopen ($file_path, "r")) {
    $file_info = pathinfo_utf($file_path);
    $file_name = $file_info["basename"];
    $file_size = filesize($file_path);
    $file_extension = strtolower($file_info["extension"]);
 
    if($file_extension!='pdf') {
        die('LOGGED! bad extension');
    }

    ob_start();
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="'.$file_name.'"');
    header("Content-length: $file_size");
    ob_end_flush();
 
    while(!feof($fp)) {
        $file_buffer = fread($fp, 2048);
        echo $file_buffer;
    }

    fclose($fp);
    exit;
    exit();
} else {
    die('LOGGED! bad file '.$file_path);
}

  function pathinfo_utf($path)
  {
    if (strpos($path, '/') !== false) $basename = end(explode('/', $path));
    elseif (strpos($path, '\\') !== false) $basename = end(explode('\\', $path));
    else return false;
    if (empty($basename)) return false;

    $dirname = substr($path, 0, strlen($path) - strlen($basename) - 1);

    if (strpos($basename, '.') !== false)
    {
      $extension = end(explode('.', $path));
      $filename = substr($basename, 0, strlen($basename) - strlen($extension) - 1);
    }
    else
    {
      $extension = '';
      $filename = $basename;
    }

    return array
    (
      'dirname' => $dirname,
      'basename' => $basename,
      'extension' => $extension,
      'filename' => $filename
    );
  } 
?>
