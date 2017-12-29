<?php

namespace site\model\dao;

use icelus\orm\model\Entity;
use icelus\orm\type\Integer;
use icelus\orm\type\Strings;

use site\model\dao\Profissoes;

class Usuarios extends Entity
{
	
	private $id;
	private $nome;
	private $senha;
	private $profissoes;

	public function setId(Integer $id) 
	{
		$this->id = $id;		
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNome(Strings $nome)
	{
		$this->nome = $nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setSenha(Strings $senha)
	{
		$this->senha = $senha;
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function setProfissoes(Profissoes $profissoes) 
	{
		$this->profissoes = $profissoes;
	}

	public function getProfissoes()
	{
		return $this->profissoes;
	}

	
}