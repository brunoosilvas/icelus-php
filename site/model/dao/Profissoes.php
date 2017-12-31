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
	 * @Column({"name" : "id", "type" : "icelus\\orm\\type\\Integer", "nullable" : false})
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
	 * @Column({"name" : "perfil", "type" : "site\\model\\dao\\Perfis", "nullable" : false, "fk" : true})
	 */
	public function getPerfis()
	{
		return $this->perfis;
	}

	public function setPerfis(\Perfis $perfis) 
	{
		$this->perfis = $perfis;
	}
	
}