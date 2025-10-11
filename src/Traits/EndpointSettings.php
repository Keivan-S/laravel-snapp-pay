<?php

namespace BackendProgramer\SnappPay\Traits;

trait EndpointSettings
{
    /**
     * Control url to start with slash and end with slash.
     *
     * @param string $url
     * @param bool   $removeFromEnd
     * @param bool   $removeFromStart
     *
     * @return string
     */
    public function urlSlashCheck(string $url, bool $removeFromEnd = true, bool $removeFromStart = true): string
    {
        if ($removeFromEnd && strlen($url) > 0 && substr($url, -1) === '/') {
            $url = substr($url, 0, strlen($url) - 1);
        }
        if ($removeFromStart && strlen($url) > 0 && substr($url, 0, 1) === '/') {
            $url = substr($url, 1);
        }

        return $url;
    }
}
