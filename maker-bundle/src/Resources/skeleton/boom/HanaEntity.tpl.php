<?= "<?php\n" ?>

namespace <?= $namespace ?>;

use W3com\BoomBundle\Annotation\EntityColumnMeta;
use W3com\BoomBundle\Annotation\EntityMeta;
use W3com\BoomBundle\HanaEntity\AbstractEntity

/**
* @EntityMeta(read="ods", write="ods", aliasRead="<?= $sap_table_name ?>", aliasWrite="<?= $sap_table_name ?>")
*/
class <?= $class_name."\n" ?> extends AbstractEntity
{

}
