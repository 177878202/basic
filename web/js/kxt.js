var log_div=$('#log'),btn_num=[],btn_name=[],data=[],qh=[],k_zf=0,k_hm=[];
btn_num[36]=[0,1,2,3,4];
btn_num[16]=[3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18];
btn_num[11]=[2,3,4,5,6,7,8,9,10,11,12];
btn_num[10]=[1,2,3,4,5,6,7,8,9,10];
btn_num[22]=[6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27];
btn_num[17]=[3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
btn_num[28]=[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27];

var dom = document.getElementById("container");
var myChart = echarts.init(dom);
jQuery(document).ready(function () {

    k_log("开始获取统计数据");
    a();

    // console.log(button);
    ka();


});



function ka() {
    k_log('开始整理按钮标题重复元素,将同名的标题改名');
    var kaa=[],kab=[];
    for(var i=0;i<button.length;i++){

        var kac=1;
        while (kac)
        {
            if($.inArray(button[i][1],kaa)===-1){
                kaa.push(button[i][1]);
                kac=0;
            }else{
                k_log('“'+button[i][1]+'”重复!修改为“改'+button[i][1]+'”');
                button[i][1]='改'+button[i][1];
            }
        }

        // kaa.push(button[i][1]);
    }
    btn_name=kaa;
    // console.log(kaa);
    k_log("修改重复标题完成！");
    kb();
} //整理按钮标题重复元素

function kb() {
    k_log("开始创建按钮列表");
    var but_ul=$('#button');
    for(var i=0;i<button.length;i++){
        but_ul.append("" +
         "<li class='tg-list-item'>" +
            "<input class='tgl tgl-skewed' id='cb"+button[i][1]+"' value='"+button[i][1]+"' type='checkbox' >" +
            "<label class='tgl-btn' data-tg-off='"+button[i][1]+"' data-tg-on='"+button[i][1]+"' for='cb"+button[i][1]+"'></label>" +
         "</li>"
        )
    }

    but_ul.after('<input class="btn" type="button" value="提交" onclick="kd()">');

    k_log("创建按钮列表完成！");
    kc();
} //创建button的checkbox列表

function kc() {
    k_log("开始创建临时列表");
    var but_ul=$('#tem_button');
    var kca=btn_num[t];
    // console.log(kca);
    for(var i=0;i<kca.length;i++){
        // console.log(kca);
        but_ul.append("" +
            "<li class='tg-list-item'>" +
            "<input class='tgl tgl-skewed' id='tem"+kca[i]+"' value='"+kca[i]+"' type='checkbox'>" +
            "<label class='tgl-btn' data-tg-off='"+kca[i]+"' data-tg-on='"+kca[i]+"' for='tem"+kca[i]+"'></label>" +
            "</li>"
        )
    }

    // but_ul.append('  <li class="tg-list-item" style="width: 100px">\n' +
    //     '    <input type="text" class="form-control" id="name" placeholder="请输入名称">\n' +
    //     '    <input class="btn" type="button" value="添加临时分组" onclick="ke()">\n' +
    //     '  </li>');
    k_log("创建临时列表完成！");
}//创建临时列表

function i() {

    for(var i=0;i<tem_data.length;i++){
        tem_data[i][3]=f(tem_data[i][2]);
    }
    tem_data.sort();
    kg();
    k_log("获取统计数据完成！");
    // ka();
    // console.log(raw_data);

}//数据倒序，获取初始值，初始分

function k_log(tt) {
    log_div.append("<span class=\"label label-default\">"+tt+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+get_t()+"</span></br>");

}

function kd() {
    var ks_t=new Date().getTime();//起始时间

    var kda=[],kdb=[],kdc=[];
    $('#button').find(':checkbox:checked').each(function(){
        kda.push($(this).val());
    });

    if(kda.length){
        for(var i=0;i<kda.length;i++){
            if(!data[kda[i]]){
                kf(kda);
            }
            kdc.push(kda[i]);
            kdb.push({
                name:kda[i],
                type:'line',
                smooth: true,
                showSymbol: false,
                symbol: 'none',
                sampling: 'average',
                lineStyle: {
                    normal: {
                        width: 1
                    }
                },
                data: data[kda[i]]
            });
        }

        // console.log(qh);
        // console.log(kdc);
        // console.log(kdb);

    }else{
        alert('请选择要显示的分组！')
    }


    option = {
        // title : {
        //     text: '同名数量统计',
        //     subtext: '纯属虚构',
        //     x:'center'
        // },
        tooltip: {
            trigger: 'axis',
            position: function (pt) {
                return [pt[0], '10%'];
            }
        },
        legend: {
            type: 'scroll',
            orient: 'vertical',
            right: 10,
            top: 20,
            bottom: 20,
            data: kdc
        },
        // toolbox: {
        //     feature: {
        //         dataZoom: {
        //             yAxisIndex: 'none'
        //         },
        //         restore: {},
        //         saveAsImage: {}
        //     }
        // },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: qh,
            axisLine: { lineStyle: { color: '#8392A5' } }
        },
        yAxis: {
            type: 'value',
            axisLine: { lineStyle: { color: '#8392A5' } },
            boundaryGap: [0, '10%']
        },
        series : kdb

    };

    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }
    var d_t=new Date().getTime();//起始时间
    console.log("kd:"+(d_t-ks_t));


}
function ke() {
    var kea=[];
    $('#tem_button').find(':checkbox:checked').each(function(i){
        kea.push($(this).val()*1);

    });
    var keb=$('#tem_title').val();
    if(keb){
        if($.inArray(keb,btn_name)===-1){
            if(kea.length){
                btn_name.push(keb);
                button.push([0,keb,kea,"#FF0000","#FF0000"]);
                $('#button').append("" +
                    "<li class='tg-list-item'>" +
                    "<input class='tgl tgl-skewed' id='cb"+keb+"' value='"+keb+"' type='checkbox' checked>" +
                    "<label class='tgl-btn' data-tg-off='"+keb+"' data-tg-on='"+keb+"' for='cb"+keb+"'></label>" +
                    "</li>"
                )

            }else{
                alert('请选择包含的数值！');
            }
        }else{
            alert('重复的名称，请修改！');
        }
    }else{
        alert('名称不能为空！');
    }


}//获取临时列表数据，添加到按钮

function o() {

    var oa=$('#input_list');
    if(isNaN(oa.val()*1)){
        alert('输入有误！');
    }else{
        window.location.href='/zst/look/'+type+'/'+alo+'/'+tid+'/'+oa.val();
    }
}//跳转访问期数

function kf(kfa) {

    s_t=new Date().getTime();//起始时间

    if(kfa.length){

        var kfb=[],kfc=[],kfd=[],kfe=[];

        for(var a=0;a<button.length;a++){
            if($.inArray(button[a][1],kfa)>=0){
                kfd[button[a][1]]=[];
                kfd[button[a][1]][0]=button[a][2];
                kfd[button[a][1]][1]=kh(button[a][2]);
            }
        }


        for(var i=0;i<tem_data.length;i++){

            kfc.push(tem_data[i][0]);
            for(var j=0;j<kfa.length;j++){

                if(!data[kfa[j]]){

                    isNaN(kfe[kfa[j]])?(kfe[kfa[j]]=(0-kfd[kfa[j]][1])):(kfe[kfa[j]]=kfe[kfa[j]]-kfd[kfa[j]][1]);

                    if($.inArray(tem_data[i][3],kfd[kfa[j]][0])>=0){
                        kfe[kfa[j]]=kfe[kfa[j]]+k_zf;
                    }
                    if(!$.isArray(kfb[kfa[j]])){
                        kfb[kfa[j]]=[];
                    }

                    kfb[kfa[j]].push(kfe[kfa[j]]);


                }
            }

        }

        qh=kfc;

        for(var k=0;k<kfa.length;k++){

            if(!data[kfa[k]]){
                data[kfa[k]]=kfb[kfa[k]];
            }
        }

    }


    var d_t=new Date().getTime();//起始时间
    console.log("kf:"+(d_t-s_t));
}

function kg() {
    // 计算标准次数和标准间隔
    var ga=[];
    var g0=0;

    switch (t){
        case 28:
            for (var a = 0; a <= 9; a++) {
                for (var b = 0; b <= 9; b++) {
                    for (var c = 0; c <= 9; c++) {
                        ga[(a+b+c)] ? ga[(a+b+c)]++ : ga[(a+b+c)]=1;
                        g0++;
                    }
                }
            }
            break;
        case 16:
            for (var a = 1; a <= 6; a++) {
                for (var b = 1; b <= 6; b++) {
                    for (var c = 1; c <= 6; c++) {
                        ga[(a+b+c)] ? ga[(a+b+c)]++ : ga[(a+b+c)]=1;
                        g0++;
                    }
                }
            }
            break;
        case 11:
            for (var a = 1; a <= 6; a++) {
                for (var b = 1; b <= 6; b++) {
                    ga[(a+b)] ? ga[(a+b)]++ : ga[(a+b)]=1;
                    g0++;
                }
            }
            break;
        case 10:
            for (var a = 1; a <= 10; a++) {
                ga[(a)] ? ga[(a)]++ : ga[(a)]=1;
                g0++;
            }

            break;
        case 22:
            for (var a = 1; a <= 10; a++) {
                for (var b = a+1; b <= 10; b++) {
                    for (var c = b+1; c <= 10; c++) {
                        ga[(a+b+c)] ? ga[(a+b+c)]++ : ga[(a+b+c)]=1;
                        g0++;
                    }
                }
            }

            break;
        case 17:
            for (var a = 1; a <= 10; a++) {
                for (var b = a+1; b <= 10; b++) {
                    ga[(a+b)] ? ga[(a+b)]++ : ga[(a+b)]=1;
                    g0++;
                }
            }

            break;
        case 36:
            for (var a = 0; a <= 9; a++) {
                for (var b = 0; b <= 9; b++) {
                    for (var c = 0; c <= 9; c++) {
                        var tem_arr=[a,b,c];
                        tem_arr.sort();
                        if(a===b&&a===c&&b===c){
                            ga[0] ? ga[0]++ : ga[0]=1;
                        }else if(a===b||a===c||b===c){
                            ga[2] ? ga[2]++ : ga[2]=1;
                        }else if(((tem_arr[0]+1)===tem_arr[1]&&(tem_arr[1]+1)===tem_arr[2])||(tem_arr[0]===0&&tem_arr[1]===8&&tem_arr[2]===9)||(tem_arr[0]===0&&tem_arr[1]===1&&tem_arr[2]===9)){
                            ga[1] ? ga[1]++ : ga[1]=1;
                        }else if((tem_arr[0]+1)===tem_arr[1]||(tem_arr[1]+1)===tem_arr[2]||(tem_arr[0]===0&&tem_arr[2]===9)||(tem_arr[1]===8&&tem_arr[2]===9)){
                            ga[3] ? ga[3]++ : ga[3]=1;
                        }else {
                            ga[4] ? ga[4]++ : ga[4]=1;
                        }
                        g0++;
                    }
                }
            }

            break;
    }

    k_zf=g0;
    k_hm=ga;





// // console.log(ga);
//     var d_t=new Date().getTime();//起始时间
//     console.log("kg:"+(d_t-s_t));
//     s_t=new Date().getTime();//起始时间
    // return [gb,gc,gd];
}// 计算总分和号码包含的分值
function kh(kha) {
    var khb=0;

    if(kha.length){
        // console.log(kha);
        for(var i=0;i<kha.length;i++){
            // console.log(k_hm[kha[i]]);
            if(k_hm[kha[i]]){
                khb=khb+k_hm[kha[i]];

            }

        }
    }
    return khb;
}// 计算要统计的分组包含的号码总和值