<?php
// тип загружаемых файлов
$typeFilter = ['image/png', 'image/jpeg', 'image/jpg'];

//максимальный размер загружаемых файлов (Mb)
$sizeFilter = 5*1024*1024;

//максимальное количество загружаемых файлов
$amountFileFilter = 5;

//путь к папке upload
$uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

// как сортировать файлы при выводе на экран (SCANDIR_SORT_ASCENDING, SCANDIR_SORT_DESCENDING, SCANDIR_SORT_NONE)
$sort = SCANDIR_SORT_ASCENDING;