<?php
/**
 * Функция возвращает размер файла в соответствии с заданными условиями:
 *  - если изображение весит менее 10 килобайт, выводить значение в байтах;
 *  - если изображение весит более 10 килобайт и менее 1 мегабайта, выводить значение в килобайтах;
 *  - если изображение весит более 1 мегабайта и менее 5 мегабайт, выводить значение в мегабайтах;
 * @param int $size размер файла в байтах
 * @return string $size . ' b'
 * @return string $size . ' Mb'
 * @return string $size . ' Kb'
 */
function getFileSize (int $size) : string 
{
    if ($size < 10240) {
        return $size . ' b';
    } elseif ($size > 1048576) {
        return round($size / 1048576, 1) . ' Mb';
    } else {
        return round($size / 1024) . ' Kb';
    }
}

/**
 * Функция выводит изображение картинки, инормации о файле и реализует возможность удаления файлов
 * @param string $uploadPath путь к папке, где хранятся загруженные картинки
 * @param int $sort вид сортировки 
 */
function showImages (string $uploadPath, int $sort)
{
    $filesUpload = array_diff(scandir($uploadPath, $sort), ['..', '.']);
       
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/show-images.php';    
}
