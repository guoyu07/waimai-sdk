<?php

namespace Laraver\Eleme\ServiceProviders;

use Laraver\Eleme\Core\AccessToken;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AccessTokenServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['access_token'] = function ($pimple) {
            return new AccessToken($pimple['config']['app_id'], $pimple['config']['secret'], array_get($pimple['config'], 'debug', false));
        };
    }
}
