<?php
header("Content-disposition: attachment; filename=".$_GET['archivo']);
header("Content-type: MIME");
readfile($_SERVER["DOCUMENT_ROOT"]."/../data".$_GET['ruta']."/".$_GET['archivo']);
?>

