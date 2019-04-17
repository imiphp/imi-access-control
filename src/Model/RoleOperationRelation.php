<?php
namespace Imi\AC\Model;

use Imi\Model\Model;
use Imi\Model\Annotation\Table;
use Imi\Model\Annotation\Column;
use Imi\Model\Annotation\Entity;
use Imi\Config\Annotation\ConfigValue;
use Imi\AC\Model\Base\RoleOperationRelationBase;

/**
 * RoleOperationRelation
 * @Entity
 * @Table(name="ac_role_operation_relation", id={"role_id", "operation_id"}, dbPoolName=@ConfigValue("@app.ac.dbPoolname"))
 */
class RoleOperationRelation extends RoleOperationRelationBase
{

}
