<select name="remedios_id" id="remedios_id" class="form-control">
    <option value="">Selecione um remédio</option>
    <?php foreach ($remedios as $remedio): ?>
        <option value="<?= $remedio->id ?>">
            <?= h($remedio->remedios) ?>
        </option>
    <?php endforeach; ?>
</select>
