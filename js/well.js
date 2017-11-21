$("document").ready(function(){
  
	$("#drag_img1").draggable();
	$("#drag_img2").draggable();
	$("#drag_img3").draggable();
	$("#drag_img4").draggable();
	$("#drag_img5").draggable();
	
	$("#articale").accordion({
	  animate : 1000,
		active: 1,
		collapsible: true,
		event: "click",
		heighStyle: "content"
	});
	$("#tab").tabs({
		event: "click",
		show: "fadeIn",
		hide: "fadeOut",
		active: 0,
		collapsible: true,
		heightStyle: "content"
	});
    
    // read url
    console.log("test");
    function readURL(input,id) {

      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $("#"+id).attr('style', 'background-image:url('+e.target.result+')');
          }

          reader.readAsDataURL(input.files[0]);
      }
    }

    $('.file-wall').change(function () {
        console.log(this)
        var id = $(this).attr('data-backId');
        console.log(id);
        readURL(this,id);
    });
	
});