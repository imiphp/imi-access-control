<?php
namespace Imi\AC\Model\Base;

use Imi\Model\Model;
use Imi\Model\Annotation\Column;

/**
 * RoleOperationRelationBase
 * @property int $roleId 角色ID
 * @property int $operationId 操作ID
 */
abstract class RoleOperationRelationBase extends Model
{
    /**
     * role_id - 角色ID
     * @Column(name="role_id", type="int", length=10, accuracy=0, nullable=false, default="", isPrimaryKey=true, primaryKeyIndex=0, isAutoIncrement=false)
     * @var int
     */
    protected $roleId;

    /**
     * 获取 roleId - 角色ID
     *
     * @return int
     */ 
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * 赋值 roleId - 角色ID
     * @param int $roleId role_id
     * @return static
     */ 
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
        return $this;
    }

    /**
     * operation_id - 操作ID
     * @Column(name="operation_id", type="int", length=10, accuracy=0, nullable=false, default="", isPrimaryKey=true, primaryKeyIndex=1, isAutoIncrement=false)
     * @var int
     */
    protected $operationId;

    /**
     * 获取 operationId - 操作ID
     *
     * @return int
     */ 
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * 赋值 operationId - 操作ID
     * @param int $operationId operation_id
     * @return static
     */ 
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;
        return $this;
    }

}
