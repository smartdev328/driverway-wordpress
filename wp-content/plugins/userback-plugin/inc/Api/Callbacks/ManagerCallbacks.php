<?php 
/**
 * @package  UserbackPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
	public function adminSectionManager()
	{
		echo 'On this page you can customize widget settings.';
	}
}