<?php
require_once('auth.php');
include('include/config.php');

$trackingNo = $_GET['id'];
$query = "SELECT * FROM it_item WHERE trackingNo = '$trackingNo'";
$run = mysql_query($query);
$row = mysql_fetch_array($run);


?>

<form id="form_it_reg" class="appnitro"  method="post" action="updateitem-exe.php">
					<div class="form_description">
			<h2>Item View/Update</h2>
			<p>Details of registered item</p>
		</div>						
			<ul >
			
					<li id="li_13" >
		<label class="description" for="element_13">Brand </label>
		<div>
		<select class="element select medium" id="element_13" name="element_13"> 
			<option value="<?php echo $row['brand']; ?>" selected=""><?php echo $row['brand']; ?></option>
<option value="1" >Dell</option>
<option value="2" >Asus</option>
<option value="3" >HP</option>

		</select>
		</div> 
		</li>		<li id="li_1" >
		<label class="description" for="element_1">Model </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value="<?php echo $row['model']; ?>"/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Serial Number </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value="<?php echo $row['serialNumber']; ?>"/> 
		</div><p class="guidelines" id="guide_2"><small>Remove any "white space","-", etc.</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">RAM </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value="<?php echo $row['ram']; ?>"/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Processor </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value="<?php echo $row['processor']; ?>"/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Hard Drive </label>
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value="<?php echo $row['hardDrive']; ?>"/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Screen Size </label>
		<div>
			<input id="element_6" name="element_6" class="element text medium" type="text" maxlength="255" value="<?php echo $row['screenSize']; ?>"/> 
		</div> 
		</li>		<li id="li_14" >
		<label class="description" for="element_14">AC Adapter </label>
		<div>
		<select class="element select medium" id="element_14" name="element_14"> 
			<option value="<?php echo $row['acAdapter']; ?>" selected="selected"><?php echo $row['acAdapter']; ?></option>
<option value="Yes" >Yes</option>
<option value="No" >No</option>

		</select>
		</div> 
		</li>		<li id="li_15" >
		<label class="description" for="element_15">Battery </label>
		<div>
		<select class="element select medium" id="element_15" name="element_15"> 
			<option value="<?php echo $row['battery']; ?>" selected="selected"><?php echo $row['battery']; ?></option>
<option value="Yes" >Yes</option>
<option value="No" >No</option>

		</select>
		</div> 
		</li>		<li id="li_16" >
		<label class="description" for="element_16">Bag </label>
		<div>
		<select class="element select medium" id="element_16" name="element_16"> 
			<option value="<?php echo $row['bag']; ?>" selected="selected"><?php echo $row['bag']; ?></option>
<option value="Yes" >Yes</option>
<option value="No" >No</option>

		</select>
		</div> 
		</li>		<li id="li_17" >
		<label class="description" for="element_17">Power Status </label>
		<div>
		<select class="element select medium" id="element_17" name="element_17"> 
			<option value="<?php echo $row['powerStatus']; ?>" selected="selected"><?php echo $row['powerStatus']; ?></option>
<option value="Yes" >Yes</option>
<option value="No" >No</option>

		</select>
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Physical Condition </label>
		<div>
			<textarea id="element_7" name="element_7" class="element textarea medium"><?php echo $row['physicalCondition']; ?></textarea> 
		</div> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Problem Description </label>
		<div>
			<textarea id="element_8" name="element_8" class="element textarea medium"><?php echo $row['problemDescription']; ?></textarea> 
		</div> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Name </label>
		<span>
			<input id="element_9_1" name= "element_9_1" class="element text" maxlength="255" size="8" value="<?php echo $row['firstName']; ?>"/>
			<label>First</label>
		</span>
		<span>
			<input id="element_9_2" name= "element_9_2" class="element text" maxlength="255" size="14" value="<?php echo $row['lastName']; ?>"/>
			<label>Last</label>
		</span> 
		</li>		
			
			
		<li id="li_11" >
		<label class="description" for="element_11">Mobile Number </label>
		<div>
			<input id="element_11" name="element_11" class="element text medium" type="text" maxlength="255" value="<?php echo $row['mobile']; ?>"/> 
		</div> 
		</li>		<li id="li_12" >
		<label class="description" for="element_12">Email </label>
		<div>
			<input id="element_12" name="element_12" class="element text medium" type="text" maxlength="255" value="<?php echo $row['email']; ?>"/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="251222" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Update" />
		</li>
			</ul>
		</form>	
