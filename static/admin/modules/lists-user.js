layui.use(['form','element','layer','table','laytpl'],function(){
    var form = layui.form,
        element = layui.element,
        //layer = parent.layer === undefined ? layui.layer : top.layer,
        layer = layui.layer,
        $ = layui.jquery,
        laytpl = layui.laytpl,
        table = layui.table;

    //数据列表
    var tableIns = table.render({
        elem: '#userLists',
        url : '../user/json',
        cellMinWidth : 95,
        page : true,
        height : "full-110",
        limit : 30,
        limits : [30,50,100],
        id : "userListsTable",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'id', title: 'ID', width:60},
            {field: 'email', title: '邮箱'},
            {field: 'money', title: '金钱', width:80},
            {field: 'point', title: '积分', width:80},
            {field: 'regdate', title: '注册日期', templet:'#regdate', align:'center', width:170},
            {field: 'lastlogin', title: '上次登录', templet:'#lastlogin', align:'center', width:170},
            {field: 'status', title: '状态', align:'center', templet:'#status', width:80},
            {title: '操作', templet:'#userListsBar',fixed:"right", width:150, align:"center"}
        ]]
    });

    //添加按钮
    $(".addUser_btn").click(function(){
        layer.open({
            type: 2,
            title: '用户添加',
            maxmin: true,
            content: 'add.html',
            area: ['360px', '330px'],
            cancel: function(index, layero){
                tableIns.reload();
            }   
        }); 
    })

    //批量添加按钮
    $(".addAll_btn").click(function(){
        window.location.href = 'addall.html';
    })

    //批量封禁按钮
    $(".banAll_btn").click(function(){
        var checkStatus = table.checkStatus('userListsTable'),
            data = checkStatus.data,
            id = [];
        if(data.length > 0) {
            for (var i in data) {
                id.push(data[i].id);
            }
            layer.confirm('确定封禁选中的用户？', {icon: 3, title: '提示信息'}, function (index) {
                //console.log(JSON.stringify(id));
                $.get("./ban",
                    {id},
                    function(res){
                        layer.alert(res.msg);
                        tableIns.reload();
                        layer.close(index);
                    })
            })
        }else{
            layer.msg("请选择需要封禁的用户");
        }
    })

    //列表操作
    table.on('tool(userLists)', function(obj){
        var layEvent = obj.event,
            data = obj.data;

        if(layEvent === 'edit')         //编辑
        {
            layer.open({
                type: 2,
                title: '用户编辑',
                maxmin: true,
                content: 'edit.html?id=' + data.id,
                area: ['360px', '330px'],
                cancel: function(index, layero){
                    tableIns.reload();
                }   
            }); 
        }else if(layEvent === 'ban'){   //封禁
            layer.confirm('确定封禁此用户？',
                {icon:3, title:'提示信息'},
                function(index){
                    $.get("./ban",
                        {id : data.id},
                        function(res){
                            layer.alert(res.msg);
                            tableIns.reload();
                            layer.close(index);
                        })
                });
        }
    });

});

function getdate(unix)
{
    var now = new Date(unix),
    y = now.getFullYear(),
    m = now.getMonth() + 1,
    d = now.getDate();
    return y + "-" + (m < 10 ? "0" + m : m) + "-" + (d < 10 ? "0" + d : d) + " " + now.toTimeString().substr(0, 8);
}