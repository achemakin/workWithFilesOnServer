<form id="formLoad" class="load-images" action="/" enctype="multipart/form-data" method="post">
    <fieldset class="load-images__fieldset">
        <legend class="load-images__legend">Выберите изображение для загрузки на серевер</legend>
            
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="<?=$sizeFilter?>"/> -->
        
        <input 
            class="load-images__input-file"
            type="file" 
            accept="<?php 
                foreach ($typeFilter as $type) {
                    echo $type . ', ';
                } ?>" 
            name="images[]" 
            multiple 
            required
        />
        
        <button class="load-images__submit" type="submit">Загрузить</button>

        <div class="load-images__info">
            <p class="load-images__text">* размер файла не должен превышать <?= getFileSize($sizeFilter) ?></p>

            <p class="load-images__text">* количество файлов не более <?= $amountFileFilter ?></p>
            
            <p class="load-images__text">* тип поддерживаемых файлов jpg, jpeg, png</p>
        </div>
    </fieldset>
</form>
