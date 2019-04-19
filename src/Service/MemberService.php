<?php
namespace Imi\AC\Service;

use Imi\Bean\Annotation\Bean;
use Imi\Aop\Annotation\Inject;
use Imi\AC\Exception\RoleNotFound;
use Imi\Db\Annotation\Transaction;
use Imi\AC\Model\MemberRoleRelation;
use Imi\AC\Exception\OperationNotFound;
use Imi\AC\Model\MemberOperationRelation;

/**
 * @Bean("ACMemberService")
 */
class MemberService
{
    /**
     * @Inject("ACRoleService")
     *
     * @var \Imi\AC\Service\RoleService
     */
    protected $roleService;

    /**
     * @Inject("ACOperationService")
     *
     * @var \Imi\AC\Service\OperationService
     */
    protected $operationService;

    /**
     * 获取用户角色
     *
     * @param int $memberId
     * @return \Imi\AC\Model\Role[]
     */
    public function getRoles($memberId)
    {
        $roleIds = MemberRoleRelation::query()->where('member_id', '=', $memberId)
                                              ->field('role_id')
                                              ->select()
                                              ->getColumn();
        return $this->roleService->selectListByIds($roleIds);
    }

    /**
     * 增加角色
     * 
     * 传入角色代码
     * 
     * @Transaction
     *
     * @param int $memberId
     * @param string ...$roles
     * @return void
     */
    public function addRoles($memberId, ...$roles)
    {
        foreach($roles as $roleCode)
        {
            $role = $this->roleService->getByCode($roleCode);
            if(!$role)
            {
                throw new RoleNotFound(sprintf('Role code = %s does not found', $roleCode));
            }
            $relation = MemberRoleRelation::newInstance();
            $relation->memberId = $memberId;
            $relation->roleId = $role->id;
            $relation->save();
        }
    }

    /**
     * 设置角色
     * 
     * 传入角色代码
     * 
     * 调用后，只拥有本次传入的角色
     * 
     * @Transaction
     * 
     * @param int $memberId
     * @param string ...$roles
     * @return void
     */
    public function setRoles($memberId, ...$roles)
    {
        MemberRoleRelation::query()->where('member_id', '=', $memberId)->delete();
        $this->addRoles($memberId, ...$roles);
    }

    /**
     * 移除角色
     *
     * 传入角色代码
     * 
     * @param int $memberId
     * @param string ...$roles
     * @return void
     */
    public function removeRoles($memberId, ...$roles)
    {
        $roleIds = $this->roleService->selectIdsByCodes($roles);
        if(!$roleIds)
        {
            return [];
        }
        MemberRoleRelation::query()->where('member_id', '=', $memberId)
                                   ->whereIn('role_id', $roleIds)
                                   ->delete();
    }

    /**
     * 增加操作权限
     * 
     * 传入操作代码
     * 
     * @Transaction
     *
     * @param int $memberId
     * @param string ...$operations
     * @return void
     */
    public function addOperations($memberId, ...$operations)
    {
        foreach($operations as $operationCode)
        {
            $operation = $this->operationService->getByCode($operationCode);
            if(!$operation)
            {
                throw new OperationNotFound(sprintf('Operation code = %s does not found', $operationCode));
            }
            $relation = MemberOperationRelation::newInstance();
            $relation->memberId = $memberId;
            $relation->operationId = $operation->id;
            $relation->save();
        }
    }

    /**
     * 设置操作权限
     * 
     * 传入操作代码
     * 
     * 调用后，只拥有本次传入的操作权限。不影响角色赋予的权限。
     * 
     * @Transaction
     * 
     * @param int $memberId
     * @param string ...$operations
     * @return void
     */
    public function setOperations($memberId, ...$operations)
    {
        MemberOperationRelation::query()->where('member_id', '=', $memberId)->delete();
        $this->addOperations($memberId, ...$operations);
    }

    /**
     * 获取支持的所有操作权限
     *
     * @param int $memberId
     * @return \Imi\AC\Model\Operation[]
     */
    public function getOperations($memberId)
    {
        $result = [];
        foreach(array_merge($this->getRoleOperations($memberId), $this->getOwnOperations($memberId)) as $operation)
        {
            $result[$operation->code] = $operation;
        }
        return array_values($result);
    }

    /**
     * 获取角色授予当前用户的权限
     *
     * @param int $memberId
     * @return \Imi\AC\Model\Operation[]
     */
    public function getRoleOperations($memberId)
    {
        $roles = $this->getRoles($memberId);
        $result = [];
        foreach($roles as $role)
        {
            $operations = $this->roleService->getOperations($role->id);
            foreach($operations as $operation)
            {
                $result[$operation->code] = $operation;
            }
        }
        return array_values($result);
    }

    /**
     * 获取当前用户单独被授予的权限
     *
     * @param int $memberId
     * @return \Imi\AC\Model\Operation[]
     */
    public function getOwnOperations($memberId)
    {
        $operationIds = MemberOperationRelation::query()->where('member_id', '=', $memberId)
                                                        ->field('operation_id')
                                                        ->select()
                                                        ->getColumn();
        return $this->operationService->selectListByIds($operationIds);
    }

    /**
     * 移除操作权限
     *
     * 传入操作代码
     * 
     * @param int $memberId
     * @param string ...$operations
     * @return void
     */
    public function removeOperations($memberId, ...$operations)
    {
        $operationIds = $this->operationService->selectIdsByCodes($operations);
        if(!$operationIds)
        {
            return [];
        }
        MemberOperationRelation::query()->where('member_id', '=', $memberId)
                                        ->whereIn('operation_id', $operationIds)
                                        ->delete();
    }
}