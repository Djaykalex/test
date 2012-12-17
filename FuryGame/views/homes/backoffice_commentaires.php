<?php if(isset($aControllerDatas['isauth'])) { $isauth = $aControllerDatas['isauth']; } ?>
<?php if(isset($aControllerDatas['commentaires'])) { $article = $aControllerDatas['commentaires']; } ?>	
<div class="section">
	<div class="box">
		<div class="titre"> Liste des commentaires </div>
		<div class="content">					
			<table cellspacing="0"  class="table" cellpadding="0" border="0">
				<thead >
					<tr class="titre">
						<th>Commentaires</th>
						<th>Online</th>
						<th>Auteur</th>
						<th>Editer</th>
						<th>Supprimer</th>
						<th><input type="checkbox" class="checkall" /></th>
					</tr> 
				</thead> 
				<tbody > 

					<?php foreach ($aControllerDatas['commentaires'] as $k => $v){ ?>
					<tr> 
						<td><?php echo $v['content']; ?></td>
						<td><?php echo $v['online']; ?></td>
						<td><?php echo $isauth[$v['isauth_id']]; ?></td>
						
						<td>
							<a href="<?php echo BASE_URL; ?>/homes/backoffice_edit_commentaires/<?php echo $v['id']; ?>"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-edit.png" alt="edit" /></a>
						</td>
						<td>
							<a href="<?php echo BASE_URL; ?>/homes/backoffice_delete/<?php echo $v['id']; ?>" class="deleteBox" onclick="return confirm('Voulez vous vraiment supprimer?');"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-delete.png" alt="delete" /></a>
						</td>
						<td class="txtcenter xxs"><input type="checkbox" /></td>
					</tr>
					<?php } ?>
				</tbody> 
				<tfoot>
					<tr>
						<td class="suppr" colspan="4"class="txtright"><a class="btn red deleteFormBox" onclick="return confirm('Voulez vous vraiment supprimer?');" href="<?php echo BASE_URL; ?>/articles_types/backoffice_delete/<?php echo $v['id']; ?>" style="margin-top: 10px;"><span>SUPPRIMER</span></a></td>					
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
	
