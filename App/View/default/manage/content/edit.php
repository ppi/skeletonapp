<div class="well editaccount" style="margin-bottom: 0; padding-bottom: 0;">
		
	<form class="form-horizontal" style="margin-bottom: 0;" action="" method="post" id="manage-form">
		<fieldset>
			<legend>Edit Your Talk</legend>
			<div class="control-group">
				<label class="control-label" for="talkTitle">Title</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="contentTitle" name="contentTitle" value="<?=$helper->escape($content->getTitle()); ?>">
					<span rel="contentTitle" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="talkAbstract">Content</label>
				<div class="controls">
					<textarea class="input-xlarge validate[required]" id="contentContent" name="contentContent"><?=$helper->escape($content->getContent()); ?></textarea>
					<span rel="contentContent" class="help-inline"></span>
					
				</div>
			</div>
			
			<div class="form-actions" style="margin: 0;">
				<button type="submit" class="btn btn-primary" id="confirm">Save changes</button>
				<button type="reset" class="btn">Cancel</button>
			</div>
		</fieldset>
	  </form>
		
</div>