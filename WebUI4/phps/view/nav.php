<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="background: <?=$config['navbar']['bgcolor']?>;">
	<div class="container">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"><?= view::icon("list") ?></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<a class="navbar-brand" href="/"><img decoding="async" src="/icon.jpg" alt="Logo" style="width:30px;"><?=$config['name']?></a>
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="/help">帮助</a>
				</li>
			</ul>

			<form class="d-flex" role="search" action="/search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s">
				<button class="btn btn-outline-success" type="submit">Go</button>
			</form>
		</div>
	</div>
</nav>