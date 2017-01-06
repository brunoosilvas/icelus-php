<?php

namespace site\model\Dao;

use icelus\orm\model\Entity;
use icelus\orm\type\Integer;
use icelus\orm\type\Strings;

class Profissoes extends Entity
{

	private $id;
	private $profissao;
	
	public function setId(Integer $id) 
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setProfissao(Strings $profissao)
	{
		$this->profissao = $profissao;
	}

	public function getProfissao()
	{
		return $this->profissao;
	}
	
}