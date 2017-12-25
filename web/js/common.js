var raw_data=[],da=1,tem_data=[],psize=50,pindex=0,pg,r,jd=[];
var s_t=new Date().getTime();//起始时间

function a() {
    // ajax取JSON数据
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
                tem_data=aa[0];//取所需长度的第一组

                var d_t=new Date().getTime();//起始时间
                console.log("a:"+(d_t-s_t));
                s_t=new Date().getTime();//起始时间
                i();//截取数据并统计
            }
        }else{

            aa=e(raw_data,p);//将原始数据按所需长度分组
            tem_data=aa[0];//取所需长度的第一组

            var d_t=new Date().getTime();//起始时间
            console.log("a:"+(d_t-s_t));
            s_t=new Date().getTime();//起始时间
            i();//截取数据并统计
        }


    });
}// ajax取JSON数据


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

function get_t() {
    var myDate = new Date();

    // myDate.getYear();        //获取当前年份(2位)
    // myDate.getFullYear();    //获取完整的年份(4位,1970-????)
    // myDate.getMonth();       //获取当前月份(0-11,0代表1月)
    // myDate.getDate();        //获取当前日(1-31)
    // myDate.getDay();         //获取当前星期X(0-6,0代表星期天)
    // myDate.getTime();        //获取当前时间(从1970.1.1开始的毫秒数)
    // myDate.getHours();       //获取当前小时数(0-23)
    // myDate.getMinutes();     //获取当前分钟数(0-59)
    // myDate.getSeconds();     //获取当前秒数(0-59)
    // myDate.getMilliseconds();    //获取当前毫秒数(0-999)
    // myDate.toLocaleDateString();     //获取当前日期
    // var mytime=myDate.toLocaleTimeString();     //获取当前时间
    // myDate.toLocaleString( );        //获取日期与时间
    // console.log(myDate.toLocaleTimeString());
    return myDate.toLocaleTimeString()+":"+myDate.getMilliseconds()+"ms";

}