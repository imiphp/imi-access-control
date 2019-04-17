<?php
namespace Imi\AC\Model;

use Imi\Model\Model;
use Imi\AC\Model\Base\RoleBase;
use Imi\Model\Annotation\Table;
use Imi\Model\Annotation\Column;
use Imi\Model\Annotation\Entity;
use Imi\Config\Annotation\ConfigValue;

/**
 * Role
 * @Entity
 * @Table(name="ac_role", id={"id"}, dbPoolName=@ConfigValue("@app.ac.dbPoolname"))
 */
class Role extends RoleBase
{

}
