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
use icelus\orm\Session;

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
	
	public function configure($uri) 
	{
		$this->conf = Files::xmlLoad($uri);
		return $this;
	}

	public function getConf()
	{
		return $this->conf;
	}
	
	public function build() 
	{		
		try 
		{
			if ($this->session == NULL) 
			{
				
				$dbc = new \PDO($this->conf->persistence->url->__toString(),
					$this->conf->persistence->username->__toString(),
					$this->conf->persistence->password->__toString()
				);

				$dbc->setAttribute(\PDO::ATTR_PERSISTENT, false);
				$dbc->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

				$dialect = $this->conf->dialect->__toString();
				$dialect = new $dialect;

				$this->session = new Session($dbc, $dialect);
			}		
		}
		catch (\PDOException $e) 
		{
			throw new \ErrorException($e->getMessage(), $e->getCode(), 0, $e->getFile(), $e->getLine());
		}

		return $this;
	}

	public function getSession()
	{
		return $this->session;
	}

}
