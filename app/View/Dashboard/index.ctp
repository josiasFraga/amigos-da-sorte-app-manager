<style type="text/css">
	table tbody tr td { border-color: #ccc !important; }
	@media print {
		a[href]:after {
			content: none !important;
		}
	}

</style>
<?php echo $this->Session->flash(); ?>

<div class="row">
	<div class="col-md-9">
		
		<div class="page-head">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Sistema de Gestão Amigos da Sorte
					<small>página inicial</small>
				</h1>
			</div>
		</div>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<a href="<?php echo $this->Html->url(array('controller' => 'Dashboard', 'action' => 'index')) ?>">Dashboard</a>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span class="active">Dashboard</span>
			</li>
		</ul>

	</div>
	<div class="col-md-3">
			
		<select class="select2 form-control" name="dashboard_empresas_filtro" multiple="multiple" placeholder="empresa(s)" autocomplete="off">
			<?php foreach($empresas as $empresa): ?>
				<option value="<?= $empresa['cnpj'] ?>"><?= $empresa['nome'].' - '.$empresa['cnpj'] ?></option>
			<?php endforeach; ?>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-green-sharp">
						<span data-value="0" id="count_cad_users">0</span>
						<small class="font-green-sharp"></small>
					</h3>
					<small>Usuários Cadastrados</small>
				</div>
				<div class="icon">
					<i class="icon-users"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-red-haze">
						<span data-value="0" id="count_cad_nfces">0</span>
					</h3>
					<small>NFC'e Cadastradas</small>
				</div>
				<div class="icon">
					<i class="icon-doc"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-blue-sharp">
						<span data-value="0" id="count_cad_luck_numbers">0</span>
					</h3>
					<small>Números da sorte gerados</small>
				</div>
				<div class="icon">
					<i class="icon-random"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-purple-soft">
						<span data-value="0" id="count_total_value">0</span>
					</h3>
					<small>Total em compras</small>
				</div>
				<div class="icon">
					<i class="icon-money"></i>
				</div>
			</div>
		</div>
	</div>
</div>


<!--<div class="row">

	<div class="col-lg-12 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<span class="caption-subject bold uppercase font-dark">GADO INVERNAR - VENCIMENTOS DE HOJE E ATRASADOS</span>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-responsive">
					<table class="table table-bordered table-condensed table-striped">
						<thead>
							<tr>
								<th width="15%">Romaneio Nº</th>
								<th width="15%">Emissão em</th>
								<th width="20%">Comprador</th>
								<th width="20%">Vendedor</th>
								<th width="15%">Vencimento original</th>
								<th width="15%">Valor</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($romaneios_invernar_vencimentos as $key => $value): ?>
							<tr style="border-color: #000 !important" class="<?php echo $value['RomaneioVencimento']['_atrasado'] ? 'danger' : '' ?>">
								<td>
									<a href="<?php echo $this->Html->url(['controller' => 'RomaneioInvernar', 'action' => 'alterar', $value['Romaneio']['id']]) ?>" target="_BLANK"><?php echo $value['Romaneio']['numero'] ?></a>		
								</td>
								<td><?php echo date('d/m/Y', strtotime($value['Romaneio']['data_emissao'])) ?></td>
								<td><?php echo $value['Pessoa']['nome_fantasia'] ?></td>
								<td><?php echo $value['PessoaVendedor']['nome_fantasia'] ?></td>
								<td><?php echo date('d/m/Y', strtotime($value['RomaneioVencimento']['vencimento_em'])) ?></td>
								<td>R$ <?php echo number_format($value['RomaneioVencimento']['valor'], 2, ',', '.') ?></td>

							</tr>
						<?php endforeach ?>

						<?php if (!$romaneios_invernar_vencimentos): ?>
							<tr>
								<td colspan="6">Não há vencimentos de Invernar para hoje.</td>
							</tr>
						<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>-->
<?php
$this->Html->css('/metronic/assets/global/plugins/select2/css/select2.min', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/global/plugins/select2/css/select2-bootstrap.min', array('block' => 'cssPage'));
$this->Html->script('/metronic/assets/global/plugins/select2/js/select2.full.min', array('block' => 'scriptBottom'));
/*-- BEGIN PAGE LEVEL SCRYPTS --*/
$this->Html->script('/js/Dashboard/index.js?v=1.0', array('block' => 'scriptBottom'));
/*-- END PAGE LEVEL SCRYPTS --*/
?>