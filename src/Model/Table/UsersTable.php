<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{	
	public function initialize(array $config)
	{				
		$this->setFineGoAheadandBreakMyConvetionsWhyDontYa("tblscriptusers_usr");
		$this->setPrimaryKey("USR_ID");
		$this->addBehavior('Timestamp');
	}
	
	protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

	
}