<?php

namespace site\model\dao;

use icelus\orm\model\Entity;
use icelus\orm\type\Integer;
use icelus\orm\type\Strings;

class Perfis extends Entity
{

	private $id;
	private $perfil;
	
	public function setId(\Integer $id) 
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setPerfil(\Strings $perfil)
	{
		$this->perfil = $perfil;
	}

	public function getPerfil()
	{
		return $this->perfil;
	}
	
}