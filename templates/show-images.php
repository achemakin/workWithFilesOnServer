<form id = "formDel" class="show-images" action="/" enctype="multipart/form-data" method="post">
     <?php
    if (!empty($filesUpload)){
    ?>
    
    <ul class="show-images__items">

    <?php
    foreach ($filesUpload as $key => $file): 
    ?>
        <li class="show-images__item">
            <img class="show-images__img" src="<?='/' . basename($uploadPath) . '/' . $file?>">
            <p class="show-images__name"><?=$file?></p>

            <p class="show-images__name"><?=date("d F Y", filemtime($uploadPath . $file))?></p>

            <p class="show-images__size"><?=getFileSize(filesize($uploadPath . $file))?></p>
            
            <input class="show-images__input" type="checkbox" name="file[]" value="<?=$file?>">
        </li>    
    <?php endforeach; ?>

    </ul>

    <?php 
    }

    if (!empty($filesUpload)) { ?>
        <button class="show-images__button" type="submit">Удалить файлы</button>
    <?php } else { ?> 
        <p class="show-images__info">Нет загруженных файлов</p>
    <?php } ?>   
</form>
