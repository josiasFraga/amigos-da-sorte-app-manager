<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
	<li>
		<a href="<?php echo $this->Html->url(array('controller' => 'Dashboard', 'action' => 'index')) ?>">Dashboard</a><i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="<?php echo $this->Html->url(array('controller' => 'Cupons', 'action' => 'index')) ?>">Cupons</a><i class="fa fa-circle"></i>
	</li>
	<li class="active">
		Exportar Listagem
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-search font-dark"></i>
					<span class="caption-subject font-dark bold uppercase">Exportar Listagem</span>
					<span class="caption-helper"></span>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form class="" action="#" method="post" enctype="multipart/form-data" id="exportar-listagem" autocomplete="off">
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
							<div class="col-md-12">
		
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-icon left">
                                                <i class="fa"></i>
                                                <select class="table-group-action-input form-control required number w-100" name="data[campanha_id]" style="width: 100%" id="campanha_id">
                                                    <option value="">Selecione...</option>
                                                    <?php foreach($campanhas as $key => $campanha){ ?>
                                                    <option value="<?php echo $campanha['Campanha']['id'] ?>"><?php echo $campanha['Campanha']['nome'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- ./row -->
		
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div class="input-icon left">
												<i class="fa"></i>
												<select class="table-group-action-input form-control required number w-100" name="data[sorteio_id]" style="width: 100%" id="sorteio_id">
													<option value="">Selecione...</option>
												</select>
											</div>
										</div>
									</div>
								</div><!-- ./row -->

							</div><!-- ./col -->
						</div><!-- ./row -->

						<div class="row">
							<div class="col-md-12"><br></div>
						</div><!-- ./row -->
		
					</div><!-- ./form-body -->
		
					<div class="form-actions">
						<div class="row">
							<div class="text-right">
								<button class="btn default" type="reset">Cancelar</button>
								<button class="btn green" type="submit"><i class="fa fa-check"></i> Exportar</button>
							</div>
						</div>
					</div>
		
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>

<?php
$this->Html->css('/metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/layouts/layout4/css/custom', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/global/plugins/select2/css/select2.min', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/global/plugins/select2/css/select2-bootstrap.min', array('block' => 'cssPage'));
$this->Html->css('/metronic/assets/global/plugins/icheck/skins/all', array('block' => 'cssPage'));

/*-- BEGIN PAGE LEVEL PLUGINS --*/
$this->Html->script('/metronic/assets/global/plugins/jquery.form.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/jquery.metadata', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/jquery-validation/js/additional-methods', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/jquery-validation/js/localization/messages_pt_BR.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/maskcaras_er', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/select2/js/select2.full.min.js?v=1', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/global/plugins/icheck/icheck.min', array('block' => 'scriptBottom'));
$this->Html->script('/metronic/assets/pages/scripts/components-select2.min', array('block' => 'scriptBottom'));
//$this->Html->script('/metronic/assets/global/plugins/dependent-dropdown-master/js/dependent-dropdown.min', array('block' => 'scriptBottom'));
/*-- END PAGE LEVEL PLUGINS --*/

/*-- BEGIN PAGE LEVEL SCRYPTS --*/
$this->Html->script('/js/Cupons/exportar_listagem.js?v=1.0.1', array('block' => 'scriptBottom'));
/*-- END PAGE LEVEL SCRYPTS --*/
?>