layui.use(['form','element','layer','table','laytpl'],function(){
    var form = layui.form,
        element = layui.element,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laytpl = layui.laytpl,
        table = layui.table;

    //数据列表
    var tableIns = table.render({
        elem: '#commentLists',
        url : '../comment/json',
        cellMinWidth : 95,
        page : true,
        height : "full-120",
        limit : 30,
        limits : [30,50,100],
        id : "commentListsTable",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'id', title: '评论ID', width:80, align:"center"},
            {field: 'aid', title: '文章ID', width:80, align:"center"},
            {field: 'username', title: '用户名称', width:120},
            {field: 'content', title: '评论内容'},
            {field: 'pubdate', title: '评论日期', templet:'#pubdate', align:'center', width:180},
            {title: '操作', templet:'#commentListsBar',fixed:"right", width:100, align:"center"}
        ]]
    });

    //添加按钮
    $(".addUser_btn").click(function(){
        window.location.href = 'add.html';
    })

    //批量添加按钮
    $(".addAll_btn").click(function(){
        window.location.href = 'addall.html';
    })

    //批量删除按钮
    $(".delAll_btn").click(function(){
        var checkStatus = table.checkStatus('commentListsTable'),
            data = checkStatus.data,
            id = [];
        if(data.length > 0) {
            for (var i in data) {
                id.push(data[i].id);
            }
            layer.confirm('确定删除选中的评论？', {icon: 3, title: '提示信息'}, function (index) {
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
            layer.msg("请选择需要删除的评论");
        }
    })

    //列表操作
    table.on('tool(commentLists)', function(obj){
        var layEvent = obj.event,
            data = obj.data;

        if(layEvent === 'edit')         //编辑
        {
            window.location.href = 'edit.html?id=' + data.id;
        }else if(layEvent === 'del'){   //删除
            layer.confirm('确定删除此评论？',
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