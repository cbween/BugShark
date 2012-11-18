<form action="<?php echo base_url(); ?>sitemanager/addsite" method="post" class="form">
	<div class="formRow">
		<label>Title</label>
		<input type="text" id="title" class="textInput" name="title" placeholder="" value="" />
	</div>
	<div class="formRow">
		<label>Site URL</label>
		<input type="text" id="url" class="textInput" name="url" placeholder="http://" value="" />
	</div>
	<div class="formRow">
		<label>Testing Starts:</label>
		<input type="text" id="starts[date]" class="textInput datepicker dateDate" name="starts[date]" placeholder="" value="" />
		<input type="text" id="starts[hour]" class="textInput dateHour" name="starts[hour]" placeholder="4" value="" />:<input type="text" id="starts[min]" class="textInput dateMin" name="starts[min]" placeholder="30" value="" />
	</div>
	<div class="formRow">
		<label>Testing Ends</label>
		<input type="text" id="ends[date]" class="textInput datepicker dateDate" name="ends[date]" placeholder="" value="" />
		<input type="text" id="ends[hour]" class="textInput dateHour" name="ends[hour]" placeholder="4" value="" />:<input type="text" id="ends[min]" class="textInput dateMin" name="ends[min]" placeholder="30" value="" />
	</div>
	<div class="formRow">
		<label>Bounty</label>
		$<input type="text" id="bounty" class="textInput" name="bounty" placeholder="10.00" value="" />
	</div>
	<div class="formRow">
		<input type="submit" id="submit" class="submit" name="register" value="Register" />
	</div>
</form>