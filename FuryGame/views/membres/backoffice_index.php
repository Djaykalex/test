<?php
//pr($aControllerDatas);
?>
<div class="section">
	<div class="box">
		<div class="title">
			<h2>Liste des membres</h2>
			<a class="btn black" href="<?php echo BASE_URL; ?>/membres/backoffice_add" style="float: right; margin-top: -33px;"><span>ajouter</span></a>
		</div>
		<div class="content">
			<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
			<table cellspacing="0" cellpadding="0" border="0" class="table">
				<thead>
					<tr>
						<th>Nom</th>
						<th>prenom</th>
						<th>Login</th>
						<th>Pseudo</th>
						<th>Role</th>
						<th>Edit</th>
						<th>Delete</th>
						<th><input type="checkbox"   class="checkall" /></th>
					</tr> 
				</thead> 
				<tbody> 
					<?php 
					$guilde = $aControllerDatas['guilde'];
					if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes']; }
				
					$rolemembre = $aControllerDatas['rolemembre'];
					foreach ($aControllerDatas['isauth'] as $k => $v){ ?>
					<tr> 
						
						<td><?php echo $v['name']; ?></td>
						<td><?php echo $v['prenom']; ?></td>
						<td><?php echo $v['login']; ?></td>
						<td><?php echo $v['pseudo']; ?></td>
						<td><?php echo $rolemembre[$v['role_id']]; ?></td>
						<!--<td><?php echo $guildes[$v['guildes_id']]; ?></td>-->

						<td>
							<a href="<?php echo BASE_URL; ?>/membres/backoffice_edit/<?php echo $v['id']; ?>"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-edit.png" alt="edit" /></a>
						</td>
						<td>
							<a href="<?php echo BASE_URL; ?>/membres/backoffice_delete/<?php echo $v['id']; ?>" class="deleteBox" onclick="return confirm('Voulez vous vraiment supprimer?');"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-delete.png" alt="delete" /></a>
						</td>
						<td class="txtcenter xxs"><input type="hidden" value="0" name="delete[<?php echo $v['id']; ?>]" id="InputDelete<?php echo $v['id']; ?>hidden">
						<input type="checkbox" value="1" name="delete[<?php echo $v['id']; ?>]" id="InputDelete<?php echo $v['id']; ?>">
						</td>
					</tr>
					<?php } ?>
				</tbody> 
				<tfoot>
					<tr>
						<td colspan="9"class="txtright suppr"><button type="submit" class="btn red"><span>supprimer</span></button></td>					
					</tr>
				</tfoot>
			</table>
			</form>
		</div>
	</div>
</div>
	
