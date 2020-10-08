// обработчик для формы добавить файлы
formLoad.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('/fileLoad.php', {
      method: 'POST',
      body: new FormData(formLoad)
    });

    let text = await response.text();

    formLoad.reset();

    if (text) {        
        alert(text);
    }
};
