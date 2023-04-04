
define([
        'jquery',
        'uiComponent',
    ], function (
        $,
        Component,
    ) {
        return Component.extend({
            customData: window.customConfig,
            abc : 'Test hello world',
            defaults: {
                template: 'AHT_Eav/custom'
            },
            getData:function(){
                var test = "hello world";
                return test;
            },
             getDataApi: $(document).ready(function() {
                $.ajax({
                    url: 'http://m243.local/rest/V1/eav/post',
                    type :'GET',
                    dataType : 'json',
                    success: function (data) {
                        var result = "";
                        data[1].forEach(item => {
                             result = result +=` <tr>
                             <td>${item.entity_id}</td>
                             <td>${item.content}</td>
                          </tr>`;
                            
                       });
                       $('table').append(result);
                    },
                    error: function(textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                })  
            })
        });
    }
);
