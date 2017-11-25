<?php namespace DAOS;
	class SingletonAbstractDao
	{    /// CLASS LISTACERVEZA EXTENDS SINGLETONABSTRACTDAO IMPLEMENTS IDAO
			private static $instance = array();
			
			public static function getInstance()
			{
				if(empty(self::$instance[static::class]))
				{
					self::$instance[static::class] = new static();
				}
				return self::$instance[static::class];
			}
			
			public function __clone()
			{
				trigger_error('No se puede clonar este objeto', E_USER_ERROR);
			}
	}
?>