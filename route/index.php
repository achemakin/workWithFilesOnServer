<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>

<a href="/" class="link-back">Вернуться к загрузке файлов</a>

<?php
showImages($uploadPath, $sort);
?>

<script src="/route/script.js"></script>

<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>
