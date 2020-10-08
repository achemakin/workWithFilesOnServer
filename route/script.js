// обработчик для формы удаления файлов
formDel.onsubmit = async (e) => {
    e.preventDefault();
    
    let response = await fetch('/fileDel.php', {
      method: 'POST',
      body: new FormData(formDel)
    });

    let text = await response.text();

    console.log(text);
    
    let checkboxes = document.getElementsByClassName('show-images__input');
    
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxes[i].parentNode.remove();
            i--; 
        }
    }
    
    formDel.reset();

    if (text) {        
        formDel.innerHTML = text;
    }
};
