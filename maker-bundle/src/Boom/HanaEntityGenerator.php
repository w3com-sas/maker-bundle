<?php

namespace Symfony\Bundle\MakerBundle\Boom;

use Symfony\Bundle\MakerBundle\Generator;
use Symfony\Bundle\MakerBundle\Util\ClassNameDetails;

final class HanaEntityGenerator
{
    private $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    public function generateEntityClass(ClassNameDetails $entityClassDetails): string
    {
        $repoClassDetails = $this->generator->createClassNameDetails(
            $entityClassDetails->getRelativeName(),
            'HanaRepository\\',
            'Repository'
        );

        $entityPath = $this->generator->generateClass(
            $entityClassDetails->getFullName(),
            'doctrine/HanaEntity.tpl.php',
            [
                'class_name' => $repoClassDetails->getFullName(),
            ]
        );

        $entityAlias = strtolower($entityClassDetails->getShortName()[0]);
        $this->generator->generateClass(
            $repoClassDetails->getFullName(),
            'doctrine/Repository.tpl.php',
            [
                'entity_full_class_name' => $entityClassDetails->getFullName(),
                'entity_class_name' => $entityClassDetails->getShortName(),
                'entity_alias' => $entityAlias,
            ]
        );

        return $entityPath;
    }

}
