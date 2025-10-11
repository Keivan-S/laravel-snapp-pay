<?php

namespace BackendProgramer\SnappPay\Tests\Feature;

use BackendProgramer\SnappPay\SnappPaySetting;
use BackendProgramer\SnappPay\Tests\TestCase;
use Illuminate\Support\Facades\Config;

class SnappPaySettingTest extends TestCase
{
    public function testCreateNewInstanceWithCredentials(): void
    {
        $snappPaySetting = SnappPaySetting::credentials(
            'bamilo-user1',
            '123456789',
            'bamilo1',
            '987654321',
            'https://fms-gateway-staging.apps.public.teh-1.snappcloud.io/'
        );

        $this->assertSame('bamilo-user1', $snappPaySetting->getUsername());
        $this->assertSame('123456789', $snappPaySetting->getPassword());
        $this->assertSame('bamilo1', $snappPaySetting->getClientId());
        $this->assertSame('987654321', $snappPaySetting->getClientSecret());
        $this->assertSame('https://fms-gateway-staging.apps.public.teh-1.snappcloud.io/', $snappPaySetting->getBaseUrl());
    }

    public function testCreateNewInstanceWithConfigData(): void
    {
        Config::set('snapp-pay.settings.user_name', 'bamilo-user1');
        Config::set('snapp-pay.settings.password', '123456789');
        Config::set('snapp-pay.settings.client_id', 'bamilo1');
        Config::set('snapp-pay.settings.client_secret', '987654321');
        Config::set('snapp-pay.settings.base_url', 'https://fms-gateway-staging.apps.public.teh-1.snappcloud.io/');

        $snappPaySetting = new SnappPaySetting(true);

        $this->assertSame('bamilo-user1', $snappPaySetting->getUsername());
        $this->assertSame('123456789', $snappPaySetting->getPassword());
        $this->assertSame('bamilo1', $snappPaySetting->getClientId());
        $this->assertSame('987654321', $snappPaySetting->getClientSecret());
        $this->assertSame('https://fms-gateway-staging.apps.public.teh-1.snappcloud.io/', $snappPaySetting->getBaseUrl());
    }

    public function testCreateNewInstanceWithSetterData(): void
    {
        $snappPaySetting = new SnappPaySetting();
        $snappPaySetting->setUsername('bamilo-user1');
        $snappPaySetting->setPassword('123456789');
        $snappPaySetting->setClientId('bamilo1');
        $snappPaySetting->setClientSecret('987654321');
        $snappPaySetting->setBaseUrl('https://fms-gateway-staging.apps.public.teh-1.snappcloud.io/');

        $this->assertSame('bamilo-user1', $snappPaySetting->getUsername());
        $this->assertSame('123456789', $snappPaySetting->getPassword());
        $this->assertSame('bamilo1', $snappPaySetting->getClientId());
        $this->assertSame('987654321', $snappPaySetting->getClientSecret());
        $this->assertSame('https://fms-gateway-staging.apps.public.teh-1.snappcloud.io/', $snappPaySetting->getBaseUrl());
    }
}
