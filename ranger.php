<?php include_once "includes/session.php";?>
<!DOCTYPE html>
<html dir="ltr" lang="pt">

<head>
    <?php include_once "includes/head.html";?>
	<meta charset="UTF-8" />
</head>

<body>
	
	<form method="post">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include_once "includes/topbar.html";?>
        <?php include_once "includes/sidebar.html";?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <?php //include_once "includes/breadcrumb.html";?>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
			
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-3">Default Tabs</h4>
					<ul class="nav nav-tabs mb-3">
						<li class="nav-item">
							<a href="#padrao" data-toggle="tab" aria-expanded="false" class="nav-link active">
								<i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
								<span class="d-none d-lg-block">Ranger</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#ips" data-toggle="tab" aria-expanded="true" class="nav-link">
								<i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
								<span class="d-none d-lg-block">IPs</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
								<i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
								<!--<span class="d-none d-lg-block">Settings</span>-->
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<!--Aba 1-->
						<div class="tab-pane show active" id="padrao">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-12 col-md-6 col-lg-4">
										<div class="card">
											<div class="card-body">
												<h4 class="card-title">Incluir Ranger:</h4>
												<form class="mt-3" method='post'>
													<div class='row ml-1'>
														<input type="text" id="ranger" name="oct1"
															class="form-control form-control-sm" placeholder="000" style='width: 50px;'>.
														<input type="text" id="ranger" name="oct2"
															class="form-control form-control-sm ml-1" placeholder="000" style='width: 50px;'>.
														<input type="text" id="ranger" name="oct3"
															class="form-control form-control-sm ml-1" placeholder="000" style='width: 50px;'>
													</div>
													<br>
													<input type="text" id="descricao" name="descricao"
														class="form-control form-control-sm" placeholder="Descrição"><br>
													<input class='btn btn-rounded btn-primary' formaction='insertranger.php' type='submit' value='Incluir' style='width: 200px;'>
												</form>
											</div>
										</div>
									</div>									
								</div>
								<?php
									include_once 'class/Ranger.php';
									$busca_ranger = new Ranger();
									$res_ranger = $busca_ranger->buscaRanger();
									$tot_ranger = $res_ranger[0];
									$dados_ranger = $res_ranger[1];
									if($tot_ranger>0){
										for($i=0;$i<$tot_ranger;$i++){
											$oct1 = $dados_ranger[$i]['oct1'];
											$oct2 = $dados_ranger[$i]['oct2'];
											$oct3 = $dados_ranger[$i]['oct3'];
											$ranger = $oct1.'.'.$oct2.'.'.$oct3;
											$desc_ranger = ucfirst($dados_ranger[$i]['desc_ranger']).':<br>';
											$desc_ranger = utf8_encode($desc_ranger);
											echo "<p>$desc_ranger</p>". 
												"<div class='row'>".												
												"<div class='customize-input float-right mt-2'>".
													"<input class='btn btn-rounded btn-primary' type='submit' value=$ranger style='width: 200px;'>".		
												"</div>".												
												"</div><br>";			
										}
									}
								?>
								<!--<div class='row'>
									<div class="customize-input float-right mt-2">
										<input class="btn btn-rounded btn-primary" type="submit" value="172.18.0" style="width: 200px;">
									</div>									
								</div>
								<div class='row'>
									<div class="customize-input float-right mt-2">
										<input class="btn btn-rounded btn-primary" type="submit" value="192.168.0" style="width: 200px;">
									</div>
								</div>
								<div class='row'>
									<div class="customize-input float-right mt-2">
										<input class="btn btn-rounded btn-primary" type="submit" value="192.168.1" style="width: 200px;">
									</div>
								</div>-->
							</div>							
						</div>
						<!--Aba 2-->
						<div class="tab-pane" id="ips">
							<div class="container-fluid">
								<div class='row'>
									<div class="customize-input float-right mt-2">
										<input class="btn btn-rounded btn-primary" type="submit" value="172.18.0.1" style="width: 250px;">
									</div>
									
								</div>
								<div class='row'>
									<div class="customize-input float-right mt-2">
										<input class="btn btn-rounded btn-primary" type="submit" value="192.18.0.2" style="width: 250px;">
									</div>
								</div>
								<div class='row'>
									<div class="customize-input float-right mt-2">
										<input class="btn btn-rounded btn-primary" type="submit" value="192.18.0.3" style="width: 250px;">
									</div>
								</div>
							</div>							
						</div>
						<div class="tab-pane" id="settings">
                                        <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean
                                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                            magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                                            ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                                            quis enim.</p>
                                        <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                            arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                                            dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                            elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula,
                                            porttitor eu, consequat vitae, eleifend ac, enim.</p>
						</div>
					</div>
				</div> <!-- end card-body-->
			</div> <!-- end card-->

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                Desenvolvido por STI - Subsecretaria de Tecnologia da Informação <a
                    href="http://itaguai.rj.gov.br">Prefeitura de Itaguaí</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>
</html>