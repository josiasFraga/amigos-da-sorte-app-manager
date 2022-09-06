<!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Campanhas <small>adicionar campanha</small></h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
	        <a href="<?php echo $this->Html->url(array('controller' => 'dashboard', 'action' => 'index')) ?>">Início</a>
	            <i class="fa fa-circle"></i>
        </li>
        <li>
    		<a href="<?php echo $this->Html->url(array('controller' => 'campanhas', 'action' => 'index')) ?>">Campanhas</a><i class="fa fa-circle"></i>
        </li>
        <li class="active">
            Adicionar
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->

<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption">
                    <i class="icon-plus font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase"> Adicionar Campanha </span>
                </div>
                <div class="actions">
			        <a role="button" data-toggle="" href="<?php echo $this->Html->url(array('controller' => 'Pessoas', 'action' => 'adicionar')) ?>" class="btn btn-circle btn-default display-hide" id="outro_cadastro"><i class="fa fa-plus"></i> Incluir Outra Pessoa </a>
		        </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
				<form class="" action="" method="post" enctype="multipart/form-data" id="adicionar-campanha" autocomplete="off">
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

						<div class="row">

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="control-label">Nome: <span class="required">*</span></label>
                                    <input type="text" class="form-control form-filter input-sm required" name="data[Campanha][nome]" placeholder="" id="nome">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Imagem: <span class="required">*</span></label>
                                    <input type="file" class="form-control form-filter input-sm required" name="data[Campanha][imagem]" placeholder="" id="img">
                                </div>
                            </div>
                        </div>

						<div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Data de Início: <span class="required">*</span></label>
                                    <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                        <input type="text" class="form-control form-filter input-sm required" readonly name="data[Campanha][inicio]" placeholder="" id="inicio">
                                        <span class="input-group-btn"><button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Data Final: <span class="required">*</span></label>
                                    <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                        <input type="text" class="form-control form-filter input-sm required" readonly name="data[Campanha][fim]" placeholder="" id="fim">
                                        <span class="input-group-btn"><button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Valor de compra para cada ponto: <span class="required">*</span></label>
                                    <input type="text" class="form-control form-filter moeda input-sm required" name="data[Campanha][valor_por_ponto]" placeholder="" id="valor_por_ponto">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Nº de caracteres no nº da sorte: <span class="required">*</span></label>
                                    <input type="text" class="form-control form-filter input-sm required" name="data[Campanha][n_caracteres_cupons]" placeholder="" id="n_caracteres_cupons">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Link do regulamento: <span class="required">*</span></label>
                                    <input type="text" class="form-control form-filter input-sm required" name="data[Campanha][regulamento]" placeholder="" id="regulamento">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Link do campanha no site: <span class="required">*</span></label>
                                    <input type="text" class="form-control form-filter input-sm required" name="data[Campanha][campanha]" placeholder="" id="campanha">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">HTML do regulamento (exigência da Apple): <span class="required">*</span></label>
                                    <textarea class="form-control required" rows="3" name="data[Campanha][regulamento_html]" id="regulamento_html"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Breve Descrição da Campanha: <span class="required">*</span></label>
                                    <textarea class="form-control required" rows="3" name="data[Campanha][descricao]" id="descricao"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Empresa(s): <span class="required">*</span></label>
                                    <select class="form-control form-filter input-sm required" name="data[CampanhaEmpresa][][empresa_id]" placeholder="" id="empresa_id" multiple>
                                    </select>
                                </div>
                            </div>
                        
                        </div>
                        
						<div class="row">
							<div class="col-md-12"><hr></div>
                        </div><!-- ./row -->

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a class="btn green add-sorteio" href="javascript:;">
                                    <i class="fa fa-plus"></i> Adicionar Sorteio
                                </a>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-container">
                                    <table class="table table-striped table-hover" id="sorteios">
                                    <thead>
                                        <tr>
                                            <th width="15px">#</th>
                                            <th>Data</th>
                                            <th width="80px">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="no_results"><td class="text-center" colspan="3">Nenhum sorteio adicionado!</td></tr>
                                    </tbody>
                                    </table>
                                </div>
							</div>
                        </div><!-- ./row -->

                        <div class="row">
							<div class="col-md-12"><hr></div>
                        </div><!-- ./row -->
		
					</div><!-- ./form-body -->
		
					<div class="form-actions">
						<div class="row">
							<div class="col-md-12 text-right">
								<button class="btn default" type="reset">Cancelar</button>
								<button class="btn green" type="submit">Salvar</button>
							</div>
						</div>
					</div>
		
				</form>
				<!-- END FORM-->
            </div>

        </div>
        <!-- End: life time stats -->
    </div>
</div>
<!-- END PAGE BASE CONTENT -->

<!-- BEGIN PAGE HEADER-->
<div class="modal fade" id="adicionar_sorteio" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Adicionar Sorteio</h4>
            </div>

                <div class="form-body">
                    <div class="modal-body">

                        <div class="alert alert-danger alert-sorteio display-hide">
                            <button data-close="alert" class="close"></button>
                            <span class="message"></span>
                        </div>

                        <div class="alert alert-warning display-hide">
                            <button data-close="alert" class="close"></button>
                            <span class="message"></span>
                        </div>

                        <div class="alert alert-success display-hide">
                            <button data-close="alert" class="close"></button>
                            <span class="message"></span>
                        </div>

						<div class="form-group">
							<label class="control-label">Data <span class="required" aria-required="true"> *</span></label>
                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                <input type="text" class="form-control form-filter input-sm required" readonly placeholder="" id="sorteio_data">
                                <span class="input-group-btn"><button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button></span>
                            </div>
						</div>

						<div class="form-group">
							<label class="control-label">Hora</label>
							<div>
								<input type="text" class="form-control hora" id="sorteio_hora" maxlength="5" autocomplete="off" placeholder="ex 20:45">
							</div>
						</div>

	
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn default" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="add_sorteio" class="btn btn-success">Adicionar</button>
                    </div>
                </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
$this->Html->css('/metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/layouts/layout4/css/custom', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/global/plugins/select2/css/select2.min', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/global/plugins/select2/css/select2-bootstrap.min', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min', array('block' => 'cssPage'));

/*-- BEGIN PAGE LEVEL PLUGINS --*/
$this->Html->script('/metronic/assets/global/plugins/jquery.form.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/jquery.metadata', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/jquery-validation/js/additional-methods', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/jquery-validation/js/localization/messages_pt_BR.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/maskcaras_er', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/select2/js/select2.full.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min', array('block' => 'scriptBottom'));
//$this->Html->script('/metronic/assets/global/plugins/dependent-dropdown-master/js/dependent-dropdown.min', array('block' => 'scriptBottom'));
/*-- END PAGE LEVEL PLUGINS --*/

/*-- BEGIN PAGE LEVEL SCRYPTS --*/
$this->Html->script('/js/Campanhas/adicionar.js?v=1.0', array('block' => 'scriptBottom'));
/*-- END PAGE LEVEL SCRYPTS --*/
?>