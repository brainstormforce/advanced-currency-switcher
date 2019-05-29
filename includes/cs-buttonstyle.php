<?php
?>
<form method="post">
<p class="cca-subheading">Select Type of Button:</p>


	<div class="cca-advance-option" id="hidden_div">
	<table class="form-table">
		<tr>
			<th><Label>Backgraound Color</Label></th>
			<td><input type="text" name="softlights-options[menu-color]" class="color-picker" id='color-picker-1' value="#ca4dfc" /></td>
		</tr>
		<tr>
			<th><Label>Hover Color</Label></th>
			<td><input type="text" name="softlights-options[menu-color]" class="color-picker" id='color-picker-1' value="#ca4deb" /></td>
		</tr>
		<tr>
			<th><Label>Height</Label></th>
			<td><input type="number" placeholder="30" value="30"></td>
		</tr>
		<tr>
			<th><Label>Padding</Label></th>
			<td><input type="number" placeholder="30" value="30"></td>
		</tr>
		<tr>
			<th><Label>Border</Label></th>
			<td><input type="number" placeholder="30" value="30"></td>
		</tr>
		<tr>
			<th><Label>Border-Radius</Label></th>
			<td><input type="number" placeholder="30" value="30"></td>
		</tr>
		<tr>
			<th><Label>Horizontal</Label></th>
			<td><input type="number" placeholder="30" value="30"></td>
		</tr>
		<tr>
				<th><Label>Vertical</Label></th>
				<td><input type="number" placeholder="30" value="30"></td>
		</tr>

	</table>
	</div>
	<button onClick="redirect()" class="bt button button-primary">Submit</button>
	</form>