	<?php 

		require('config.php');

		$id = $_SESSION['id_user'];

		$prep = $db->prepare("SELECT experience FROM demande WHERE id_user =?");
		$prep->execute(array($id));
		$resul = $prep->fetch();
	?>

	<div class="container">

		<div id="mymodal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times: </button>
						
					</div>
					<div class="modal-body">

						<?php if($resul['experience'] == "") { ?>
							<p>
								<span style="color:red"> veillez indiquer votre expérience dans votre fonction</span>
							</p>

						<?php } else {?>
							<p>
								<span style="color: blue"> Merci. Votre démande à bien été enregistré, nous allons vous contactez
								trés bientôt aprés le traitement des vos informations.Rester à l'ecoute.
								</span>
							</p>
						<?php }?>
					</div class="modal-body">

						<table class="table">
							<thead>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Numero</th>
								<th>Fonction</th>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $_SESSION['nom'] ?></td>
									<td><?php echo $_SESSION['prenom'] ?></td>
									<td><?php echo $_SESSION['numero'] ?></td>
									<td><?php echo $_SESSION['fonction'] ?></td>
								</tr>
							</tbody>
						</table>
					<div>

					<div class="modal-body">
						<p>
							L'objet de votre démande est : <span style="color:blue"><?php echo $resu['nom_serv'] ?></span>
						</p>
					</div>
						
					<div class="modal-body">
						<h2>Expérience indiquée</h2>

						<?php if($resul['experience'] == "") { ?>
							<p>
								<span style="color:red">Aucune experience indiquée</span>
							</p>
						<?php } else {?>

							<p>
								<span style="color:grey"> <?php echo $resul['experience'] ?></span>
							</p>
						<?php }?>
						<br>
						Retourner à la page <a href="index.php">  Acceuil</a>
					</div>

					<div class="modal-footer">

						<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>

					</div>

				</div>
				
			</div>
		</div>
	</div>