<div class="modal fade bs-modal-sm" id="modal_selecao" role="dialog" aria-hidden="true">
<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Seleção De Currículo</h4>
			</div>
			<form role="form" id="selecao_curriculo" method="post" enctype="multipart/form-data" action="">
				<div class="alert alert-danger display-hide">
					<button class="close" data-close="alert"></button>
					<span class="message">Por favor, revise os campos em vermelho.</span>
				</div>
				<div class="alert alert-success display-hide">
					<button class="close" data-close="alert"></button>
					<span class="message"></span>
				</div>
				<div class="alert alert-warning display-hide">
					<button class="close" data-close="alert"></button>
					<span class="message"></span>
				</div>
				<div class="form-body">
					<div class="modal-body">

                       

					</div>
					<div class="modal-footer">
						<button type="button" class="btn default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-success">Salvar</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Currículos <small>administrar currículos</small></h1>
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
        <li class="active">
            Currículos
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->

<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-dollar font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase"> Currículos </span>
                </div>
                <div class="actions">
                    <a role="button" data-toggle="" href="#" class="btn btn-circle btn-success" id="imprimir">
                        <i class="fa fa-print"></i> Imprimir </a>
                    <a role="button" data-toggle="" href="https://amigosdasorte.com/curriculos/" target="_BLANK" class="btn btn-circle btn-success">
                        <i class="fa fa-plus"></i> Incluir </a>
                        
                </div>
            </div>
            <div class="portlet-body">
                <div class="teable-responsive">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="table-curriculos">
                        <thead>
                            <tr>
                                <th class="table-checkbox" width="20px">
                                    <input type="checkbox" class="group-checkable" data-set="#table-curriculos .checkboxes"/>
                                </th>
                                <th>Nome</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Cadastro</th>
                                <th>Empresa Preferida</th>
                                <th>Com Exp.</th>
                                <th>Escolaridade</th>
                                <th>Status</th>
                                <th width="150px">Ações</th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="nome"></td>
                                <td><input type="tel" class="form-control form-filter input-sm" name="celular"></td>
                                <td><input type="email" class="form-control form-filter input-sm" name="email"></td>
                                <td>
								<input type="date" class="form-control form-filter input-sm" name="cadastro_de" value="" style="margin-bottom:4px">
								<input type="date" class="form-control form-filter input-sm" name="cadastro_ate" value="">
                                </td>
                                <td><input type="text" class="form-control form-filter input-sm" name="empresa_pref"></td>
                                <td>                                
                                    <select class="form-control form-filter input-sm" name="experiencia">
                                        <option value="">sem filtro ...</option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </td>

                                <td>
								<select class="form-control form-filter input-sm" name="escolaridade">
									<option value="">Selecione ...</option>
									<?php foreach ($escolaridades as $key => $escolaridade) { ?>
										<option value="<?=$key?>"><?=$escolaridade?></option>
									<?php } ?>
								</select>
                                </td>

                                <td>
                                <select class="form-control form-filter input-sm" name="status">
                                    <option value="">Selecione ...</option>
                                    <?php foreach ($status as $id => $st) { ?>
                                        <option value="<?=$id?>"><?=$st?></option>
                                    <?php } ?>
                                </select>
                                </td>
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
<!-- END PAGE BASE CONTENT -->

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
<?php $this->Html->script('/js/Curriculos/selecao.js?v=1.0', array('block' => 'scriptBottom')); ?>
<?php $this->Html->script('/js/Curriculos/index.js?v=1.0', array('block' => 'scriptBottom')); ?>
<!-- END PAGE LEVEL SCRIPTS -->