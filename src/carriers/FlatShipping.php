<?php

namespace Ecommvu\FlatShipping\Carriers;

use Config;

use Webkul\Checkout\Models\CartShippingRate;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Checkout\Facades\Cart;
use Webkul\Shipping\Carriers\AbstractShipping;

/**
 * FlatShipping class
 *
 * @author  ECommvu
 * @copyright 2020 ECommvu (https://www.ecommvu.com)
 */
class FlatShipping extends AbstractShipping
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code = 'flat_shipping';

    /**
     * Shipping matrix
     */
    protected $shipMatrix;

    /**
     * Constructor to initialize prerequisites
     */
    public function __construct()
    {
        $this->shipMatrix = config('ship_matrix');
    }

    /**
     * Returns rate for flatrate
     *
     * @return array
     */
    public function calculate()
    {
        $cartShippingAddress = \Cart::getCart()->addresses;

        if ($cartShippingAddress->count()) {
            $pincode = $cartShippingAddress->first()->postcode;
        } else {
            $pincode = $cartShippingAddress->last()->postcode;
        }

        $explicitRate = floatval($this->getConfigData('default_rate'));

        foreach ($this->shipMatrix as $key => $value) {
            if ($pincode >= $value['pincode_start'] && $pincode <= $value['pincode_end']) {
                $explicitRate = floatval($value['cost']);
            }
        }

        if (! $this->isAvailable())
            return false;

        $cart = Cart::getCart();

        $object = new CartShippingRate;
        $object->carrier = 'flat_shipping';
        $object->carrier_title = $this->getConfigData('title');
        $object->method = 'flat_shipping_flat_shipiing';
        $object->method_title = $this->getConfigData('title');
        $object->method_description = $this->getConfigData('description');
        $object->price = $explicitRate;
        $object->base_price = $explicitRate;

        if ($this->getConfigData('type') == 'per_unit') {
            foreach ($cart->items as $item) {
                if ($item->product->getTypeInstance()->isStockable()) {
                    $object->price += core()->convertPrice($explicitRate) * $item->quantity;
                    $object->base_price += $explicitRate * $item->quantity;
                }
            }
        } else {
            $object->price = core()->convertPrice($explicitRate);
            $object->base_price = $explicitRate;
        }

        return $object;
    }
}