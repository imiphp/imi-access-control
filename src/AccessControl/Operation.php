<?php
namespace Imi\AC\AccessControl;

use Imi\App;

abstract class Operation
{
    /**
     * 创建操作权限
     *
     * @param string $name
     * @param string|null $code
     * @param int $parentId
     * @param int $type
     * @param int $index
     * @param string $title
     * @param string $icon
     * @param string $description
     * @return \Imi\AC\Model\Operation
     */
    public static function create($name, $code = null, $parentId = 0, $type = 0, $index = 0, $title = '', $icon = '',$description = '')
    {
        return App::getBean('ACOperationService')->create($name, $code, $parentId, $type, $index, $title, $icon, $description);
    }

}