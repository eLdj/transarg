<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerMvQH1Dg\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerMvQH1Dg/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerMvQH1Dg.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerMvQH1Dg\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerMvQH1Dg\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'MvQH1Dg',
    'container.build_id' => '47f7a8d6',
    'container.build_time' => 1564585442,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerMvQH1Dg');
