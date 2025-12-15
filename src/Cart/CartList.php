<?php

namespace BackendProgramer\SnappPay\Cart;

use BackendProgramer\SnappPay\Abstracts\CartList as AbstractsCartList;
use BackendProgramer\SnappPay\enums\Currency;
class CartList extends AbstractsCartList
{
    /**
     * Get SnappPay cart list array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $cartList = [
            'cartId' => $this->cartId,
            'totalAmount' => self::convertPrice($this->totalAmount, $this->currency, Currency::RIAL),
            'isShipmentIncluded' => $this->isShipmentIncluded,
            'isTaxIncluded' => $this->isTaxIncluded,
        ];
        if (!$this->isShipmentIncluded) {
            $cartList['shippingAmount'] = self::convertPrice($this->shippingAmount, $this->currency, Currency::RIAL);
        }
        if ($this->isTaxIncluded) {
            $cartList['taxAmount'] = self::convertPrice($this->taxAmount, $this->currency, Currency::RIAL);
        }
        foreach ($this->cartItems as $cartItem) {
            $items[] = [
                'id' => $cartItem->getId(),
                'name' => $cartItem->getName(),
                'count' => $cartItem->getCount(),
                'amount' => self::convertPrice($cartItem->getAmount(), $this->currency, Currency::RIAL),
                'category' => $cartItem->getCategory(),
                'commissionType' => $cartItem->getCommissionType(),
            ];
        }
        $cartList['cartItems'] = $items;

        return $cartList;
    }

}
