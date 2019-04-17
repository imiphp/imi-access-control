<?php
namespace Imi\AC\AccessControl;

class Member
{
    /**
     * 用户 ID
     *
     * @var int
     */
    private $memberId;

    public function __construct($memberId)
    {
        $this->memberId = $memberId;
    }

    /**
     * 获取用户 ID
     *
     * @return int
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * 获取该用户所有角色
     *
     * @return \Imi\AC\Model\Role[]
     */
    public function getRoles()
    {

    }

    /**
     * 为用户增加角色
     * 
     * 传入角色代码
     *
     * @param string ...$roles
     * @return void
     */
    public function addRoles(...$roles)
    {

    }

    /**
     * 为用户设置角色
     * 
     * 传入角色代码
     * 
     * 调用后，用户只拥有本次传入的角色
     * 
     * @param string ...$roles
     * @return void
     */
    public function setRoles(...$roles)
    {

    }

    /**
     * 移除用户的角色
     *
     * 传入角色代码
     * 
     * @param string ...$roles
     * @return void
     */
    public function removeRoles(...$roles)
    {

    }

    /**
     * 根据角色代码判断，该用户是否拥有一个或多个角色
     *
     * @param string ...$roles
     * @return boolean
     */
    public function hasRoles(...$roles)
    {

    }

    /**
     * 获取支持的所有操作权限
     *
     * @return \Imi\AC\Model\Operation[]
     */
    public function getOperations()
    {

    }

    /**
     * 增加操作权限
     * 
     * 传入操作代码
     *
     * @param string ...$operations
     * @return void
     */
    public function addOperations(...$operations)
    {

    }

    /**
     * 设置操作权限
     * 
     * 传入操作代码
     * 
     * 调用后，只拥有本次传入的操作权限
     * 
     * @param string ...$operations
     * @return void
     */
    public function setOperations(...$operations)
    {

    }

    /**
     * 移除操作权限
     *
     * 传入操作代码
     * 
     * @param string ...$operations
     * @return void
     */
    public function removeOperations(...$operations)
    {

    }

    /**
     * 根据操作代码判断，是否拥有一个或多个操作权限
     *
     * @param string ...$operations
     * @return boolean
     */
    public function hasOperations(...$operations)
    {

    }

}