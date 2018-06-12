layui.use(['form','element','layer','table','laytpl','layedit','upload'],function(){
    var form = layui.form,
        element = layui.element,
        //layer = parent.layer === undefined ? layui.layer : top.layer,
        layer = layui.layer,
        $ = layui.jquery,
        laydate = layui.laydate,
        laytpl = layui.laytpl,
        table = layui.table,
        layedit = layui.layedit,
        upload = layui.upload;

    //选完文件后不自动上传
    upload.render({
        elem: '#test8'
        ,url: 'uploadImg'
        ,size: 800 //限制文件大小，单位 KB
        ,ext: 'jpg|png|gif'
        ,auto: true
        //,multiple: true
        ,bindAction: '#test9'
        ,done: function(res){
            console.log(res)
            layer.msg(res.msg);
            document.getElementById('litpic').value = res.src;
        }
    });

    layedit.build('body', {
      height: 150, //设置编辑器高度
      tool: ['strong','italic','underline','link','unlink','left','center','right','image','face','code']
    });

    //数据列表
    var tableIns = table.render({
        elem: '#articleLists',
        url : 'json',
        cellMinWidth : 95,
        page : true,
        height : "full-110",
        limit : 30,
        limits : [30,50,100],
        id : "articleLists",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'id', title: 'ID', width:60},
            {field: 'title', title: '电影名称'},
            {field: 'director', title: '导演', width:100},
            {field: 'year', title: '年代', width:80},
            {field: 'category', title: '类别', width:120},
            {field: 'country', title: '国家', width:80},
            {field: 'click', title: '点击', width:80},
            {field: 'status', title: '状态',  align:'center',templet:"#status", width:80},
            {field: 'istop', title: '置顶',  align:'center',templet:"#istop", width:80},
            {title: '操作', templet:'#articleListsBar',fixed:"right", width:150, align:"center"}
        ]]
    });

    //栏目文章列表搜索
    $(".search_type_btn").on("click",function(){
        table.reload("articleLists",{
            page: {
                curr: 1 //重新从第 1 页开始
            },
            where: {
                typeid: $(".typeid").val()  //栏目ID
            }
        })
    });

    //添加按钮
    $(".addArticle_btn").click(function(){
        layer.open({
            type: 2,
            //skin: 'layui-layer-lan',
            title: '添加电影',
            maxmin: true,
            content: 'add.html',
            area: ['580px', '580px'],
            cancel: function(index, layero){
                tableIns.reload();
            }   
        }); 
    })

    //批量删除按钮
    $(".delAll_btn").click(function(){
        var checkStatus = table.checkStatus('articleLists'),
            data = checkStatus.data,
            id = [];
        if(data.length > 0) {
            for (var i in data) {
                id.push(data[i].id);
            }
            layer.confirm('确定删除选中的文章？', {icon: 3, title: '提示信息'}, function (index) {
                //console.log(JSON.stringify(id));
                $.get("del.html",
                    {id},
                    function(res){
                        layer.alert(res.msg);
                        tableIns.reload();
                        layer.close(index);
                    })
            })
        }else{
            layer.msg("请选择需要删除的文章");
        }
    })

    //列表操作
    table.on('tool(articleLists)', function(obj){
        var layEvent = obj.event,
            data = obj.data;
            //console.log(data.id);
        if (layEvent === 'edit') {          //编辑
            layer.open({
                type: 2,
                //skin: 'layui-layer-lan',
                title: '电影编辑',
                maxmin: true,
                content: 'edit.html?id=' + data.id,
                area: ['580px', '580px'],
                cancel: function(index, layero){
                    tableIns.reload();
                }   
            }); 
        } else if (layEvent === 'del') {   //删除
            layer.confirm('确定删除此文章？', {icon:3, title:'提示信息'}, function(index){
                $.get("./del",
                    {id : data.id},
                    function(res){
                        layer.alert(res.msg);
                        tableIns.reload();
                        layer.close(index);
                    })
            });
        } else if (layEvent === 'move') {   //移动
            layer.alert("{:url('index/article/index')}")
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