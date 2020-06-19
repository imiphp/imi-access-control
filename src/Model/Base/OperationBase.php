<?php
namespace Imi\AC\Model\Base;

use Imi\Model\Model;
use Imi\Model\Annotation\Table;
use Imi\Model\Annotation\Column;
use Imi\Model\Annotation\Entity;

/**
 * OperationBase
 * @Entity
 * @Table(name="ac_operation", id={"id"})
 * @property int $id 
 * @property int $parentId 父级ID，顶级为0
 * @property int $type 类型，0菜单 1api
 * @property int $index 排序，越小越靠前
 * @property string $code 操作代码
 * @property string $name 操作名称
 * @property string $title 菜单名称
 * @property string $icon 字体图标
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
     * 父级ID，顶级为0
     * parent_id
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
     * type，默认0
     * type
     * @Column(name="type", type="int", length=10, accuracy=0, nullable=false, default="0", isPrimaryKey=false, primaryKeyIndex=-1, isAutoIncrement=false)
     * @var int
     */
    protected $type;

    /**
     * 获取 type - 类型，默认0
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 赋值 type - 类型，默认0
     * @param int $type type
     * @return static
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * 排序，越小越靠前
     * index
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
     * 操作代码
     * code
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
     * 操作名称
     * name
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
     * 菜单名称
     * title
     * @Column(name="title", type="varchar", length=32, accuracy=0, nullable=false, default="", isPrimaryKey=false, primaryKeyIndex=-1, isAutoIncrement=false)
     * @var string
     */
    protected $title;

    /**
     * 获取 title - 菜单名称
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * 赋值 title - 菜单名称
     * @param string $title title
     * @return static
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * 字体图标
     * icon
     * @Column(name="icon", type="varchar", length=32, accuracy=0, nullable=false, default="", isPrimaryKey=false, primaryKeyIndex=-1, isAutoIncrement=false)
     * @var string
     */
    protected $icon;

    /**
     * 获取 icon - 字体图标
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * 赋值 icon - 字体图标
     * @param string $icon icon
     * @return static
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * 操作介绍
     * description
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
