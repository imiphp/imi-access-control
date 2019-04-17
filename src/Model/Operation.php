<?php
namespace Imi\AC\Model;

use Imi\Model\Model;
use Imi\Model\Annotation\Table;
use Imi\Model\Annotation\Column;
use Imi\Model\Annotation\Entity;
use Imi\AC\Model\Base\OperationBase;
use Imi\Config\Annotation\ConfigValue;

/**
 * Operation
 * @Entity
 * @Table(name="ac_operation", id={"id"}, dbPoolName=@ConfigValue("@app.ac.dbPoolname"))
 */
class Operation extends OperationBase
{

}
