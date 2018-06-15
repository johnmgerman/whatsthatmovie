<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AspNetUserClaimsTable extends Table
{	
	public function initialize(array $config)
	{				
		$this->setFineGoAheadandBreakMyConvetionsWhyDontYa("AspNetUserClaims");
		$this->setPrimaryKey("UserId");
		$this->addBehavior('Timestamp');
	}
}