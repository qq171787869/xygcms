layui.use(['form','element','layer'],function(){
    var form = layui.form,
        element = layui.element,
        //layer = parent.layer === undefined ? layui.layer : top.layer,
        layer = layui.layer,
        $ = layui.jquery;

    // QQ登录配置
    $(".qqLogin_btn").click(function(){
        layer.open({
            type: 2,
            //skin: 'layui-layer-lan',
            title: 'QQ登录配置',
            //maxmin: true,
            content: 'qqlogin.html',
            area: ['320px', '220px'],
        }); 
    })

    // 修改密码
    $(".changePass_btn").click(function(){
        layer.open({
            type: 2,
            //skin: 'layui-layer-lan',
            title: '修改密码',
            //maxmin: true,
            content: 'pass.html',
            area: ['320px', '220px'],  
        }); 
    })

});

