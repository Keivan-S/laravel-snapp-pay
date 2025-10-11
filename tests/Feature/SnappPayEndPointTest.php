<?php

namespace BackendProgramer\SnappPay\Tests\Feature;

use BackendProgramer\SnappPay\SnappPayEndpoint;
use BackendProgramer\SnappPay\Tests\TestCase;
use Illuminate\Support\Facades\Config;

class SnappPayEndPointTest extends TestCase
{
    public function testCreateNewInstanceWithConfigData(): void
    {
        Config::set('snapp-pay.endpoints.bearer_token', ['url' => 'api/online/v1/oauth/token', 'method' => 'POST']);
        Config::set('snapp-pay.endpoints.merchant_eligible', ['url' => 'api/online/offer/v1/eligible', 'method' => 'GET']);
        Config::set('snapp-pay.endpoints.payment_token', ['url' => 'api/online/payment/v1/token', 'method' => 'POST']);
        Config::set('snapp-pay.endpoints.payment_verify', ['url' => 'api/online/payment/v1/verify', 'method' => 'POST']);
        Config::set('snapp-pay.endpoints.payment_settle', ['url' => 'api/online/payment/v1/settle', 'method' => 'POST']);
        Config::set('snapp-pay.endpoints.payment_revert', ['url' => 'api/online/payment/v1/revert', 'method' => 'POST']);
        Config::set('snapp-pay.endpoints.payment_cancel', ['url' => 'api/online/payment/v1/cancel', 'method' => 'POST']);
        Config::set('snapp-pay.endpoints.payment_update', ['url' => 'api/online/payment/v1/update', 'method' => 'POST']);
        Config::set('snapp-pay.endpoints.payment_status', ['url' => 'api/online/payment/v1/status', 'method' => 'GET']);

        $snappPayEndpoint = new SnappPayEndpoint(true);

        $this->assertSame('api/online/v1/oauth/token', $snappPayEndpoint->getBearerToken('url'));
        $this->assertSame('POST', $snappPayEndpoint->getBearerToken('method'));
        $this->assertSame('api/online/offer/v1/eligible', $snappPayEndpoint->getMerchantEligible('url'));
        $this->assertSame('GET', $snappPayEndpoint->getMerchantEligible('method'));
        $this->assertSame('api/online/payment/v1/token', $snappPayEndpoint->getPaymentToken('url'));
        $this->assertSame('POST', $snappPayEndpoint->getPaymentToken('method'));
        $this->assertSame('api/online/payment/v1/verify', $snappPayEndpoint->getVerifyOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getVerifyOrder('method'));
        $this->assertSame('api/online/payment/v1/settle', $snappPayEndpoint->getSettleOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getSettleOrder('method'));
        $this->assertSame('api/online/payment/v1/revert', $snappPayEndpoint->getRevertOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getRevertOrder('method'));
        $this->assertSame('api/online/payment/v1/cancel', $snappPayEndpoint->getCancelOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getCancelOrder('method'));
        $this->assertSame('api/online/payment/v1/update', $snappPayEndpoint->getUpdateOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getUpdateOrder('method'));
        $this->assertSame('api/online/payment/v1/status', $snappPayEndpoint->getStatusOrder('url'));
        $this->assertSame('GET', $snappPayEndpoint->getStatusOrder('method'));
    }

    public function testCreateNewInstanceWithSetterData(): void
    {
        $snappPayEndpoint = new SnappPayEndpoint();
        $snappPayEndpoint->setBearerToken('api/online/v1/oauth/token', 'POST');
        $snappPayEndpoint->setMerchantEligible('api/online/offer/v1/eligible', 'GET');
        $snappPayEndpoint->setPaymentToken('api/online/payment/v1/token', 'POST');
        $snappPayEndpoint->setVerifyOrder('api/online/payment/v1/verify', 'POST');
        $snappPayEndpoint->setSettleOrder('api/online/payment/v1/settle', 'POST');
        $snappPayEndpoint->setRevertOrder('api/online/payment/v1/revert', 'POST');
        $snappPayEndpoint->setCancelOrder('api/online/payment/v1/cancel', 'POST');
        $snappPayEndpoint->setUpdateOrder('api/online/payment/v1/update', 'POST');
        $snappPayEndpoint->setStatusOrder('api/online/payment/v1/status', 'GET');

        $this->assertSame('api/online/v1/oauth/token', $snappPayEndpoint->getBearerToken('url'));
        $this->assertSame('POST', $snappPayEndpoint->getBearerToken('method'));
        $this->assertSame('api/online/offer/v1/eligible', $snappPayEndpoint->getMerchantEligible('url'));
        $this->assertSame('GET', $snappPayEndpoint->getMerchantEligible('method'));
        $this->assertSame('api/online/payment/v1/token', $snappPayEndpoint->getPaymentToken('url'));
        $this->assertSame('POST', $snappPayEndpoint->getPaymentToken('method'));
        $this->assertSame('api/online/payment/v1/verify', $snappPayEndpoint->getVerifyOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getVerifyOrder('method'));
        $this->assertSame('api/online/payment/v1/settle', $snappPayEndpoint->getSettleOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getSettleOrder('method'));
        $this->assertSame('api/online/payment/v1/revert', $snappPayEndpoint->getRevertOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getRevertOrder('method'));
        $this->assertSame('api/online/payment/v1/cancel', $snappPayEndpoint->getCancelOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getCancelOrder('method'));
        $this->assertSame('api/online/payment/v1/update', $snappPayEndpoint->getUpdateOrder('url'));
        $this->assertSame('POST', $snappPayEndpoint->getUpdateOrder('method'));
        $this->assertSame('api/online/payment/v1/status', $snappPayEndpoint->getStatusOrder('url'));
        $this->assertSame('GET', $snappPayEndpoint->getStatusOrder('method'));
    }
}
