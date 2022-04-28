	<!-- Header -->
		<header>
			<div class="container">
				<div class="slider-container">
					<div class="intro-text">
						<div class="intro-lead-in">Aprenda com profissionais qualificados!</div>
						<div class="intro-heading">HJ Tecnologia MEI</div>
						<a href="<?php echo base_url(); ?>#service" class="page-scroll btn btn-xl">Conheça os nossos serviços</a>
					</div>
				</div>
			</div>
		</header>

	<section id="about" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Sobre</h2>
							<h3>Primeiro trabalho da disciplina de LABORATÓRIO DE NEGÓCIOS: EMPREENDEDORISMO E INOVAÇÃO TECNOLÓGICA do 7º bloco da FATEPI/FAESPI.<h3>
							2022.1</p>
							<br>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus rhoncus dui vitae pellentesque. Duis accumsan porttitor orci, semper eleifend justo molestie a.
     							Etiam tempus tristique dui vel faucibus. Donec eget mattis nisi, et laoreet ipsum. Vivamus a rhoncus leo, ac accumsan risus. 
								Phasellus quis pellentesque orci, at gravida purus. Curabitur tellus nisl, lacinia et purus id, tristique aliquet lectus. 
								Suspendisse potenti. Phasellus tristique lorem lorem, sit amet maximus libero hendrerit ut. Duis purus felis, finibus non felis facilisis,
								maximus sodales ipsum. Etiam id lacinia velit. Integer massa purus, pharetra ac enim ut, ultricies malesuada nulla.
								Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer non iaculis ipsum, 
								sed malesuada sapien. Mauris congue ligula eget dui semper, ac varius elit fermentum.
							   Nunc non egestas tellus. Duis sit amet elit gravida, pulvinar tortor in, dignissim quam. In in sollicitudin mauris. 
							   Maecenas imperdiet faucibus sem, vel egestas lectus sagittis eu. Pellentesque et nisl ultrices, rhoncus tortor ac, 
							   posuere metus. Sed lectus risus, iaculis ac finibus sit amet, egestas a lorem. Aliquam vulputate magna quis dolor porta, 
							   eu feugiat arcu tincidunt. Integer ornare risus ac nisi sagittis iaculis. Aenean tincidunt nisl nisi, 
							   ut aliquam nisl volutpat in. Curabitur urna neque, dignissim id scelerisque sit amet, vulputate vitae dui. 
							   Maecenas dictum bibendum sapien eu mollis. Nulla facilisi.
                              Proin iaculis lacinia dignissim.
						</div>
					</div>
				</div>
			</div>
			<!-- /.container -->
		</section>
		
		<section class="overlay-dark bg-img1 dark-bg short-section">
			<div class="container text-center">
				<div class="row">
					<div class="col-md-offset-3 col-md-3 mb-sm-30">
						<div class="counter-item">
							<a class="page-scroll" href="#service">
							<h6>Serviços</h6>
						</div>
					</div>
					<div class="col-md-3 mb-sm-30">
						<div class="counter-item">
							<a class="page-scroll" href="#team">
							<h6>Equipe</h6>
						</div>
					</div>
				
			</div>
		</section>
		<section id="service" class="light-bg">
			<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h2>Serviços</h2>
						<h1>Conheça os nossos serviços</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				if (!empty($services)) {
	 
					foreach ($services as $service) { ?>
						<div class="col-md-4">
							<div class="ot-portfolio-item">
								<figure class="effect-bubba">
									<img src="<?=base_url().$service["service_img"]?>" alt="img02" class="img-responsive center-block"/>
									<figcaption>
										<a href="#" data-toggle="modal" data-target="#service_<?=$service["service_id"]?>"></a>
									</figcaption>
								</figure>
							</div>
						</div>

						<div class="modal fade" id="service_<?=$service["service_id"]?>" tabindex="-1" role="dialog" aria-labelledby="Modal-label-1">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="X"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="Modal-label-1"><?=$service["service_name"]?></h4>
									</div>
									<div class="modal-body">
											<img src="<?=base_url().$service["service_img"]?>" alt="img01" class="img-responsive center-block" />
											<p><?=$service["service_description"]?></p>
										</div>
									
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									</div>
								</div>
							</div>
						</div>
				<?php } // FOREACH
				} // IF ?>
			</div>
			</div><!-- end container -->
		</section>
		<section id="team" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Nossa equipe</h2>
							<p>Conheça a nossa equipe.</p>
						</div>
					</div>
				</div>
				
					<div class="row">
					<?php 
					if (!empty($team)) {
						foreach ($team as $member) { ?>

							<div class="col-md-3">
								<a href="#" data-toggle="modal" data-target="#member_<?=$member["member_id"]?>">
									<div class="team-item">
										<div class="team-image">
											<img src="<?=base_url().$member["member_photo"]?>" class="img-responsive img-circle" alt="author">
										</div>
										<div class="team-text">
											<h3><?=$member["member_name"]?></h3>
										</div>
									</div>
								</a>
							</div>

							<div class="modal fade" id="member_<?=$member["member_id"]?>" tabindex="-1" role="dialog" aria-labelledby="Modal-label-1">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="Modal-label-1"><?=$member["member_name"]?></h4>
										</div>
										
										<div class="modal-body">
											<img src="<?=base_url().$member["member_photo"]?>" alt="img01" class="img-responsive center-block" />
											<p><?=$member["member_description"]?></p>
										</div>
										
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
										</div>
									</div>
								</div>
							</div>
					<?php } // FOREACH
					} // IF ?>
				</div>
			</div>
		</section>
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Contato</h2>
							<p>Entre em contato conosco por aqui.<br>Tentaremos responder o mais rápido possível</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form name="sentMessage" id="contactForm" novalidate="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Seu nome *" id="name" required="" data-validation-required-message="Please enter your name.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Seu e-mail*" id="email" required="" data-validation-required-message="Please enter your email address.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" placeholder="Sua mensagem *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									<button type="submit" class="btn">Enviar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<p id="back-top">
			<a href="#top"><i class="fa fa-angle-up"></i></a>
		</p>
	