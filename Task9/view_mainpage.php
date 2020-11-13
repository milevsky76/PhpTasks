<style>
    input:invalid {
        border-color: red;
    }
    img {
        display: block;
    }
</style>

<form id="form" action="send.php" method="post" autocomplete="on" enctype="multipart/form-data">
    <!-- Поле с датой -->
    <p>
        <label>
            Выберите дату начала подготовки: <br />
            <input id="date" type="date" name="date" min="<?= $dataMainPage["date"]["min"]; ?>" max="<?= $dataMainPage["date"]["max"]; ?>" value="<?= $dataMainPage["date"]["value"]; ?>" />
            <span id="UntilNY"></span>
        </label>
    </p>

    <!-- Select областей -->
    <p>
        <label>
            Выберите облать празднования нового года: <br />
            <select id="selectArea" name="area">
                <option value="0">Выбрать область</option>   
            <?php foreach($dataMainPage["areas"] as $area){ ?>
                <option value="<?= $area["id"]; ?>"><?= $area["name"]; ?></option>
            <?php } ?>
            </select>
        </label>
        <div id="inner"></div>
    </p>
    
    <!-- Поле для файлов -->
    <p>
        <label>
            Загрузите картинку с подарком которую хотите получить: <br />
            <input id="inputFile" name="file" type="file" accept=".png, .jpg, .jpeg" />
        </label>
    </p>
    
    <!-- Поля name -->
    <p>
        <label>
            Введите ваше имя: <br />
            <input id="inputName" type="text" name="name" pattern="[A-Za-zА-Яа-яЁё]+" />
        </label>
    </p>
    
    <!-- Поля email -->
    <p>
        <label>
            Введите ваш Email: <br />
            <input id="inputEmail" type="email" name="email" />
        </label>
    </p>
    <!-- Кнопка для отправки формы -->
    <input type="submit" value="Отправить" />
</form>

<!-- Поле для информации -->
<div id="message"></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="form_processing_сlient.js"></script>