<?php
namespace Imi\AC\Model\Base;

use Imi\Model\Model;
use Imi\Model\Annotation\Column;

/**
 * MemberOperationRelationBase
 * @property int $memberId 用户ID
 * @property int $operationId 操作ID
 */
abstract class MemberOperationRelationBase extends Model
{
    /**
     * member_id - 用户ID
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
