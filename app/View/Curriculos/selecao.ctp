<?php if (count($dados_selecao) > 0): ?>
    <input type="hidden" class="form-control required numeric" name="data[CurriculoSelecao][id]" value='<?= $dados_selecao['CurriculoSelecao']['id'] ?>' />
<?php endif; ?>
<input type="hidden" class="form-control required numeric" name="data[CurriculoSelecao][curriculo_id]" value='<?= $id ?>' />
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Status do Candidato:</label>
            <div class="">
                <select class="form-control required" name="data[CurriculoSelecao][status_id]">
                    <option value="">Selecione ...</option>
                    <?php foreach ($status_selecoes as $key => $tipo) { ?>
                        <option value="<?=$key?>" <?= count($dados_selecao) > 0 && $key == $dados_selecao['CurriculoSelecao']['status_id'] ? "selected=''" : ''; ?>><?=$tipo?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Início da Seleção:</label>
            <div class="">
                <input type="date" class="form-control required" name="data[CurriculoSelecao][inicio]" value="<?= count($dados_selecao) > 0  ? date('Y-m-d',strtotime($dados_selecao['CurriculoSelecao']['inicio'])) : ''; ?>" />
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Final da Seleção:</label>
            <div class="">
                <input type="date" class="form-control required" name="data[CurriculoSelecao][fim]" min='<?php echo date('Y-m-d') ?>' value="<?= count($dados_selecao) > 0  ? date('Y-m-d',strtotime($dados_selecao['CurriculoSelecao']['fim'])) : ''; ?>"/>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <p>Se não houver alteração no status do candidato (troca para contratado ou dispensado), ele será automaticamente setado para dispensado um dia após o término da seleção.</p>
        </div>
    </div>
</div>
