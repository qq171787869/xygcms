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
        elem: '#linkLists',
        url : 'json',
        cellMinWidth : 95,
        page : true,
        height : "full-110",
        limit : 30,
        limits : [30,50,100],
        id : "linkListsTable",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'id', title: 'ID', width:60, align:"center"},
            {field: 'name', title: '网站名称'},
            {field: 'url', title: '网站地址'},
            {field: 'time', title: '添加时间', templet:'#time'},
            {field: 'email', title: '联系邮箱'},
            {title: '操作', width:150, templet:'#linkListsBar',fixed:"right",align:"center"}
        ]]
    });

    //添加按钮
    $(".addLink_btn").click(function(){
        layer.open({
            type: 2,
            title: '友情链接添加',
            maxmin: true,
            content: 'add.html',
            area: ['500px', '270px'],
            cancel: function(index, layero){
                tableIns.reload();
            }   
        }); 
    })

    //批量添加按钮
    $(".addAll_btn").click(function(){
        window.location.href = 'addall.html';
    })

    //批量删除按钮
    $(".delAll_btn").click(function(){
        var checkStatus = table.checkStatus('linkListsTable'),
            data = checkStatus.data,
            id = [];
        if(data.length > 0) {
            for (var i in data) {
                id.push(data[i].id);
            }
            layer.confirm('确定删除选中的友链？', {icon: 3, title: '提示信息'}, function (index) {
                //console.log(JSON.stringify(id));
                $.get("./del",
                    {id},
                    function(res){
                        layer.alert(res.msg);
                        tableIns.reload();
                        layer.close(index);
                    })
            })
        }else{
            layer.msg("请选择需要删除的友链");
        }
    })

    //列表操作
    table.on('tool(linkLists)', function(obj){
        var layEvent = obj.event,
            data = obj.data;

        if(layEvent === 'edit')         //编辑
        {
            layer.open({
                type: 2,
                //skin: 'layui-layer-lan',
                title: '友情链接编辑',
                maxmin: true,
                content: 'edit.html?id=' + data.id,
                area: ['500px', '270px'],
                cancel: function(index, layero){
                    tableIns.reload();
                }   
            }); 
        }else if(layEvent === 'del'){   //删除
            layer.confirm('确定删除此友链？',
                {icon:3, title:'提示信息'},
                function(index){
                    $.get("./del",
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