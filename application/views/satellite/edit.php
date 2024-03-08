<div class="container" id="edit_satellite_dialog">
	<form>

	<input type="hidden" name="id" value="<?php echo $satellite->id; ?>">
		<div class = "row">
			<div class="mb-3 col-md-6">
				<label for="nameInput">Satellite name</label>
				<input type="text" class="form-control" name="nameInput" id="nameInput" aria-describedby="nameInputHelp" value="<?php if(set_value('band') != "") { echo set_value('band'); } else { echo $satellite->name; } ?>" required>
				<small id="nameInputHelp" class="form-text text-muted">Satellite name</small>
			</div>
			<div class="mb-3 col-md-6">
				<label for="exportNameInput">Export name</label>
				<input type="text" class="form-control" name="exportNameInput" id="exportNameInput" aria-describedby="exportNameInputHelp" value="<?php if(set_value('band') != "") { echo set_value('band'); } else { echo $satellite->exportname; } ?>" required>
				<small id="exportNameInputHelp" class="form-text text-muted">If external services uses another name for the satellite, like LoTW</small>
			</div>
		</div>
		<div class = "row">
			<div class="mb-3 col-md-6">
				<label for="orbit">Orbit</label>
				<input type="text" class="form-control" name="orbit" id="orbit" aria-describedby="orbitHelp" value="<?php if(set_value('band') != "") { echo set_value('band'); } else { echo $satellite->orbit; } ?>" required>
				<small id="sorbitHelp" class="form-text text-muted">Enter which orbit the satellite has (LEO, MEO, GEO)</small>
			</div>
		</div>

		<button type="button" onclick="saveUpdatedSatellite(this.form);" class="btn btn-sm btn-primary"><i class="fas fa-plus-square"></i> Save satellite</button>

		</form>
<br /><br />
<div class="table-responsive">

<table style="width:100%" class="sattable table table-sm table-striped">
		<thead>
			<tr>
				<th style="text-align: center; vertical-align: middle;">Name</th>
				<th style="text-align: center; vertical-align: middle;">Uplink mode</th>
				<th style="text-align: center; vertical-align: middle;">Uplink frequency</th>
				<th style="text-align: center; vertical-align: middle;">Downlink mode</th>
				<th style="text-align: center; vertical-align: middle;">Downlink frequency</th>
				<th style="text-align: center; vertical-align: middle;">Edit</th>
				<th style="text-align: center; vertical-align: middle;">Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($satmodes as $mode) { ?>
			<tr>
				<td style="text-align: center; vertical-align: middle;" class="satmode_<?php echo $mode->id ?>"><?php echo $mode->name ?></td>
				<td style="text-align: center; vertical-align: middle;"><?php echo $mode->uplink_mode ?></td>
				<td style="text-align: center; vertical-align: middle;"><?php echo $mode->uplink_freq ?></td>
				<td style="text-align: center; vertical-align: middle;"><?php echo $mode->downlink_mode ?></td>
				<td style="text-align: center; vertical-align: middle;"><?php echo $mode->downlink_freq ?></td>
				<td style="text-align: center; vertical-align: middle;"><button onclick="editSatmode(<?php echo $mode->id ?>)" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></i></button></td>
				<td style="text-align: center; vertical-align: middle;"><button onclick="deleteSatmode('<?php echo $mode->id . '\',\'' . $mode->name ?>')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></td>
			</tr>

			<?php } ?>
		</tbody>
	<table>

</div>
</div>
