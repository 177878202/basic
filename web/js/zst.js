var raw_data=[],da=1,tem_date=[],psize=50,pindex=0,pg,r,jd=[];
var s_t=new Date().getTime();//起始时间
jQuery(document).ready(function () {


    a();

    $("#page").on("pageClicked", function (event, pageIndex) {
        // $("#eventLog").append('EventName = pageClicked , pageIndex = ' + pageIndex + '<br />');
        pindex=pageIndex*1;
        i();
    }).on('jumpClicked', function (event, pageIndex) {
        // $("#eventLog").append('EventName = jumpClicked , pageIndex = ' + pageIndex + '<br />');
        pindex=pageIndex*1;
        i();
    }).on('pageSizeChanged', function (event, pageSize) {
        // $("#eventLog").append('EventName = pageSizeChanged , pageSize = ' + pageSize + '<br />');
        psize=pageSize*1;
        pindex=0;
        i();
    });
    $("#pbgSet").click(function(){
        $.cookie('_a_'+t)*1===1?$.cookie('_a_'+t,null,{ path: '/' }):$.cookie('_a_'+t,1,{ path: '/' });
        l();
    });//点击关闭或者打开声音
    $("#pautopenSet").click(function(){
        $.cookie('_r_'+t)*1===1?$.cookie('_r_'+t,null,{ path: '/' }):$.cookie('_r_'+t,1,{ path: '/' });
        l();
    });//点击关闭或者打开自动刷新
});


function a() {
    // ajax取JSON数据
    // var tem_length=raw_data.length;
    // console.log(tem_length);
    var aa;

    $.getJSON('?page='+da, function(data) {
        if(data){
            raw_data=raw_data.concat( data );
            // console.log(data.length);
            raw_data=d(raw_data);

            if(raw_data.length<p){
                da++;
                a();
            }else{

                aa=e(raw_data,p);//将原始数据按所需长度分组
                tem_date=aa[0];//取所需长度的第一组

                var d_t=new Date().getTime();//起始时间
                console.log("a:"+(d_t-s_t));
                s_t=new Date().getTime();//起始时间
                i();//截取数据并统计
            }
        }else{

            aa=e(raw_data,p);//将原始数据按所需长度分组
            tem_date=aa[0];//取所需长度的第一组

            var d_t=new Date().getTime();//起始时间
            console.log("a:"+(d_t-s_t));
            s_t=new Date().getTime();//起始时间
            i();//截取数据并统计
        }

        // data=d(data);

        // console.log(data);
        //

        // console.log(data.length);
        // console.log(raw_data.length);
        // console.log(raw_data.length);
        //
        // console.log(tem_length);
        // console.log(raw_data.length);
        // console.log(raw_data);
        // console.log(data.length);

    });
    // return false;
    // console.log(p)
}// ajax取JSON数据

function b() {
    // 初始，添加thead部分的TD
    var _display=JSON.parse($.cookie('_s_'+t));
    // _display=_display.sort();

    // console.log(JSON.stringify(_display));
    var _hidden=[];
    // _display2=[];
    // var myTable_thead_tr=$("#myTable thead tr");
    $.each(button, function(index, val) {

        if($.inArray(val[0]*1, _display)>=0){
            // myTable_thead_tr.append("<td data-btn='"+index+"'>"+index+"</td>");
            // myTable_thead_tr.append("<td data-btn='"+index+"'>"+val[1]+"</td>");

            // _display.push(val[0]*1);
        }else{
            _hidden.push(val[0]*1);
        }
    });
    // _display=d(_display);
    // _hidden=d(_hidden);
    // console.log(_display);
    // console.log(_hidden);
    $.cookie('_s_'+t, JSON.stringify(_display),{ path: '/' });
    $.cookie('_h_'+t, JSON.stringify(_hidden),{ path: '/' });
    var d_t=new Date().getTime();//起始时间
    console.log("b:"+(d_t-s_t));
    s_t=new Date().getTime();//起始时间
    i();
    // g();
}// 初始，添加thead部分的TD

function c(ca) {
    //先截取数据，根据_display数组统计结果

    var _display=JSON.parse($.cookie('_s_'+t));
    // console.log(_display);
    var cb=[],cc=[ca.length,null,null,null],ce=[],cf=[],cg=g(),ch=[],ci=[],cj=[],ck=[],cl=[];
    var cd=[50,100,200,300,500,1000,2000,3000,5000];
    var c1,c2;
    // console.log(button);

    $.each(ca, function(c, d){

        c1=f(d[2]);
        if($.inArray(c,cd)>=0){

            // if(ce[c]){}else{ce[c]=[c+'期出现次数',null,null,null];}
            ck=[c,null,null,null];
            //
            for(var i=0;i<cb.length;i++){
                cb[i]!==undefined&&ck.push(cb[i]);
            }
            //
            // $.each(cb, function(a, b){
            //     ck.push(b);
            // });

            ce.push(ck);
            // ce[c].push( c2.push(cc.slice(1)) );
            // ce[c].push( cb[b[0]]);
        }
        // console.log(button);
        $.each(button, function(a, b){
            if($.inArray(b[0]*1,_display)>=0){

                isNaN(cb[a])&&(cb[a]=0) ;


                isNaN(ch[a])?ch[a]=1:ch[a]++;//统计遗漏


                if(isNaN(ci[a])||ci[a]<ch[a]){ci[a]=ch[a]-1;}

                if($.inArray(c1,b[2])>=0){
                    // if(cb[a]){cb[a]++;}else{cb[a]=1}
                    cb[a]++;

                    isNaN(cj[a])&&(cj[a]=ch[a]-1);
                    ch[a]=0;
                }


            }
        });

    });


    // console.log( typeof ce);


    $.each(ch, function(a, b){
        isNaN(cj[a])&&((cj[a]=ch[a])&&(ci[a]=ch[a]));
    });
    // console.log(ch);
    // console.log(ci);

    ck=cc;
    //
    for(var i=0;i<cb.length;i++){
        cb[i]!==undefined&&ck.push(cb[i]);
    }

    ce.push(ck);

    cl.push(cg[1]);

    ck=['当前遗漏',null,null,null];
    //
    for(var i=0;i<cj.length;i++){
        cj[i]!==undefined&&ck.push(cj[i]);
    }

    cl.push(ck);

    ck=['最大遗漏',null,null,null];
    for(var i=0;i<ci.length;i++){
        ci[i]!==undefined&&ck.push(ci[i]);
    }
    cl.push(ck);

    cf.push(cl);



    // console.log(cl);
    cl=[];

    cl=cl.concat([cg[0]].concat(ce));
    // cl.push(ce);

    cf.push(cl);

    // console.log(cf);

    // cf=cf.concat(ck);
    // cf=cf.concat([['最大遗漏',null,null,null].concat(ci)]);


    // cf=cf.concat( ce );
    //
    // cf=cf.concat( [cg[0]] );
    //
    //
    // cf=cf.concat( [cg[2]] );

    var d_t=new Date().getTime();//起始时间
    console.log("c:"+(d_t-s_t));
    s_t=new Date().getTime();//起始时间
    return cf;
}//根据_display数组统计提交过来的数据

function i() {
// console.log(button);
    var ib=c(tem_date);

    var id=k(ib);

    var ic=j(tem_date,psize,pindex);

    var ie=$('#myTbody');

    ie.empty();
    ie.prepend(id+ic);

    if(!pg){
        pg=$("#page").page({
            // debug: true,
            total:tem_date.length,
            pageSize: psize,
            pageBtnCount: 9,
            showFirstLastBtn: true,
            firstBtnText: null,
            lastBtnText: null,
            prevBtnText: "&laquo;",
            nextBtnText: "&raquo;",
            loadFirstPage: false,
            showInfo: true,
            infoFormat: '当前 {start} ~ {end} ，总数 {total} ',
            showJump: true,
            jumpBtnText: 'Go',
            showPageSizes: true,
            pageSizeItems:[50,100,200,300,500,1000]

        });
        r||(h(0));
        l();
    }
    var d_t=new Date().getTime();//起始时间
    console.log("i:"+(d_t-s_t));
    s_t=new Date().getTime();//起始时间

}//显示操作

function l() {
    var la=$('#pbgSet'),lb=$('#pautopenSet');
    // $.cookie('_a_'+t)*1===1?la.html('<span><img src="/images/lb_c.gif" border="0"> 提示音</span>'):la.html('<span><img src="/images/lb.gif" border="0"> 提示音</span>');
    // $.cookie('_r_'+t)*1===1?lb.html('<span><img  src="/images/reflash_c.png" border="0"> 自动刷新</span>'):lb.html('<span><img  src="/images/reflash.png" border="0"> 自动刷新</span>');

    $.cookie('_a_'+t)*1===1?la.css('color', 'rgb(128, 128, 128)'):la.css('color', 'rgb(0, 128, 0)');
    $.cookie('_r_'+t)*1===1?lb.css('color', 'rgb(128, 128, 128)'):lb.css('color', 'rgb(0, 128, 0)');
    // var la=j(tem_date,psize,pindex);
    // $(".r7").remove();
    // $('#myTbody').append(la);
    //
    //
    // var d_t=new Date().getTime();//起始时间
    // console.log("l:"+(d_t-s_t));
    // s_t=new Date().getTime();//起始时间

}//换页操作

function k(ka) {
    var kb,kc,kd,ke;
    var k1=4;

    kb='<td>期号</td><td>时间</td><td>定位</td><td>号码</td>';

    kd='<td colspan="4" onclick="n()">切换显示</td><td style="display: none"></td><td style="display: none"></td><td style="display: none"></td>';

    var _display=JSON.parse($.cookie('_s_'+t));

    $.each(button, function(a, b){
        if($.inArray(b[0]*1,_display)>=0){
            k1++;

            kd=kd+'<td onclick="$(\'td:nth-child('+(k1)+')\').hide();m('+b[0]+')">'+b[1]+' </td>';

            kb=kb+'<td>'+b[1]+' </td>';
        }
    });

    kc='\n<tr class="r6">'+kd+'</tr>';

    $.each(ka, function(a, b){
        $.each(b, function(c, d){
            kd='';
            $.each(d, function(e, f){
                if(f!==null){
                    if(e>0){

                        if(a){
                            // console.log((d[0]/b[0][0]));
                            if(f>b[0][e]*(d[0]/b[0][0])){
                                kd=kd+'<td style="color: #FF0000">'+f+'</td>';
                            }else if(f<Math.round(b[0][e]*(d[0]/b[0][0]))){
                                kd=kd+'<td style="color: #0000FF">'+f+'</td>';
                            }else{
                                kd=kd+'<td>'+f+'</td>';
                            }
                        }else{
                            if(f>b[0][e]*3){
                                kd=kd+'<td style="color: #FF0000">'+f+'</td>';
                            }else if(f>b[0][e]*1){
                                kd=kd+'<td style="color: #0000FF">'+f+'</td>';
                            }else{
                                kd=kd+'<td>'+f+'</td>';
                            }

                        }


                    }else{
                        if(a&&c){
                            kd=kd+'<td colspan="4">'+f+'期出现次数</td>';
                        }else{
                            if(a){
                                kd=kd+'<td colspan="4">'+f+'期标准次数</td>';
                            }else{
                                kd=kd+'<td colspan="4">'+f+'</td>';
                            }

                        }
                    }
                }else{
                    kd=kd+'<td style="display: none"></td>';
                }
            });
            if(a&&c===0){
                ke='\n<tr class="r'+a+''+c+'">'+kd+'</tr>';
            }else{
                kc=kc+'\n<tr class="r'+a+''+c+'">'+kd+'</tr>';
            }
        });



    });

    kc=kc+ke;
    kc=kc+'\n<tr class="r5">'+kb+'</tr>';

    var d_t=new Date().getTime();//起始时间
    console.log("o:"+(d_t-s_t));
    s_t=new Date().getTime();//起始时间
    return kc;

}//表头内容

function o() {

    var oa=$('#input_list');
    if(isNaN(oa.val()*1)){
        alert('输入有误！');
    }else{
        window.location.href='/zst/view/'+type+'/'+alo+'/'+tid+'/'+oa.val();
    }
}

function j(ja,jb,jc) {
    var je='',jf=[],jg;
    // ja=e(ja,jb);

    // console.log(jf.length);
    if(jd.length===0){

        var _display=JSON.parse($.cookie('_s_'+t));
        if(jc>ja.length){jc=ja.length-1}

        var j1;
        $.each(ja, function(c, d){
            j1=f(d[2]);
            je='<td>'+d[0]+'</td>';
            je=je+'<td>'+d[1]+'</td>';
            if(type==="bjpk10"){
                var jh='';
                $.each(d[3], function(e, f){

                    jh=jh+'<img src="/images/pk10/pk_'+f+'.gif" class="img-circle">';
                });
                je=je+'<td>'+jh+'</td>';
                if(t===10){
                    je=je+'<td><img src="/images/pk10/pk_'+j1+'.gif" class="img-circle"></td>';
                }else{
                    je=je+'<td>'+j1+'</td>';
                }

            }else{
                je=je+'<td>'+d[2].join("+")+'</td>';
                je=je+'<td>'+j1+'</td>';
            }



            $.each(button, function(a, b){

                if($.inArray(b[0]*1,_display)>=0){

                    if($.inArray(j1,b[2])>=0){
                        // isNaN(jf[a])?jf[a]=0:jf[a]++;

                        je=je+'<td style="background-color: '+b[3] +';color: #FFF">'+b[1]+'</td>';
                        jf[a]=0;
                    }else{
                        isNaN(jf[a])?jf[a]=1:jf[a]++;
                        je=je+'<td style="background-color: '+b[4] +';color: #e6e6e6">'+jf[a]+'</td>';
                    }
                }
            });

            jd.push('<tr class="r7">'+je+'</tr>');
        });

    }

    jg=e(jd,jb);
    // var _display=JSON.parse($.cookie('_s_'+t));

    if(jc>ja.length){jc=ja.length-1}

    var d_t=new Date().getTime();//起始时间
    console.log("j:"+(d_t-s_t));
    s_t=new Date().getTime();//起始时间
    // console.log(jd);
    return jg[jc].join('\n');
}//根据_display数组填充提交过来的数据，返回的是表格内容

function h(ha) {
    ha=ha*1;
    if(((ha<8&&ha>-100)&&ha%2===0)||ha%15===0){
        var hb;
        // console.log(window.location.host);
        $.getJSON("/time?t="+type+"&"+Math.random(),function(data){
            // hb=data;
            console.log(data);
            if(data[0]*1>raw_data[0][0]*1){
                $("#refreshens").html('已经开奖，请等待刷新！');
                $.cookie('_a_'+t)||$('#audio').html('<audio autoplay="autoplay"><source src="/images/security.mp3" type="audio/mpeg"/></audio>');
                $.cookie('_r_'+t)||(r=setTimeout('location.reload()', 1000));
            }else{
                $("#refreshens").html("离开奖还有<span style='color: #FF0000'>"+ha+"</span>秒!");
                r = setTimeout('h('+(data[1]-1)+')', 1000);
            }
            // console.log(raw_data);
        });
    }else if (ha>-100){
        $("#refreshens").html("离开奖还有<span  style='color: #FF0000'>"+ha+"</span>秒!");
        r = setTimeout('h('+(ha-1)+')', 1000);
    }else{
        $("#refreshens").html("更新不到数据，可能服务器维护中！");
    }
}//自动刷新的播放声音

function g() {
    // 计算标准次数和标准间隔
    var _display=JSON.parse($.cookie('_s_'+t));
    var ga=[],gb=[],gc=[],gd=[];
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





    $.each(button, function(a, b) {//处理按钮组
        if($.inArray(b[0]*1, _display)>=0){
            var z=0;
            $.each(b[2], function(c, d ) {
                z=z+ga[d];
            });
            gb.push(z);
            gd.push(b[1]);
        }
    });


    $.each(gb, function(a, b) {
        gc.push(Math.round(g0/b));
    });
    gb.unshift(g0,null,null,null);
    gc.unshift("标准遗漏",null,null,null);
    gd.unshift('期号','时间','定位','号码');

// console.log([gb,gc]);
    var d_t=new Date().getTime();//起始时间
    console.log("g:"+(d_t-s_t));
    s_t=new Date().getTime();//起始时间
    return [gb,gc,gd];
}// 计算标准次数和标准间隔

function m(ma) {
    jd=[];
    var _hidden=JSON.parse($.cookie('_h_'+t));

    _hidden===null&&(_hidden=[]);
    // console.log(_hidden);
    _hidden.push(ma);

    var _display=[],_hidden2=[];
    $.each(button, function(index, val) {
        if($.inArray(val[0]*1, _hidden)>=0){
            _hidden2.push(val[0]*1);
        }else{
            _display.push(val[0]*1);
        }
    });
    // console.log(_hidden);
    // console.log(_display);
    $.cookie('_s_'+t, JSON.stringify(_display),{ path: '/' });
    $.cookie('_h_'+t, JSON.stringify(_hidden2),{ path: '/' });
    // if(_display.length<=1){
    //     n();
    // }
}//隐藏列
function n() {
    jd=[];
    var _hidden=JSON.parse($.cookie('_s_'+t));
    // _display=JSON.parse($.cookie('_h_'+t));
    var _display=[],_hidden2=[];

    $.each(button, function(index, val) {

        if($.inArray(val[0]*1, _hidden)>=0){
            _hidden2.push(val[0]*1);
        }else{
            _display.push(val[0]*1);
        }
    });

    $.cookie('_s_'+t, JSON.stringify(_display),{ path: '/' });
    $.cookie('_h_'+t, JSON.stringify(_hidden2),{ path: '/' });

    i();
}//切换显示

jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') {
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            };
            expires = '; expires=' + date.toUTCString();
        };
        var path = options.path ? '; path=' + options.path : '';
        var domain = options.domain ? '; domain=' + options.domain : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else {
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);

                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                };
            };
        };
        return cookieValue;
    };
};

function d(a) {
    // 清除数组中重复元素
    var hash=[],arr=[];
    for (var i = 0; i < a.length; i++) {
        if(!hash[a[i]]){
            arr.push(a[i]);
            hash[a[i]]=true;
        }
    }
    return arr;
}// 清除数组中重复元素
function e(array, subGroupLength) {
    //工具函数，将数组分成若干个可设定长度的小组
    var index = 0;
    var newArray = [];

    while(index < array.length) {
        newArray.push(array.slice(index, index += subGroupLength));
    }

    return newArray;
}//工具函数，将数组分成若干个可设定长度的小组

function f(a) {
    //工具函数，数组求和
    var x=0;

    if(t===36){
        a.sort();
        if(a[0]===a[1]&&a[0]===a[2]&&a[1]===a[2]){
            return 0;
        }else if(a[0]===a[1]||a[0]===a[2]||a[1]===a[2]){
            return 2;
        }else if(((a[0]*1+1)===a[1]*1&&(a[1]*1+1)===a[2]*1)||(a[0]*1===0&&a[1]*1===8&&a[2]*1===9)||(a[0]*1===0&&a[1]*1===1&&a[2]*1===9)){
            return 1;
        }else if((a[0]*1+1)===a[1]*1||(a[1]*1+1)===a[2]*1||(a[0]*1===0&&a[2]*1===9)){
            return 3;
        }else {
            return 4;
        }

    }
    for(var i=0;i<a.length;i++){
        x +=a[i];
    }

    return x;
} //工具函数，数组求和
