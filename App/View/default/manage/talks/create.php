<div class="well">
	<form class="form-horizontal" style="margin-bottom: 0;" action="" method="post" id="manage-form">
		<fieldset>
			<legend>Create Your Talk</legend>
			<div class="control-group">
				<label class="control-label" for="talkTitle">Title</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="talkTitle" name="talkTitle">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="talkDur<?=$talkDurations[0]; ?>">Duration (mins)</label>
				<div class="controls">
					<?php foreach($talkDurations as $val): ?>
					<label class="radio inline">
						<input type="radio" name="talkDuration" id="talkDur<?=$val; ?>" value="<?=$val; ?>" checked=""><?=$val; ?>
					</label>
					<?php endforeach; ?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="talkLevelBeginner">Level</label>
				<div class="controls">
					<?php foreach(array('Beginner', 'Intermediate', 'Advanced') as $val): ?>
					<label class="radio inline">
						<input type="radio" name="talkLevel" id="talkLevel<?=$val; ?>" value="<?=$val; ?>" checked=""><?=$val; ?>
					</label>
					<?php endforeach; ?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="talkSlidesUrl">Slides Url</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="talkSlidesUrl" name="talkSlidesUrl">
				</div>
			</div>
			
			<hr>
			
			<div class="control-group">
				<label class="control-label" for="talkAbstract">Abstract</label>
				<div class="controls">
					<textarea class="input-xlarge validate[required]" id="talkAbstract" name="talkAbstract"></textarea>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="talkRemark">Remarks</label>
				<div class="controls">
					<textarea class="input-xlarge" id="talkRemark" name="talkRemark"></textarea>
				</div>
			</div>
			
			<div class="form-actions" style="margin: 0;">
				<button type="submit" class="btn btn-primary" id="confirm">Save changes</button>
				<button type="reset" class="btn">Cancel</button>
			</div>
		</fieldset>
  </form>
</div>