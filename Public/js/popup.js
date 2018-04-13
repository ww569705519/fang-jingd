var pop={
	 // 确认弹出层
    confirm : function(message, url) {
       //询问框
		layer.confirm(message, {
		  btn: ['确定','放弃'] //按钮
		}, function(){
		  layer.msg('提交成功', {icon: 1});
		  location.href=url;
		}, function(){
		  layer.msg('也可以这样', {
		    time: 20000, //20s后自动关闭
		    btn: ['明白了', '知道了']
		  });
		});
    },
    // 错误弹出层
    error: function(message) {
        layer.alert(message, {
		  icon: 2,
		  skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
		});
    },
    //成功弹出层
    success : function(message,url) {
        layer.open({
            content : message,
            icon : 1,
            yes : function(){
                location.href=url;
            },
        });
    },
    //成功弹出层
    successshow : function(message) {
        layer.open({
            content : message,
            icon : 1,
            skin: 'layer-ext-moon'
        });
    },

}