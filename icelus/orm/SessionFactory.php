<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm;

use icelus\util\Files;

class SessionFactory 
{
	
	private static $instance;
	private $conf;
	private $session;	
	
	public static function instance() 
	{
		if (self::$instance == NULL)
			self::$instance = new self();
	
		return self::$instance;
	}
	
	public function configure($uri = NULL) 
	{
		$this->conf = Files::xmlLoad($uri);
		return $this;
	}

	public function getConf()
	{
		return $this->conf;
	}
	
	public function session() 
	{		
		try 
		{
			if ($this->session == NULL) 
			{
				
				$this->session = new \PDO(
					$this->conf->persistence->url,
					$this->conf->persistence->username,
					$this->conf->persistence->password
				);
				
				$this->session->setAttribute(\PDO::ATTR_PERSISTENT, false);
				$this->session->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			}		
		}
		catch (\PDOException $e) 
		{
			throw new \ErrorException($e->getMessage(), $e->getCode(), 0, $e->getFile(), $e->getLine());
		}
		
		return $this->session;		
	}
	
}
