<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\bootstrap;

use icelus\http\Request;
use icelus\http\Response;

class Application 
{
    private static $instance;
    
    private $conf;
    private $timeScriptStart;
    private $timeScriptEnd;
    private $timeScriptElapsed;	
    
    /**
     * @return Instance of class Application
     */
    public static function environment() 
    {
        if (self::$instance == null)
        {
            self::$instance = new self();
        }
        
        return self::$instance;
    }

    /**
     * Start initial process application
     * 
     * @return void
     */
    public function init($conf) 
    {	
        $this->conf = $conf;		
        $this->registerTimeExecutionOfScript();
        $this->registerAutoloadClass();
        $this->notifyError();
        
        $this->bufferPageStart();
    }

    /**
     * Control de flush page
     * 
     * @return void	 
     */
    public function bufferPageStart()
    {
        ob_start();
    }

    /**
     * Control de flush page
     * 
     * @return void	 
     */
    public function bufferPageEnd()
    {
        ob_end_clean();
    }
    
    /**
     * @return string
     */
    public static function rootDir() 
    {
        return $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR;
    }
    
    /**
     * Register time execution of script
     * 
     * @return void
     */
    private function registerTimeExecutionOfScript() 
    {
        list($usec, $sec) = explode(' ', microtime());
        $this->timeScriptStart = ((float) $sec + (float) $usec);		
    }
    
    /**
     * Register autoload class of application
     * 
     * @return void
     */
    private function registerAutoloadClass() 
    {
        spl_autoload_register(array($this, "autoloadClass"));		
    }
    
    /**
     * Handler autoload class of application
     * 
     * @param string $namespace
     * @return void
     */
    public function autoloadClass($namespace) 
    {
        if (!class_exists($namespace) && !interface_exists($namespace))	
            $this->loadClass($namespace);
    }	
    
    /**
     * Include class of application
     * 
     * @param string $path 
     * @param string $className 
     * @return void
     */
    
    private function loadClass($namespace) 
    {
        require_once(str_replace("\\", "/", $this->rootDir() . $namespace . ".php"));
    }
    
    /**
     * Register notification error application
     * 
     * @return void
     */
    private function notifyError() 
    {	
        set_error_handler(array($this, "errorHandler"));
    }
    
    public function restoreError(\ErrorException $exception) 
    {
        $this->bufferPageEnd();
        
        /**
         * verify cookie special char in utf8
         */
        $time = time() + (60 * 60 * 24);
        setcookie("error_date", date('Y-m-d H:i:s'), $time, '/');
        setcookie("error_type", $exception->getCode(), $time, '/');
        setcookie("error_message", $exception->getMessage(), $time, '/');
        setcookie("error_line", $exception->getLine(), $time, '/');
        setcookie("error_file", $exception->getFile(), $time, '/');

        Request::redirect($this->uriError(), "");
    }
    
    public function restoreFatalError(\Error $error)
    {
        $this->bufferPageEnd();
        
        $time = time() + (60 * 60 * 24);
        setcookie("error_date", date('Y-m-d H:i:s'), $time, '/');
        setcookie("error_type", $error->getCode(), $time, '/');
        setcookie("error_message", $error->getMessage(), $time, '/');
        setcookie("error_line", $error->getLine(), $time, '/');
        setcookie("error_file", $error->getFile(), $time, '/');
                
        Request::redirect($this->uriError(), "");
    }
    
    private function uriError()
    {
        foreach ($this->conf as $extra => $value) 
        {
            if ($value["module"] == $_REQUEST["module"])
            {
                return $value["error"];
            }
        }
        
        return "/error";
    }
    
    /**
     * Handler default send error applicaiton
     * 
     * @param integer $error
     * @param string $message
     * @param string $file
     * @param string $errLine
     * @throws \ErrorException
     */
    public function errorHandler($errorType, $errorMessage, $errorFile, $errorLine, $errorContext = null)
    {
        throw new \ErrorException($errorMessage, 0, $errorType, $errorFile, $errorLine);
    }
    
    /**
     * Time elipsed script execution
     * 
     * @return double
     */
    public function timeElapsedScriptExecution() 
    {
        list($usec, $sec) = explode(' ', microtime());
        $this->timeScriptEnd = ((float) $sec + (float) $usec);
        $this->timeScriptElapsed = round($this->timeScriptEnd - $this->timeScriptStart, 4);
        
        return $this->timeScriptElapsed;
    }
}