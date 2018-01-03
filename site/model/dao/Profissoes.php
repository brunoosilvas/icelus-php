<?php

namespace site\model\dao;

use icelus\orm\model\Entity;
use icelus\orm\type\Integer;
use icelus\orm\type\Strings;

use site\model\dao\Perfis;

/**
 * @Table({name : "profissoes", schema = "icelus", view = false})
 */
class Profissoes extends Entity
{

	private $id;
	private $profissao;
	private $perfis;

	/**
	 * @Column({"id" : true, "name" : "id", "nullable" : false, "type" : "icelus\\orm\\type\\Integer"})
	 */
	public function getId()
	{
		return $this->id;
	}
	
	public function setId(\Integer $id) 
	{
		$this->id = $id;
	}

	/**
	 * @Column({"name" : "profissao", "type" : "icelus\\orm\\type\\Strings", "nullable" : false})
	 */
	public function getProfissao()
	{
		return $this->profissao;
	}

	public function setProfissao(\Strings $profissao)
	{
		$this->profissao = $profissao;
	}

	/**
	 * @Foreign({"name" : "perfil", "nullable" : false, "type" : "site\\model\\dao\\Perfis"})
	 */
	public function getPerfis()
	{
		return $this->perfis;
	}

	public function setPerfis(Perfis $perfis) 
	{
		$this->perfis = $perfis;
	}
	
}