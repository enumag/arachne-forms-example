<?php

namespace App\Router;

use Nette\Application\IRouter;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;

class RouterFactory
{

	/**
	 * @return IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList();
		$router[] = $frontRouter = new RouteList('Front');
		$frontRouter[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}

}
