Выберите город: <br />
<select id="selectCity" name="city">
<? foreach($cities as $citie) { ?>
    <option value="<?= $citie["id"]; ?>"><?= $citie["name"]; ?></option>
<? } ?>
</select>