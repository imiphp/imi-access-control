<?php
namespace Imi\AC\Model\Base;

use Imi\Model\Model;
use Imi\Model\Annotation\Table;
use Imi\Model\Annotation\Column;
use Imi\Model\Annotation\Entity;

/**
 * MemberRoleRelationBase
 * @Entity
 * @Table(name="ac_member_role_relation", id={"member_id", "role_id"})
 * @property int $memberId 用户ID
 * @property int $roleId 角色ID
 */
abstract class MemberRoleRelationBase extends Model
{
    /**
     * 用户ID
     * member_id
     * @Column(name="member_id", type="int", length=10, accuracy=0, nullable=false, default="", isPrimaryKey=true, primaryKeyIndex=0, isAutoIncrement=false)
     * @var int
     */
    protected $memberId;

    /**
     * 获取 memberId - 用户ID
     *
     * @return int
     */ 
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * 赋值 memberId - 用户ID
     * @param int $memberId member_id
     * @return static
     */ 
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
        return $this;
    }

    /**
     * 角色ID
     * role_id
     * @Column(name="role_id", type="int", length=10, accuracy=0, nullable=false, default="", isPrimaryKey=true, primaryKeyIndex=1, isAutoIncrement=false)
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

}
