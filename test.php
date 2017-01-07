	function fullshow_form() {
		$Torrent = $this->Torrent;
?>
		<table cellpadding="3" cellspacing="1" border="0" class="layout border slice" width="100%">
<?		if ($this->NewTorrent) { ?>
			<tr id="title_tr">
				<td class="label">Performance Title:</td>
				<td>
					<input type="text" id="title" name="title" size="60" value="<?=display_str($Torrent['Title']) ?>" />
					<p class="min_padding"></p>
				</td>
			</tr>
<?		} ?>
			<tr id="year_tr">
				<td class="label">Year Recorded:</td>
				<td><input type="text" id="year" name="year" size="5" value="<?=display_str($Torrent['Year']) ?>" /></td>
			</tr>
			<tr>
				<td class="label">Video Codec:</td>
				<td>
					<select name="format" onchange="Format()">
						<option value="">---</option>
<?
		foreach (Misc::display_array($this->VideoFormats) as $Format) {
			echo "\t\t\t\t\t\t<option value=\"$Format\"";
			if ($Format == $Torrent['Format']) {
				echo ' selected="selected"';
			}
			echo '>';
			echo $Format;
			echo "</option>\n";
		}
?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">Tags:</td>
				<td>
					<input type="text" id="tags" name="tags" size="60" value="<?=display_str($Torrent['TagList']) ?>"<? Users::has_autocomplete_enabled('other'); ?> />
				</td>
			</tr>
			<tr>
				<td class="label">Image (optional):</td>
				<td><input type="text" id="image" name="image" size="60" value="<?=display_str($Torrent['Image']) ?>"<?=$this->Disabled?> /></td>
			</tr>
			<tr>
				<td class="label">Description:</td>
				<td>
<?php new TEXTAREA_PREVIEW('album_desc', 'album_desc', display_str($Torrent['GroupDescription']), 60, 8); ?>
					<p class="min_padding">Contains information like the track listing, a review, a link to Discogs or MusicBrainz, etc.</p>
				</td>
			</tr>
<?		} ?>
			<tr>
				<td class="label">Release description (optional):</td>
				<td>
<?php new TEXTAREA_PREVIEW('release_desc', 'release_desc', display_str($Torrent['TorrentDescription']), 60, 8); ?>
					<p class="min_padding">Contains information like encoder settings. For analog rips, this frequently contains lineage information.</p>
				</td>
			</tr>
		</table>
<?
		TEXTAREA_PREVIEW::JavaScript(false);
	}//function fullshow_form
