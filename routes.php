<?

require_once($_SERVER ["DOCUMENT_ROOT"] . "/icelus/bootstrap/Application.php");

use Icelus\Bootstrap\Application;
use Icelus\Controller\Route\RouteImpl;

try 
{
	
	$conf = array(
		array("module" => "site", "error" => "/error"),
		array("module" => "rh", "error" => "/rh/error")
	);
	
	$application = Application::environment();
	$application->init($conf);
		
	$routeImpl = new RouteImpl();
	$routeImpl->intercept();	
	
} 
catch (ErrorException $exception) 
{
	$application->restoreError($exception);
} 
catch (Error $error) 
{
	$application->restoreFatalError($error);
}
