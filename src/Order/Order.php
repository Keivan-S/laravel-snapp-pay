<?php

namespace BackendProgramer\SnappPay\Order;

use BackendProgramer\SnappPay\Abstracts\Order as AbstractsOrder;
use BackendProgramer\SnappPay\Cart\CartList;
class Order extends AbstractsOrder
{
    /**
     * SnappPay Order build cart list.
     *
     * @return array
     */
    public function buildCartList(): array
    {
        $cartList = new CartList($this);

        return $cartList->toArray();
    }
}
