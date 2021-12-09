<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE HEAD -->
<div class="page-head">
<!-- BEGIN PAGE TITLE -->
<div class="page-title">
	<h1>NFCe's <small>administrar Cupons</small></h1>
</div>
<!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
<li>
	<a href="<?php echo $this->Html->url(array('controller' => 'Dashboard', 'action' => 'index')) ?>">Início</a>
	<i class="fa fa-circle"></i>
</li>
<li>
	<a href="#">NFCe's</a>
</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
<div class="col-md-12">
	<!-- BEGIN SAMPLE TABLE PORTLET-->
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="font-dark"></i>
				<span class="caption-subject font-dark bold uppercase">NFCe's</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="">
				<table class="table table-striped table-bordered table-hover table-checkable" id="table-nfces">
					<thead>
						<tr>
							<th class="table-checkbox" width="20px">
								<input type="checkbox" class="group-checkable" data-set="#table-nfces .checkboxes"/>
							</th>
							<th>Cadastrado em</th>
							<th>Usuário</th>
							<th>Campanha</th>
							<th>Número</th>
							<th>Valor</th>
							<th width="150px">Ações</th>
						</tr>
						<tr role="row" class="filter">
							<td></td>
							<td>
								<input type="date" class="form-control form-filter input-sm" name="cadastro_de" value="" style="margin-bottom:4px">
								<input type="date" class="form-control form-filter input-sm" name="cadastro_ate" value="">
							</td>
							<td><input type="text" class="form-control form-filter input-sm" name="usuario"></td>
							<td><input type="text" class="form-control form-filter input-sm" name="campanha"></td>
							<td><input type="text" class="form-control form-filter input-sm" name="numero"></td>
							<td><input type="text" class="form-control form-filter input-sm currency" name="valor"></td>
							<td>
								<div class="margin-bottom-5">
									<button class="btn btn-sm yellow filter-submit margin-bottom btn-block">
                                        <i class="fa fa-search"></i> Procurar
                                    </button>
								</div>
								<button class="btn btn-sm red filter-cancel btn-block">
                                    <i class="fa fa-times"></i> Limpar
                                </button>
							</td>
						</tr>
					</thead>
					<tbody><?php ##JAVASCRIPT TRAZ AS INFORMACOES PARA ESTA TABELA COM aoColumns; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- END SAMPLE TABLE PORTLET-->
</div>
</div>

<!-- BEGIN PAGE LEVEL STYLES -->
<?php //$this->Html->css('/metronic/assets/global/plugins/select2/select2', array('block' => 'cssPage')); ?>
<?php $this->Html->css('/metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap', array('block' => 'cssPage')); ?>

<?php $this->Html->css('/metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min', array('block' => 'cssPage')); ?>
<?php $this->Html->css('/metronic/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min', array('block' => 'cssPage')); ?>
<?php $this->Html->css('/metronic/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min', array('block' => 'cssPage')); ?>

<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php //$this->Html->script('/metronic/assets/global/plugins/select2/select2.min', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/metronic/assets/global/plugins/datatables/datatables.min', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap', array('block' => 'scriptBottom')); ?>

<?php $this->Html->script('/metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/metronic/assets/global/plugins/jquery-validation/js/additional-methods.min', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/metronic/assets/global/plugins/jquery-validation/js/localization/messages_pt_BR.min', array('block' => 'scriptBottom')); ?>

<?php $this->Html->script('/metronic/assets/global/plugins/maskcaras_er', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/metronic/assets/global/plugins/bootbox/bootbox.min', array('block' => 'scriptBottom')); ?>

<?php $this->Html->script('/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/metronic/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/metronic/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/metronic/assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/metronic/assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.pt-BR', array('block' => 'scriptBottom')); ?>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php $this->Html->script('/metronic/assets/global/scripts/datatable', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/js/Nfces/index', array('block' => 'scriptBottom')); ?>
<!-- END PAGE LEVEL SCRIPTS -->