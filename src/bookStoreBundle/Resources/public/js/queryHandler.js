$('documet').ready(function(){
    $.ajax({
        url:"http://127.0.0.1:8000/getJson/",
        data: {},
        type:"GET",
        dataType:"json",
        success:function( json ){
            console.log("jest ok");
        },
        error: function(  ) {
            console.log("dupa");
        }
        //complete: function( xhr, status ) {}
        
    });
    
    
})