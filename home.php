<?php require_once('header.php'); ?>

	<nav class="main-nav">
		<p class="white">Hamburger here</p>
	</nav>


	<section class="one bg-black has-overlay img-bg">
		<div class="content tac">
			<div class="row">
				<img class="logo" src="img/actua.svg">
			</div>
			<div class="row">
				<ul class="main-countdown"></ul>
			</div>
			<div class="row">
				<p class="tagline">Lorem ipsum dolor sit amet consectetur</p>
			</div>
		</div>
		<div class="fade fade-bb"></div>
	</section>

	<section class="two bg-black tac">
		<div class="container">
			<h2>&iquest;Qu&eacute; es act&uacute;a?</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui iure quis eaque iusto nemo voluptate, beatae esse deleniti quisquam! Labore, ipsam, perspiciatis. Cumque doloremque sit veritatis corporis quaerat eos, voluptatum quae rem maxime, eum distinctio commodi quas harum nostrum eius.</p>
		</div>
	</section>
	<section class="three home">
		<div class="container-fluid">
			<div class="row">
				<div id="block-1" class="col block has-overlay img-bg bg-black">
					<div class="content">
						<h2><span class="sub">Actividades de </span> <br /> Preforo</h2>
					</div>
					<div class="fade fade-bb"></div>
				</div>
				<div id="block-2" class="col block has-overlay img-bg white">
					<div class="content">
						<h2>Foro <br /> <span class="sub">de Candidatos</span></h2>
					</div>
					<div class="fade fade-bp"></div>
				</div>
			</div>
		</div>
	</section>


	<footer class="brands bg-black">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<img class="actua" src="img/actua.svg" alt="Actua logo" />
				</div>
				<div class="col d-flex justify-content-center">
					<img class="feitesm" src="img/logotec.svg" alt="Tec de Monterrey" />
				</div>
				<div class="col d-flex justify-content-end">
					<img class="feitesm" src="img/feitesmblanco.svg" alt="FEITESM" />
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script>
		$('.main-countdown').countdown({
			date: "April 24, 2018 11:00:00",
			render: function(data) {
				$(this.el).html("<li>" + this.leadingZeros(data.days, 2) + " <span>days</span></li><li>" + this.leadingZeros(data.hours, 2) + " <span>hrs</span></li><li>" + this.leadingZeros(data.min, 2) + " <span>min</span></li><li>" + this.leadingZeros(data.sec, 2) + " <span>sec</span></li>");
			}
		});
	</script>
<?php require_once('footer.php'); ?>
