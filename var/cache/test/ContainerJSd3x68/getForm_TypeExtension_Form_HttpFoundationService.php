<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'form.type_extension.form.http_foundation' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/form/FormTypeExtensionInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/form/AbstractTypeExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/form/Extension/HttpFoundation/Type/FormTypeHttpFoundationExtension.php';

return $this->privates['form.type_extension.form.http_foundation'] = new \Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension(($this->privates['form.type_extension.form.request_handler'] ?? $this->load('getForm_TypeExtension_Form_RequestHandlerService.php')));
