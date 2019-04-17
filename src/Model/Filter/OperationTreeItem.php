<?php
namespace Imi\AC\Model\Filter;

use Imi\AC\Model\Operation;
use Imi\Model\Annotation\Table;
use Imi\Model\Annotation\Column;
use Imi\Model\Annotation\Entity;
use Imi\Config\Annotation\ConfigValue;

/**
 * OperationTreeItem
 * @Entity
 * @Table(name="ac_operation", id={"id"}, dbPoolName=@ConfigValue("@app.ac.dbPoolname"))
 */
class OperationTreeItem extends Operation
{
    /**
     * 子操作列表
     * 
     * @Column(virtual=true)
     *
     * @var \Imi\AC\Model\Filter\OperationTreeItem[]
     */
    protected $children = [];

    /**
     * Get 子操作列表
     *
     * @return  \Imi\AC\Model\Filter\OperationTreeItem[]
     */ 
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set 子操作列表
     *
     * @param  \Imi\AC\Model\Filter\OperationTreeItem[]  $children  子操作列表
     *
     * @return  self
     */ 
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

}