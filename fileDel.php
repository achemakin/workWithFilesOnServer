<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/variables.php';

if (!empty($_POST['file'])) {
    foreach ($_POST['file'] as $file) {
        $imagesList = array_diff(scandir($uploadPath), ['..', '.']);
        
        if (in_array($file, $imagesList)) {
            unlink($uploadPath . $file);
        }
    }

    $imagesList = array_diff(scandir($uploadPath), ['..', '.']);

    if (empty($imagesList)) {
        echo '<p class="show-images__info">Нет загруженных файлов</p>';
    }
}
