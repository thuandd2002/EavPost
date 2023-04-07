
define([
        'jquery',
        'uiComponent',
    ], function (
        $,
        Component,
    ) {
        return Component.extend({
            baseUrl : 'http://m243.local/',
            customData: window.customConfig,
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
                             <td><a href="http://m243.local/eav/post/type/entity_id/${item.categoryid}">${item.name}</a></td>
                             <td>${item.content}</td>
                             <td><img src="http://m243.local/media/eav/index/${item.images}" width="500" height="600"></td>
                          </tr>`;
                            
                       });
                       $('#post').append(result);
                    },
                    error: function(textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                })  
            }),
            getDataApiCat: $(document).ready(function() {
                $.ajax({
                    url: 'http://m243.local/rest/V1/eav/categories',
                    type :'GET',
                    dataType : 'json',
                    success: function (data) {
                        var result = "";
                        data[1].forEach(item => {
                             result = result +=` <tr>
                             <td><a href="http://m243.local/eav/post/type/entity_id/${item.entity_id}">${item.name}</a></td>
                          </tr>`;
                       });
                       $('#cat').append(result);
                    },
                    error: function(textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                })  
            })
        });
    }
);
