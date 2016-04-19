<?php

function add_note($id, $title, $text)
	{
		$con = new MongoClient();
		$notes = $con-> db->notes;
		$note = array("id" => $id,
					  "title" => $title,
					  "text" => $text);
		$notes->insert($note);
	}
	function remove_note($_id)
	{
		$con = new MongoClient();
		$notes = $con-> db->notes;
		$info = array("_id" => new MongoId($_id));
		$notes->remove($info, array('justOne' => true));
	}
	function update_note($_id, $title, $text)
	{
		$con = new MongoClient();
		$notes = $con-> db->notes;
		$old = array("_id" => new MongoId($_id));
		$new = array("title" => $title, "text" => $text);
		$notes->update($old, array('$set' => $new), array("upsert" => true));
	}

?>