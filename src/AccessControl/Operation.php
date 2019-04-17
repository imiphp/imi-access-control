<?php
namespace Imi\AC\AccessControl;

use Imi\App;

abstract class Operation
{
    /**
     * 创建操作权限
     *
     * @param string $name
     * @param string $code
     * @param string $description
     * @return void
     */
    public static function create($name, $code = null, $description = '')
    {
        return App::getBean('ACOperationService')->create($name, $code, $description);
    }

}