$(document).ready(function(){
    
//    $.getJSON('http://date.jsontest.com/', function(data) {
//        console.log(data);
//    });

    $.ajax({
        url: 'http://127.0.0.1:8000/setJson',
        dataType: 'json',
        type: 'get',
        cache: false,
        success: function(data) {
            console.log("pobrano dane");
        }
//        success: function(data) {
//            $(data).each(function(index, value){
//                console.log(index, value);
//            })

        });
})
  
