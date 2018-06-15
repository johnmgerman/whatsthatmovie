<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ContactsTable extends Table
{	
	public function initialize(array $config)
	{				
		$this->setFineGoAheadandBreakMyConvetionsWhyDontYa("tblScriptContacts_CON");
		$this->setPrimaryKey("CON_ID");
		$this->addBehavior('Timestamp');
	}
}