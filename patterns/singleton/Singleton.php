<?php
namespace singleton;

class Singleton
{
	private static $_instance;

	/**
     * 禁止子类重载 construct() 构造方法
     */
    private final function __construct() {
        // 禁止 new
    }

    /**
     * 禁止子类重载 clone() 方法
     */
    private final function __clone() {
        // 禁止 clone
    }

	public static function getInstance()
	{
		if(!self::$_instance instanceof self){
			self::$_instance = new self;
		}
		return self::$_instance;
	}
}