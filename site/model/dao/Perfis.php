<?php

namespace site\model\dao;

use icelus\orm\model\Entity;
use icelus\orm\type\IInteger;
use icelus\orm\type\IString;

/**
 * @Table({name : "perfis", schema = "icelus", view = false})
 */
class Perfis extends Entity
{
	private $id;
	private $perfil;

	/**
	 * @Column({"name" : "id", "type" : "icelus\\orm\\type\\Integer", "nullable" : false})
	 */
	public function getId()
	{
		return $this->id;
	}
	
	public function setId(IInteger $id) 
	{
		$this->id = $id;
	}

	/**
	 * @Column({"name" : "perfil", "type" : "icelus\\orm\\type\\String", "nullable" : false})
	 */
	public function setPerfil(IString $perfil)
	{
		$this->perfil = $perfil;
	}

	public function getPerfil()
	{
		return $this->perfil;
	}
	
}