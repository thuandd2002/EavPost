var config = {
    map: {
        '*': {
            'scriptName':'Magezon_Deliverydate/js/order/place-order-mixin'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'Magezon_Deliverydate/js/order/place-order-mixin': true
            },
        }
    }
};
