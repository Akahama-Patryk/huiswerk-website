<?php
	
	/**
	 * Class RedirectHandler
	 */
	class RedirectHandler
	{
		/**
		 * @param $target
		 *  string Target url.
		 *
		 *  Redirects to target.
		 */
		static function HTTP_301($target)
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: {$target}");
			exit();
		}
	}