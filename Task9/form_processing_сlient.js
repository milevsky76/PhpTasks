$( document ).ready(function() {
    
    $("form").submit(function(evenr) {
        //Убираем действие по умолчанию
        event.preventDefault();
        //Проверка на выбор даты
        if(!$("#date").val()){
            $("#UntilNY").text();
            console.log($("#date").val());
            alert("Выберите дату начала подготовки");
            return;
        }
        //Проверка на выбор области
        if($("#selectArea").val() == 0){
            alert("Выберите облать празднования нового года");
            return;
        }
        //Проверка на загружаемый файл
        if(!$("#inputFile").val()){
            alert("Загрузите картинку с подарком которую хотите получить");
            return;
        } else{
            let file = document.getElementById("inputFile").files[0];
            //Валидация на форматы
            if(!validFileType(file)){
                alert("Загрузите картинку, другого формата");
                $("#inputFile").val(null);
                return;
            }      
        }
        //Проверка на ввод имени
        if(!$("#inputName").val()){
            alert("Введите ваше имя");
            return;
        }
        //Проверка на ввод email
        if(!$("#inputEmail").val()){
            alert("Введите ваш Email");
            return;
        }
        //Отправляем данные
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: new FormData(this),
            contentType: false,
            /*cache: false,*/
            processData: false,
            success: function(date){
                //alert("Данные отправлены");
                $("form").html('');
                $("#message").html(date);
            },
        });

    });
    //Событие change на выбор даты
    $("#date").change( function(){
        //Проверка на выбор даты
        if(!$("#date").val()){
            $("#UntilNY").text();
            alert("Выберите дату начала подготовки");
            return;
        } else{
            $.ajax({
                url: 'send.php?type=uny',
                type: 'post',
                data: $(this).serialize(),
                success: function(date){
                    $("#UntilNY").html(date);
                },
            });
        }
        return false;
    });
    //Событие change на выбор области
    $("#selectArea").change(function(){        
        $.ajax({
            url: 'send.php?type=add',
            type: 'post',
            data: $(this).serialize(),
            success: function(date){
                $("#inner").html(date);
            },
        });
        return false;
    });
    //Валидация типа файла на форматы
    function validFileType(file) {
        let fileTypes = [
            'image/jpeg',
            'image/pjpeg',
            'image/png'
        ];
        
        for(let i = 0; i < fileTypes.length; i++) {
            if(file.type === fileTypes[i]) {
                return true;
            }
        }
        return false;
    }
    
});