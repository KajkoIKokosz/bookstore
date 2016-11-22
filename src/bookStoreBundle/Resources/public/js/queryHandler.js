$('documet').ready(function(){
    var URL = "http://127.0.0.1:8000/getJson/";
    var Json = $.ajax({
        url: URL,
        data: {},
        type:"GET",
        dataType:"json",
        success:function( json ){
            console.log("json załadowany");
            $.getJSON(URL, function(data) {
                $.each(data, function(index, value) {
                    var elem = $("<div>" + value.author + ": " + value.title  + "</div>");
                    $('#Book_list').prepend(elem);
                });
            });
        },
        error: function(  ) {
            console.log("json niezaładowany");
        }
        //complete: function( xhr, status ) {}
    });
    
})