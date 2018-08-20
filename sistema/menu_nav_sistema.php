<?php
require "../configuracoes.php";
?>

				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a href="../" class="navbar-brand" id="titulo">Total Ville Quadra 101
					</a>
					<button class="navbar-toggler" data-toggle="collapse" data-target="#navemenu">
						<span class="navbar-toggler-icon">
						</span>
					</button>

					<div class="navbar-collapse collapse" id="navemenu">
						<div class="navbar-nav">
							<a href="../index.php" class="nav-item nav-link">Home</a>
							<a href="../cadastro.php" class="nav-item nav-link">Cadastro</a>
							<a href="" class="nav-item nav-link">Contas</a>
							<a href="" class="nav-item nav-link">Assembléias</a>
							<a href="" class="nav-item nav-link" 
							target="_blank">Convenção</a>
							<a href="" class="nav-item nav-link" 
							target="_blank">Regimento</a>
							<a href="" class="nav-item nav-link">Negociação</a>
							<a href="" class="nav-item nav-link">Reservas</a>
							<a href="" class="nav-item nav-link">Comunicados</a>
							<a href="../sistema/sistema.php" class="nav-item nav-link">Sistema</a>

						</div>
					</div> 
				<?php
				require "../validador_acesso.php";
				?>
			</nav>
