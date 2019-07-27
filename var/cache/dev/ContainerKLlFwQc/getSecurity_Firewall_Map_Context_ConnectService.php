<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.firewall.map.context.connect' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/security-bundle/Security/FirewallContext.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Util/TargetPathTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Firewall/ExceptionListener.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-bundle/Security/FirewallConfig.php';

return $this->privates['security.firewall.map.context.connect'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(new RewindableGenerator(function () {
    yield 0 => ($this->privates['security.channel_listener'] ?? $this->load('getSecurity_ChannelListenerService.php'));
    yield 1 => ($this->privates['security.authentication.listener.json.connect'] ?? $this->load('getSecurity_Authentication_Listener_Json_ConnectService.php'));
    yield 2 => ($this->privates['security.authentication.listener.anonymous.connect'] ?? $this->load('getSecurity_Authentication_Listener_Anonymous_ConnectService.php'));
    yield 3 => ($this->privates['security.access_listener'] ?? $this->load('getSecurity_AccessListenerService.php'));
}, 4), new \Symfony\Component\Security\Http\Firewall\ExceptionListener(($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver(NULL, NULL))), ($this->privates['security.http_utils'] ?? $this->load('getSecurity_HttpUtilsService.php')), 'connect', NULL, NULL, NULL, ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())), true), NULL, new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('connect', 'security.user_checker', '.security.request_matcher..RnH.s8', true, true, 'security.user.provider.concrete.app_user_provider', NULL, NULL, NULL, NULL, [0 => 'json_login', 1 => 'anonymous'], NULL));
