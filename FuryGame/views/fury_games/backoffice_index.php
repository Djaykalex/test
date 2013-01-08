<?php
//pr($aControllerDatas);
?>

<div class="section">
	<div class="box">
		<div class="title">
			<h2>Liste des jeux en démos</h2>
			<a class="btn black" href="<?php echo BASE_URL; ?>/fury_games/backoffice_add" style="float: right; margin-top: -33px;"><span>ajouter</span></a>
		</div>
		<div class="content">
		
			<?php echo form_create(array(
				'enctype' => "multipart/form-data",
				'method' => "post", 
				'action' => $_SERVER['REQUEST_URI'], 
				'id' => "JeuxDemosEdit"
				));
			?>
			<table cellspacing="0" cellpadding="0" border="0" class="table">
				<thead>
					<tr>
						<th>Titre image</th>
						<th>Front image</th>
						<th>Description</th>
						<th>Age</th>
						<th>Durée</th>
						<th>Joueurs</th>
						<th>Edit</th>
						<th>Suppr</th>
						<th><input type="checkbox"   class="checkall" /></th>
					</tr> 
				</thead> 
				<tbody> 
					<?php 
					foreach ($aControllerDatas['jeux_demos'] as $k => $v){ ?>
					<tr> 
						<td><?php echo $v['title_image']; ?></td>
						<td><?php echo $v['front_image']; ?></td>
						<td><?php echo $v['description']; ?></td>
						<td><?php echo $v['age']; ?></td>
						<td><?php echo $v['duree']; ?></td>
						<td><?php echo $v['nb_joueurs']; ?></td>
						<td>
							<a href="<?php echo BASE_URL; ?>/fury_games/backoffice_edit/<?php echo $v['id']; ?>"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-edit.png" alt="edit" /></a>
						</td>
						<td>
							<a href="<?php echo BASE_URL; ?>/fury_games/backoffice_delete/<?php echo $v['id']; ?>" class="deleteBox" onclick="return confirm('Voulez vous vraiment supprimer?');"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-delete.png" alt="delete" /></a>
						</td>
						<td class="txtcenter xxs"><input type="hidden" value="0" name="delete[<?php echo $v['id']; ?>]" id="InputDelete<?php echo $v['id']; ?>hidden">
						<input type="checkbox" value="1" name="delete[<?php echo $v['id']; ?>]" id="InputDelete<?php echo $v['id']; ?>">
						</td>
					</tr>
					<?php } ?>
				</tbody> 
					<tr>
						<td colspan="9"class="txtright suppr"><button type="submit" class="btn red"><span>supprimer</span></button></td>					
					</tr>
			</table>
			</form>
			<!--<?php echo form_close(); ?>-->
		</div>
	</div>
</div>
	
