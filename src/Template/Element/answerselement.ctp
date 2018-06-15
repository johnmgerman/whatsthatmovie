<?php

/*===========================================================

Author: John German

Description: .

Updated: 
				 
============================================================*/

////echo $this->element('answerselement', array('params' => $params));
if (!empty($params['answer_id1'])) {
	$answer_id1 = "";
	$answer_id2 = "";
	$answer_id3 = "";
	$answer_id4 = "";

	if (!empty($params['answer_id1'])) {
		$answer_id1 = $params['answer_id1'];
	}

	if (!empty($params['answer_id2'])) {
		$answer_id2 = $params['answer_id2'];
	}

	if (!empty($params['answer_id3'])) {
		$answer_id3 = $params['answer_id3'];
	}

	if (!empty($params['answer_id4'])) {
		$answer_id4 = $params['answer_id4'];
	}
?>

	<li class="tabs-1" data-tab-name="profile"><span class="tabs-text" id="answers_<?= $answer_id1 ?>"><?= $answer_id1 ?></span></li>
	<li class="tabs-2" data-tab-name="resume"><span class="tabs-text" id="answers_<?= $answer_id2 ?>"><?= $answer_id2 ?></span></li>
	<li class="tabs-3" data-tab-name="portfolio"><span class="tabs-text" id="answers_<?= $answer_id3 ?>"><?= $answer_id3 ?></span></li>             
	<li class="tabs-4" data-tab-name="contact"><span class="tabs-text" id="answers_<?= $answer_id4 ?>"><?= $answer_id4 ?></span></li>
<?php

}

?>
