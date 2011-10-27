<div class="formbuilder_form_container">
<?php if($formBuilder['formDetails']['renderFormTag']) { ?>
<form id="formbuilder_form" name="<?php echo $formBuilder['formDetails']['formName']; ?>" action="<?php echo $formBuilder['formDetails']['formAction']; ?>" method="<?php echo $formBuilder['formDetails']['formMethod']; ?>">
<?php } ?>
<?php if(isset($formBuilder['formStructure']['fields']) == false) { ?>
		<p>Unable to find any formbuilder information.</p>
<?php } else { ?>
	<table class="formTable_<?php echo $formBuilder['formDetails']['formName']; ?>">
	<?php foreach($formBuilder['formStructure']['fields'] as $fieldName => $fieldOptions) {
			$fieldType = $fieldOptions['type'];
			$extraAttributes = '';
			// Go over the attributes and generate a HTMl like key="val" structure for our element
			foreach($fieldOptions['attributes'] as $attributeKey => $attributeValue) {
				$extraAttributes .= "$attributeKey =\"$attributeValue\"";
			}
			// Check if there is an error generated for this field, if so we display it
			if(array_key_exists($fieldName, $formBuilder['formErrors'])) {
			?>
			<tr><td>&nbsp;</td><td class="formError" style="color: #FF0000;"><?php echo $formBuilder['formErrors'][$fieldName]; ?></td></tr>		
			<?php
			}
			?>
			
			<tr id="formRow_<?php echo $fieldName; ?>">
				<td id="formLabel_<?php echo $fieldName; ?>" class="formLabel label" valign="top">
				<?php if($fieldType != 'submit' && $fieldType != 'button') { ?>
					<label for="<?php echo $fieldName; ?>"><?php echo $fieldOptions['label']; ?><?php echo $fieldOptions['required'] == true ? '<strong class="req">*</strong>' : ''; ?></label>
				<?php } ?>
				</td>
				<td id="formField_<?php echo $fieldName; ?>" class="formField field">
				<?php
				switch($fieldType) {
					case 'text': ?>
					<input class="formField_<?php echo $fieldName; ?>" type="text" name="<?php echo $fieldName; ?>" value="<?php echo $fieldOptions['value']; ?>" <?php echo $extraAttributes; ?> />						
					<?php break;
						
					case 'recaptcha': ?>
					<?php echo $fieldOptions['value']; ?>
					<?php break;
						
					case 'listbox': ?>
					<select class="formField_<?php echo $fieldName; ?>" multiple="" name="<?php echo $fieldName; ?>">
					<?php foreach($fieldOptions['options'] as $key => $val) { ?>
						<option value="<?php echo $key; ?>"><?php echo $val; ?></option> 
					<?php } ?>
					</select>					
					<?php break;

					case 'static': 
						echo $fieldOptions['value'];
						break;
					
					case 'button': ?>
					<input class="formField_<?php echo $fieldName; ?>" type="button" name="<?php echo $fieldName; ?>" value="<?php echo $fieldOptions['label']; ?>" <?php echo $extraAttributes; ?> />					
					<?php break;					 
					 
					case 'hidden': ?>
					<input class="formField_<?php echo $fieldName; ?>" type="hidden" name="<?php echo $fieldName; ?>" value="<?php echo $fieldOptions['value']; ?>" <?php echo $extraAttributes; ?> />
					<?php break;

					case 'dropdown': ?>
					<select class="formField_<?php echo $fieldName; ?>" name="<?php echo $fieldName; ?>" <?php echo $extraAttributes; ?>>
					<?php
					// May want to change this to html_options
					foreach($fieldOptions['options'] as $key => $val) {
						if($fieldOptions['value'] == $key || $fieldOptions['value'] == $val) { ?>
							<option selected="selected" value="<?php echo $key; ?>"><?php echo $val; ?></option>
						<?php } else {?>
							<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
						<?php }
					}
					?>
					</select>					
					<?php break;

					case 'password': ?>
					<input class="formField_<?php echo $fieldName; ?>" type="password" name="<?php echo $fieldName; ?>" value="<?php echo $fieldOptions['value']; ?>" <?php echo $extraAttributes; ?> />
					<?php break;

					case 'file': ?>
					<input class="formField_<?php echo $fieldName; ?>" type="file" name="<?php echo $fieldName; ?>" <?php echo $extraAttributes; ?> />
					<?php break;

					case 'submit': ?>
					<input class="formField_<?php echo $fieldName; ?>" type="submit" value="<?php echo $fieldOptions['label'] != '' ? $fieldOptions['label'] : $fieldOptions['value']; ?>" <?php echo $extraAttributes; ?> />
					<?php break;
						
					case 'radio': 
					foreach($fieldOptions['options'] as $key => $val) {
						echo $key; ?>: <input class="formField_<?php echo $fieldName; ?>" type="radio" name="<?php echo $fieldName; ?>" value="<?php echo $val; ?>" <?php echo $val == $fieldOptions['value'] ? 'checked="checked"' : '' ; ?> <?php echo $extraAttributes; ?> /> &nbsp;&nbsp
					<?php 
					}	
						
					break;

					case 'checkbox': 
					foreach($fieldOptions['options'] as $key => $val) {
						echo $key; ?>: <input class="formField_<?php echo $fieldName; ?>" type="checkbox" name="<?php echo $fieldName; ?>" value="<?php echo $val; ?>" <?php echo $extraAttributes; ?> /> &nbsp;&nbsp
					<?php
					}					
					break;	
										
					case 'textarea': ?>
					<textarea class="formField_<?php echo $fieldName; ?>" name="<?php echo $fieldName; ?>" <?php echo $extraAttributes; ?> ><?php echo $fieldOptions['value']; ?></textarea>
					<?php break;	
												
					default:
						throw new PPI_Exception('Invalid Field Type: ' . $fieldType);
						break;						
				}
				?>
				
				</td>
				<td class="status"></td>
			</tr>
		<?php } ?>
		</table>
<?php } ?>
<?php if($formBuilder['formDetails']['renderFormTag'] == true) { ?>	
</form>
<?php } ?>
</div>

<?php // {* ----- Tiny MCE ------ *} ?>
<?php if($formBuilder['formDetails']['renderTinyMCE'] == true) { ?>
<script type="text/javascript" src="<?php echo $baseUrl; ?>scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple",
	theme_simple_toolbar_location : "top"
});
</script>
<?php } ?>


<?php
// ------ jQuery Validation -------
if($formBuilder['formDetails']['renderJSValidation'] == true) {
	include_once($viewDir . 'formbuilder/validate.php');
}
