<?php 
// Year Function
function year(){
?>
<div class="row">
    <div class="input-field col s12">
        <select name="year" id="year" required>
	        <option value="" selected disabled>-- select year --</option>
	        <?php
		        $y=(int)date('Y');
		    ?>
		    <option value="<?php echo $y;?>"><?php echo $y;?></option>
			<?php
			$y--;
		    for(; $y>'2014'; $y--):
	        ?>
	        <option value="<?php echo $y;?>"><?php echo $y;?></option>
	        <?php endfor; ?>
        </select>
        <label for="year">Select Year:</label>
    </div>
</div>
<?php } ?>

<?php 
// Batch Function
function batch(){
?>
<div class="row">
	<div class="input-field col s12">
		<select name="batch" id="batch" required>
			<option value="" selected disabled>-- select batch --</option>
			<?php
				$y=(int)date('Y');
			?>
			<option value="<?php echo $y;?>"><?php echo $y;?></option>
			<?php
				$y--;
				for(; $y>'2015'; $y--)
				{
			?>
			<option value="<?php echo $y;?>"><?php echo $y;?></option>
			<?php }?>
		</select>
		<label for="batch">Select Batch:</label>
	</div>
</div>
<?php } ?>