<div class="page-sidebar-wrapper">
	<!-- BEGIN SIDEBAR -->
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul class="page-sidebar-menu  <?= (strtolower($this->params['controller']) == 'contaspagar') ? 'page-sidebar-menu-closed' : '' ?>" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

			<li class="nav-item start <?php echo (strtolower($this->params['controller']) == 'dashboard') ? 'active open' : '' ?>">
				<a href="<?php echo $this->Html->url(array('controller' => 'Dashboard', 'action' => 'index')) ?>" class="nav-link nav-toggle">
					<i class="icon-home"></i>
					<span class="title">Início</span>
					<span class="selected"></span>
					<!-- <span class="arrow"></span> -->
				</a>
			</li>

			<li class="nav-item start <?php echo (strtolower($this->params['controller']) == 'cupons') ? 'active open' : '' ?>">
				<a href="<?php echo $this->Html->url(array('controller' => 'Cupons', 'action' => 'encontrar_ganhador')) ?>" class="nav-link nav-toggle">
					<i class="fa fa-search"></i>
					<span class="title">Encontrar Ganhador</span>
					<span class="selected"></span>
					<!-- <span class="arrow"></span> -->
				</a>
			</li>

			<li class="nav-item start <?php echo (strtolower($this->params['controller']) == 'usuarios') ? 'active open' : '' ?>">
				<a href="<?php echo $this->Html->url(array('controller' => 'Usuarios', 'action' => 'index')) ?>" class="nav-link nav-toggle">
				<i class="icon-users"></i>
					<span class="title">Usuários</span>
					<span class="selected"></span>
					<!-- <span class="arrow"></span> -->
				</a>
			</li>
		
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->
</div>