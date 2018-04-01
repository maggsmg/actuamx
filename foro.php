<?php require_once('header.php'); ?>
<?php require_once('navbar.php'); ?>

<div class="has-overlay img-bg foro" >
	<div class="content container-fluid">
		<div class="container-small">
			<div class="row">
				<div class="col-md-2">
					<p class="date"><span class="number">25</span>abril</p>
					<p class="date"><span class="number">26</span>abril</p>
					<p class="date"><span class="number">27</span>abril</p>
				</div>
				<div class="col-md-10 right">
					<h1>Foro de Candidatos</h1>
					<p class="desc">Evento que tiene como finalidad que los estudiantes puedan conocer a los candidatos y tener una opini&oacute;n cr&iacute;tica respecto de cada uno de ellos. As&iacute; como facilitar las acciones bilaterales que se deben de llevar a cabo entre servidor p&uacute;blico y gobernado.</p>
					<div class="row">
						<div class="col-md-5">
							<a href="#pregunta" class="btn bg-black questionbtn">Manda tu pregunta a los candidatos</a>
						</div>
					</div>
					<section class="candidatos">
						<div class="row">
							<div class="col-md-3">
								<div class="candidato">
									<img src="img/margarita.jpg" alt="Nombre del candidato" class="circleimg">
									<p class="name">Margarita Zavala</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="candidato">
									<img src="img/anaya.jpg" alt="Nombre del candidato" class="circleimg">
									<p class="name">Ricardo Anaya</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="candidato">
									<img src="img/amlo.jpg" alt="Nombre del candidato" class="circleimg">
									<p class="name">Andr&eacute;s Manuel L&oacute;pez Obrador</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="candidato">
									<img src="img/meade.jpg" alt="Nombre del candidato" class="circleimg">
									<p class="name">Jos&eacute; Antonio Meade</p>
								</div>
							</div>
						</div>
					</section>
					<section class="sendquestion" id="pregunta">
						<div class="row">
							<div class="col">
								<h2>Manda tu pregunta a los candidatos</h2>
								<form action="#" class="question-form" id="questionForm">
									<label for="name">Tu nombre: <small>(opcional)</small></label>
									<input type="text" name="name" id="name" />
									<label for="category">Tema de tu pregunta:</label>
									<select name="category" id="category" required>
										<option value="">----</option>
										<option value="1">Educaci&oacute;n</option>
										<option value="2">Relaciones Internacionales</option>
										<option value="3">Pol&iacute;ticas P&uacute;blicas / Reformas Estructurales</option>
										<option value="4">Otro</option>
									</select>
									<label for="question">Tu pregunta:</label>
									<textarea required name="question" id="question"></textarea>
									<input type="submit" value="Enviar" class="submit btn bg-black">
								</form>
								<p class="success-msg">&iexcl;Gracias! Tu pregunta ha sido registrada. <br><br> <small>El equipo de Act&uacute;a se reserva el derecho de seleccionar un subconjunto de las preguntas enviadas.</small></p>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<div class="fade fade-bp"></div>
</div>
<script src="js/question.js"></script>
<?php require_once('footer.php'); ?>
