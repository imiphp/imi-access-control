<?php
namespace Imi\AC\Model\Base;

use Imi\Model\Model;
use Imi\Model\Annotation\Column;

/**
 * OperationBase
 * @property int $id 
 * @property int $parentId 父级ID，顶级为0
 * @property int $index 排序，越小越靠前
 * @property string $code 操作代码
 * @property string $name 操作名称
 * @property string $description 操作介绍
 */
abstract class OperationBase extends Model
{
    /**
     * id
     * @Column(name="id", type="int", length=10, accuracy=0, nullable=false, default="", isPrimaryKey=true, primaryKeyIndex=0, isAutoIncrement=true)
     * @var int
     */
    protected $id;

    /**
     * 获取 id
     *
     * @return int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * 赋值 id
     * @param int $id id
     * @return static
     */ 
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * parent_id - 父级ID，顶级为0
     * @Column(name="parent_id", type="int", length=10, accuracy=0, nullable=false, default="0", isPrimaryKey=false, primaryKeyIndex=-1, isAutoIncrement=false)
     * @var int
     */
    protected $parentId;

    /**
     * 获取 parentId - 父级ID，顶级为0
     *
     * @return int
     */ 
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * 赋值 parentId - 父级ID，顶级为0
     * @param int $parentId parent_id
     * @return static
     */ 
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * index - 排序，越小越靠前
     * @Column(name="index", type="tinyint", length=3, accuracy=0, nullable=false, default="0", isPrimaryKey=false, primaryKeyIndex=-1, isAutoIncrement=false)
     * @var int
     */
    protected $index;

    /**
     * 获取 index - 排序，越小越靠前
     *
     * @return int
     */ 
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * 赋值 index - 排序，越小越靠前
     * @param int $index index
     * @return static
     */ 
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * code - 操作代码
     * @Column(name="code", type="varchar", length=32, accuracy=0, nullable=false, default="", isPrimaryKey=false, primaryKeyIndex=-1, isAutoIncrement=false)
     * @var string
     */
    protected $code;

    /**
     * 获取 code - 操作代码
     *
     * @return string
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * 赋值 code - 操作代码
     * @param string $code code
     * @return static
     */ 
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * name - 操作名称
     * @Column(name="name", type="varchar", length=32, accuracy=0, nullable=false, default="", isPrimaryKey=false, primaryKeyIndex=-1, isAutoIncrement=false)
     * @var string
     */
    protected $name;

    /**
     * 获取 name - 操作名称
     *
     * @return string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * 赋值 name - 操作名称
     * @param string $name name
     * @return static
     */ 
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * description - 操作介绍
     * @Column(name="description", type="text", length=0, accuracy=0, nullable=false, default="", isPrimaryKey=false, primaryKeyIndex=-1, isAutoIncrement=false)
     * @var string
     */
    protected $description;

    /**
     * 获取 description - 操作介绍
     *
     * @return string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * 赋值 description - 操作介绍
     * @param string $description description
     * @return static
     */ 
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

}
