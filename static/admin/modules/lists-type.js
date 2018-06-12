layui.use(['form','element','layer','table','laytpl','layedit','upload'],function(){
    var form = layui.form,
        element = layui.element,
        //layer = parent.layer === undefined ? layui.layer : top.layer,
        layer = layui.layer,
        $ = layui.jquery,
        laytpl = layui.laytpl,
        table = layui.table,
        layedit = layui.layedit,
        upload = layui.upload;

    //选完文件后不自动上传
    upload.render({
        elem : '#test8',
        url : '../article/uploadImg',
        size : 200, //限制文件大小，单位 KB
        ext : 'jpg|png|gif',
        auto : false,
        //multiple: true,
        bindAction: '#test9',
        done: function(res){
            console.log(res)
            layer.msg(res.msg);
            document.getElementById('litpic').value = res.src;
        }
    });

    layedit.build('content', {
      height : 311, //设置编辑器高度
      tool : ['strong','italic','underline','link','unlink','left','center','right','image','face']
    });

    //数据列表
    var tableIns = table.render({
        elem : '#typeLists',
        url : '../type/json',
        page : true,
        height : "full-110",
        limit : 30,
        limits : [30,50,100],
        id : "typeListsTable",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'id', title: 'ID', width:60},
            {field: 'rename', title: '栏目名称'},
            {field: 'sort', title: '排序', width:60, align:'center'},
            {field: 'row', title: '列表', width:60, align:'center'},
            {field: 'liststpl', title: '列表模板'},
            {field: 'itemstpl', title: '内页模版'},
            {field: 'url', title: '别名URL'},
            {field: 'status', title: '状态', width:80, templet:'#status', align:'center'},
            {title: '操作', width:150, templet:'#typeListsBar',fixed:"right",align:"center"}
        ]]
    });

    // 栏目模型select事件
    form.on('select(model)', function(data){
      var  model = data.value;
      console.log(model);
      switch(model)
      {
        case '1':
          $('input[name=listtpl]').val('list_article');
          $('input[name=itemtpl]').val('item_article');
          break;
        case '2':
          $('input[name=listtpl]').val('list_soft');
          $('input[name=itemtpl]').val('item_soft');
          break;
        case '3':
          $('input[name=listtpl]').val('list_film');
          $('input[name=itemtpl]').val('item_film');
          break;
        case '4':
          $('input[name=listtpl]').val('list_image');
          $('input[name=itemtpl]').val('item_image');
          break;
        default:
          $('input[name=listtpl]').val('list_article');
          $('input[name=itemtpl]').val('item_article');
      };
    });

    //添加按钮
    $(".addType_btn").click(function(){
        layer.open({
            type : 2,
            //skin : 'layui-layer-lan',
            title : '添加栏目',
            maxmin : true,
            content : 'add.html',
            area : ['500px', '540px'],
            cancel : function(index, layero){
                tableIns.reload();
            }   
        }); 
    })

    //批量添加按钮
    $(".addAll_btn").click(function(){
        layer.open({
            type : 2,
            //skin : 'layui-layer-lan',
            title : '批量添加栏目',
            maxmin : true,
            content : 'addall.html',
            area : ['500px', '540px'],
            cancel : function(index, layero){
                tableIns.reload();
            }   
        }); 
    })

    //批量删除按钮
    $(".delAll_btn").click(function(){
        var checkStatus = table.checkStatus('typeListsTable'),
            data = checkStatus.data,
            id = [];
        if(data.length > 0) {
            for (var i in data) {
                id.push(data[i].id);
            }
            layer.confirm('确定删除选中的栏目？', {icon: 3, title: '提示信息'}, function (index) {
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
            layer.msg("请选择需要删除的栏目");
        }
    })

    //列表操作
    table.on('tool(typeLists)', function(obj){
        var layEvent = obj.event,
            data = obj.data;

        if(layEvent === 'edit')         //编辑
        {
            layer.open({
                type : 2,
                //skin : 'layui-layer-lan',
                title : '批量添加栏目',
                maxmin : true,
                content : 'edit.html?id=' + data.id,
                area : ['500px', '540px'],
                cancel : function(index, layero){
                    tableIns.reload();
                }   
            }); 
        }else if(layEvent === 'del'){   //删除
            layer.confirm('确定删除此栏目？',
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

})