<?php
//pr($aControllerDatas);
?>

<div class="section">
	<div class="box">
		<div class="title">
			<h2>Liste des types de roles</h2>
			<a class="btn black" href="<?php echo BASE_URL; ?>/types_roles/backoffice_add" style="float: right; margin-right:150px; margin-top: -33px; "><span>Ajouter</span></a>
		</div>
		<div class="content">					
			<table cellspacing="0"  class="table" cellpadding="0" border="0">
				<thead >
					<tr class="titre">
						
						<th>Type de role</th>
						<th>Edit</th>
						<th>Delete</th>
						
						<th><input type="checkbox" class="checkall" /></th>
				
					</tr> 
				</thead> 
				<tbody > 
				<style>
					.titre th{text-align:center;}
					.table{
						
						margin-left:200px;
						width:500px;
					}
					.suppr{text-align:left;}
					td{text-align:center;}
				</style>
				
					<?php 
					$articlesTypesList = $aControllerDatas['articlesTypesList'];
					foreach ($aControllerDatas['articles_types'] as $k => $v){ ?>
					<tr> 
						
						<td><?php echo $v['name']; ?></td>
						
						
						
						<td>
							<a href="<?php echo BASE_URL; ?>/types_roles/backoffice_edit/<?php echo $v['id']; ?>"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-edit.png" alt="edit" /></a>
						</td>
						<td>
							<a href="<?php echo BASE_URL; ?>/types_roles/backoffice_delete/<?php echo $v['id']; ?>" class="deleteBox" onclick="return confirm('Voulez vous vraiment supprimer?');"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-delete.png" alt="delete" /></a>
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
	
