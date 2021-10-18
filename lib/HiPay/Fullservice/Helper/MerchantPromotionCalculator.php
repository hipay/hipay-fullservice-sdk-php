<?php

namespace HiPay\Fullservice\Helper;

class MerchantPromotionCalculator
{
    /**
     * @param string $payment_product
     * @param int $amount
     * @return string|void
     */
    public static function calculate($payment_product, $amount)
    {
        $promoteCode = "000";
        if ($amount >= 100 && $amount < 400) {
            $promoteCode .= "1";
        } elseif ($amount >= 400 && $amount < 1000) {
            $promoteCode .= "2";
        } elseif ($amount >= 1000 && $amount <= 3000) {
            $promoteCode .= "3";
        } else {
            return;
        }

        switch ($payment_product) {
            case "3xcb":
            case "3xcb-no-fees":
                return "3x" . $promoteCode;
            case "4xcb":
            case "4xcb-no-fees":
                return "4x" . $promoteCode;
        }
    }
}
