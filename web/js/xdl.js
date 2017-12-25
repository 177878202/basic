//用于采集新德里数据，http://www.opencai.net/open/



var qh=0;
jQuery(document).ready(function () {


/*    $("td").each(function(){

       if($(this).text()==='[XDLKL8]印度新德里快乐8'){
           // alert(($(this).nextAll().text()).join("."));
           $(this).nextAll().each(function(){
               alert($(this).text());
           })
       }

    });*/
/*
    $.ajax({
        url: "?ob=XDLKL8&_=" + Math.random(),
        type: 'get',
        async: false,
        dataType: 'json',
        success: function(ob) {
            for (var c in ob) _self.ob[c] = ob[c];

        },
        error: function() {}
    });*/
/*

    $.getJSON("?ob=XDLKL8&_=" + Math.random(),function(json){
        // $.getJSON("http://vv28.cc/diy/re_time.php?_=" + Math.random(), function(data) {
        alert(json);


    });
*/

/*

    $.getJSON("http://vv28.cc/caiji2/xdl.php?key=bobo&n=0&jsoncallback=?",function(json){
    // $.getJSON("http://vv28.cc/diy/re_time.php?_=" + Math.random(), function(data) {
     alert(json['r']);


    });
*/
m();
});

function m() {





    $.getJSON("?ob=XDLKL8&_=" + Math.random(), function(data) {
        if(data){
            var tem_qh=0;
            $.each(data['xdlkl8']['_'], function(index, val) {
                if(val&&val['p'].replace(/-/, "")*1>qh){

                    if(val['p'].replace(/-/, "")*1>tem_qh){
                        tem_qh=val['p'].replace(/-/, "")*1;
                    }
                    tem=val['p'].replace(/-/, "")+','+val['t']+','+val['r'];

                    console.log(tem);

                    $.getJSON("http://vv28.cc/caiji2/new_xdl2.php?key=bobo&n="+tem+"&jsoncallback=?",function(json){

                    });

                }

            });

            if(tem_qh>qh){
                qh=tem_qh;
            }
        }


    });


    setTimeout(function() {
        m()
    }, 2200);

}