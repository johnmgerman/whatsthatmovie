<?php
	namespace App\Controller\Component;

	use Cake\Controller\Component;

	class AnswersComponent extends Component
	{
		private $answer_id1;
		private $answer_id2;
		private $answer_id3;
		private $answer_id4;
		
		public function display($params)
		{
			$answer_id1 = "";
			$answer_id2 = "";
			$answer_id3 = "";
			$answer_id4 = "";
			
			if (!empty($params[0])) {
				$answer_id1 = $params[0];
			}

			if (!empty($params[1])) {
				$answer_id2 = $params[1];
			}

			if (!empty($params[2])) {
				$answer_id3 = $params[2];
			}

			if (!empty($params[3])) {
				$answer_id4 = $params[3];
			}
			
			return array('answer_id1' => $answer_id1,
								   'answer_id2' => $answer_id2,
								   'answer_id3' => $answer_id3,
								   'answer_id4' => $answer_id4);
		}
	}
?>