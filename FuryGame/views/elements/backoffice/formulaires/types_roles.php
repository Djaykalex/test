<?php if(isset($aControllerDatas['articletype'])) { $articletype = $aControllerDatas['articletype']; } ?>
<div class="row">
	<label>Nouveau type de role</label>
	<div class="rowright"><input type="text" name="name" id="InputName" <?php echo isset($articletype['name']) ? 'value="'.$articletype['name'].'"' : ''; ?>></div>
</div>

<table cellspacing="0" cellpadding="0" border="0" class="table">
	<thead>
		<tr>
			
			<th>Titre</th>
			<th>Create</th>
			<th>Read</th>
			<th>Update</th>
			<th>Delete</th>
			
	
		</tr> 
	</thead> 
	<tbody> 
	
		
		
		<tr> 
			
			<td>news</td>
			
			<td>
				<input type="hidden" value="0" name="crud[news][add]">
				<input type="checkbox" value="1" name="crud[news][add]">
			</td>
			<td>
				<input type="hidden" value="0" name="crud[news][list]">
				<input type="checkbox" value="1" name="crud[news][list]">
			</td>
			<td>
				<input type="hidden" value="0" name="crud[news][edit]">
				<input type="checkbox" value="1" name="crud[news][edit]">
			</td>
			<td>
				<input type="hidden" value="0" name="crud[news][erase]">
				<input type="checkbox" value="1" name="crud[news][erase]">
			</td>
		
		</tr>
		
		<tr> 
			
			<td>users</td>
			
			<td>
				<input type="hidden" value="0" name="crud[users][add]">
				<input type="checkbox" value="1" name="crud[users][add]">
			</td>
			<td>
				<input type="hidden" value="0" name="crud[users][list]">
				<input type="checkbox" value="1" name="crud[users][list]">
			</td>
			<td>
				<input type="hidden" value="0" name="crud[users][edit]">
				<input type="checkbox" value="1" name="crud[users][edit]">
			</td>
			<td>
				<input type="hidden" value="0" name="crud[users][erase]">
				<input type="checkbox" value="1" name="crud[users][erase]">
			</td>
		
		</tr>
		
		<tr> 
			
			<td>guilde</td>
			
			<td>
				<input type="hidden" value="0" name="crud[guilde][add]">
				<input type="checkbox" value="1" name="crud[guilde][add]">
			</td>
			<td>
				<input type="hidden" value="0" name="crud[guilde][list]">
				<input type="checkbox" value="1" name="crud[guilde][list]">
			</td>
			<td>
				<input type="hidden" value="0" name="crud[guilde][edit]">
				<input type="checkbox" value="1" name="crud[guilde][edit]">
			</td>
			<td>
				<input type="hidden" value="0" name="crud[guilde][erase]">
				<input type="checkbox" value="1" name="crud[guilde][erase]">
			</td>
		
		</tr>
		
	</tbody> 
			
</table>

<div class="row">
	<button type="submit" class="medium grey"><span>Valider</span></button>
</div>