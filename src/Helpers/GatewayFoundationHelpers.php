<?php

namespace LaraPay\Framework\Helpers;

use Illuminate\Support\Str;

trait GatewayFoundationHelpers
{
    /**
     * Get identifier of the gateway.
     *
     * @return string
     */
    public function getId(): string
    {
        if (!isset($this->identifier)) {
            throw new \Exception('The gateway identifier is not set.');
        }

        return Str::slug($this->identifier);
    }

    public function getConfig(): array
    {
        // if method called config exists, return the config
        if (method_exists($this, 'config')) {
            return $this->config();
        }

        // if property config exists, return the config
        if (property_exists($this, 'config')) {
            return $this->config;
        }

        return [];
    }
}
