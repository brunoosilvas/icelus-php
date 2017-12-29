<?php

namespace site\model\dao;

use icelus\orm\model\Entity;
use icelus\orm\type\Integer;
use icelus\orm\type\Strings;

class Classificacoes extends Entity
{

	private $id;
	private $classificao;
	
	public function setId(\Integer $id) 
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setClassificao(\Strings $classificao)
	{
		$this->classificao = $classificao;
	}

	public function getClassificao()
	{
		return $this->classificao;
	}
	
}