<select name="tratamento" id="tratamento_id" class="form-control">
    <option value="">Selecione um tratamento</option>
    <?php foreach ($tratamentos as $tratamento): ?>
        <option value="<?= $tratamento->id ?>">
            <?= h($tratamento->tratamento) ?>
        </option>
    <?php endforeach; ?>
</select>
