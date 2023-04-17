var config = {
    map: {
        '*': {
            'scriptName':'AHT_CustomCheckout/js/order/place-order-mixin'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'AHT_CustomCheckout/js/order/place-order-mixin': true
            },
        }
    }
};
