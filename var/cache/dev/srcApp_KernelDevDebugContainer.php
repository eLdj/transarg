<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOXUxGJo\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOXUxGJo/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerOXUxGJo.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerOXUxGJo\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerOXUxGJo\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'OXUxGJo',
    'container.build_id' => 'f34d7b4e',
    'container.build_time' => 1564570513,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerOXUxGJo');
