<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/variables.php'; 
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/file_proc.php';

// загрузка файлов на сервер

//поверка на количество одновременно загружаемых файлов
if (count($_FILES['images']['tmp_name']) > 0 && count($_FILES['images']['tmp_name']) <= $amountFileFilter) {
    $filesNameErrorSize = [];
    $filesNameErrorType = [];
    $fileSuccess = [];
    
    foreach ($_FILES['images']['name'] as $key => $name) {
        $fileSize = $_FILES['images']['size'][$key];
        
        //поверка на размер загружаемых файлов
        if ($fileSize > $sizeFilter) {
            $filesNameErrorSize[] = $name;
        } elseif (in_array(mime_content_type($_FILES['images']['tmp_name'][$key]), $typeFilter)) {
            move_uploaded_file($_FILES['images']['tmp_name'][$key], $uploadPath . basename($name));
            $fileSuccess[] = $name;
        } else {
            $filesNameErrorType[] = $name;
        }
    }

    if (!empty($filesNameErrorSize) && empty($filesNameErrorType)) {
        echo 'Файлы: ' . implode(', ', $filesNameErrorSize) . ' не были загружены, так как их размер превысыл ' . getFileSize($sizeFilter) . '.';
    } elseif (empty($filesNameErrorSize) && !empty($filesNameErrorType)) {
        echo 'Файлы: ' . implode(', ', $filesNameErrorType) . ' не были загружены, так как не соответсвует тип данных.';
    } elseif (!empty($filesNameErrorSize) && !empty($filesNameErrorType)) {
        echo 'Файлы: ' . implode(', ', $filesNameErrorSize) . ' не были загружены, так как их размер превысыл ' . getFileSize($sizeFilter) . '.' . ' Файлы: ' . implode(', ', $filesNameErrorType) . ' не были загружены, так как не соответсвует тип данных.';
    } else {
        echo 'Файлы: ' . implode(', ', $fileSuccess) . ' загружены успешно!';
    }
} else {
    echo 'Файлы не загружены. Количество выбранных файлов превысило лимит ' . $amountFileFilter;
}
