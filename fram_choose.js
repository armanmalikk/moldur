$(document).ready(function(){
    $(".same").click(function(){
         // console.log(this.id);
        var img_title = $(this,'img').attr('value');
        // console.log(img_title); //undefined.
        
        $(".name").val(img_title);
    });

    $(".same2").click(function(){
         // console.log(this.id);
        var img_title2 = $(this,'img').attr('id');
        // console.log(img_title2); //undefined.
        
        $(".single_frame_price").val(img_title2);
    });
    
});