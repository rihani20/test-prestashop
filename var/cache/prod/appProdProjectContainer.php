<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLgviyk1\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLgviyk1/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerLgviyk1.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerLgviyk1\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerLgviyk1\appProdProjectContainer([
    'container.build_hash' => 'Lgviyk1',
    'container.build_id' => '79fce7c3',
    'container.build_time' => 1726683643,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLgviyk1');
