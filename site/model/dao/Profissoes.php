<?php

namespace Site\Model\Dao;

use Icelus\Orm\Model\Entity;
use Icelus\Orm\Type\Integer;
use Icelus\Orm\Type\Strings;

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