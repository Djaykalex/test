<?php
//pr($aControllerDatas);
?>

<div class="section">
	<div class="box">
		<div class="title">
			<h2>Liste des articles</h2>
			<a class="btn black" href="<?php echo BASE_URL; ?>/articles/backoffice_add" style="float: right; margin-top: -33px;"><span>ajouter</span></a>
		</div>
		<div class="content">
		
			<?php echo form_create(array(
				'enctype' => "multipart/form-data",
				'method' => "post", 
				'action' => $_SERVER['REQUEST_URI'], 
				'id' => "ArticleEdit"
				));
			?>

			<table cellspacing="0" cellpadding="0" border="0" class="table">
				<thead>
					<tr>
						
						<th>Titre</th>
						<th>Content</th>
						<th>Online</th>
						<th>type</th>
						<th>Edit</th>
						<th>Delete</th>
						<th><input type="checkbox"   class="checkall" /></th>
				
					</tr> 
				</thead> 
				<tbody> 
				
					<?php 
					$articlesTypesList = $aControllerDatas['articlesTypesList'];
					foreach ($aControllerDatas['articles'] as $k => $v){ ?>
					<tr> 
						
						<td><?php echo $v['name']; ?></td>
						<td><?php echo $v['content']; ?></td>
						<td><?php echo $v['Online']; ?></td>
						<td><?php echo $articlesTypesList[$v['articles_type_id']]; ?></td>
						
						<td>
							<a href="<?php echo BASE_URL; ?>/articles/backoffice_edit/<?php echo $v['id']; ?>"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-edit.png" alt="edit" /></a>
						</td>
						<td>
							<a href="<?php echo BASE_URL; ?>/articles/backoffice_delete/<?php echo $v['id']; ?>" class="deleteBox" onclick="return confirm('Voulez vous vraiment supprimer?');"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-delete.png" alt="delete" /></a>
						</td>
						<td class="txtcenter xxs"><input type="hidden" value="0" name="delete[<?php echo $v['id']; ?>]" id="InputDelete<?php echo $v['id']; ?>hidden">
						<input type="checkbox" value="1" name="delete[<?php echo $v['id']; ?>]" id="InputDelete<?php echo $v['id']; ?>">
						</td>
					</tr>
					<?php } ?>
				</tbody> 
				<tfoot>
					<tr>
						<td colspan="7"class="txtright suppr"><button type="submit" class="btn red"><span>supprimer</span></button></td>					
					</tr>
				</tfoot>
			
			</table>
			</form>
			<!--<?php echo form_close(); ?>-->
		</div>
	</div>
</div>
	
