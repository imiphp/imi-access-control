<?php
namespace Imi\AC\Service;

use Imi\AC\Model\Role;
use Imi\Bean\Annotation\Bean;
use Imi\Aop\Annotation\Inject;
use Imi\AC\Exception\RoleNotFound;
use Imi\Db\Annotation\Transaction;
use Imi\AC\Exception\OperationNotFound;
use Imi\AC\Model\RoleOperationRelation;

/**
 * @Bean("ACRoleService")
 */
class RoleService
{
    /**
     * @Inject("ACOperationService")
     *
     * @var \Imi\AC\Service\OperationService
     */
    protected $operationService;

    /**
     * 获取角色
     *
     * @param int $id
     * @return \Imi\AC\Model\Role
     */
    public function get($id)
    {
        return Role::find($id);
    }

    /**
     * 根据代码获取角色
     *
     * @param string $code
     * @return \Imi\AC\Model\Role
     */
    public function getByCode($code)
    {
        return Role::query()->where('code', '=', $code)->select()->get();
    }

    /**
     * 根据id列表查询记录
     *
     * @param int $ids
     * @return \Imi\AC\Model\Role[]
     */
    public function selectListByIds($ids)
    {
        if(!$ids)
        {
            return [];
        }
        return Role::query()->whereIn('id', $ids)
                            ->select()
                            ->getArray();
    }

    /**
     * 根据多个角色获取操作ID
     *
     * @param array $codes
     * @return int[]
     */
    public function selectIdsByCodes($codes)
    {
        if(!$codes)
        {
            return [];
        }
        return Role::query()->field('id')->whereIn('code', $codes)->select()->getColumn();
    }

    /**
     * 查询列表
     *
     * @return \Imi\AC\Model\Role[]
     */
    public function selectList()
    {
        return Role::select();
    }

    /**
     * 创建角色
     *
     * @param string $name
     * @param string|null $code
     * @param string $description
     * @return \Imi\AC\Model\Role
     */
    public function create($name, $code = null, $description = '')
    {
        $record = Role::newInstance();
        $record->name = $name;
        $record->code = $code ?? $name;
        $record->description = $description;
        $result = $record->insert();
        if(!$result->isSuccess())
        {
            return false;
        }
        return $record;
    }

    /**
     * 更新角色
     *
     * @param int $id
     * @param string $name
     * @param string|null $code
     * @param string $description
     * @return boolean
     */
    public function update($id, $name, $code, $description = '')
    {
        $record = $this->get($id);
        if(!$record)
        {
            throw new RoleNotFound(sprintf('Role id = %s does not found', $id));
        }
        $record->name = $name;
        $record->code = $code;
        $record->description = $description;
        return $record->update()->isSuccess();
    }

    /**
     * 删除角色
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $record = $this->get($id);
        if(!$record)
        {
            throw new RoleNotFound(sprintf('Role id = %s does not found', $id));
        }
        return $record->delete()->isSuccess();
    }

    /**
     * 增加操作权限
     * 
     * 传入操作代码
     * 
     * @Transaction
     *
     * @param int $roleId
     * @param string ...$operations
     * @return void
     */
    public function addOperations($roleId, ...$operations)
    {
        foreach($operations as $operationCode)
        {
            $operation = $this->operationService->getByCode($operationCode);
            if(!$operation)
            {
                throw new OperationNotFound(sprintf('Operation code = %s does not found', $operationCode));
            }
            $relation = RoleOperationRelation::newInstance();
            $relation->roleId = $roleId;
            $relation->operationId = $operation->id;
            $relation->save();
        }
    }

    /**
     * 设置操作权限
     * 
     * 传入操作代码
     * 
     * 调用后，只拥有本次传入的操作权限
     * 
     * @Transaction
     * 
     * @param int $roleId
     * @param string ...$operations
     * @return void
     */
    public function setOperations($roleId, ...$operations)
    {
        RoleOperationRelation::query()->where('role_id', '=', $roleId)->delete();
        $this->addOperations($roleId, ...$operations);
    }

    /**
     * 获取支持的所有操作权限
     *
     * @param int $roleId
     * @return \Imi\AC\Model\Operation[]
     */
    public function getOperations($roleId)
    {
        $operationIds = RoleOperationRelation::query()->where('role_id', '=', $roleId)
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
     * @param int $roleId
     * @param string ...$operations
     * @return void
     */
    public function removeOperations($roleId, ...$operations)
    {
        $operationIds = $this->operationService->selectIdsByCodes($operations);
        if(!$operationIds)
        {
            return [];
        }
        RoleOperationRelation::query()->where('role_id', '=', $roleId)
                                      ->whereIn('operation_id', $operationIds)
                                      ->delete();
    }

}