<?php
namespace Imi\AC\Model;

use Imi\Model\Model;
use Imi\Model\Annotation\Table;
use Imi\Model\Annotation\Column;
use Imi\Model\Annotation\Entity;
use Imi\AC\Model\Base\MemberRoleRelationBase;

/**
 * MemberRoleRelation
 * @Entity
 * @Table(name="ac_member_role_relation", id={"member_id", "role_id"})
 */
class MemberRoleRelation extends MemberRoleRelationBase
{

}
