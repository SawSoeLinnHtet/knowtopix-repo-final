$(function(){
//   var topOfOthDiv = $(".hideshare").offset().top;
//   $(window).scroll(function() {
//       if($(window).scrollTop() > topOfOthDiv) { //scrolled past the other div?
//           $(".share").hide(); //reached the desired point -- show div
//       }
//       else{
//         $(".share").show();
//       }
//   });

  $(document).on("change", "#photo", function () {
      var file = this.files[0];
      console.log('hello');
      if (file) {
          let reader = new FileReader();
          reader.onload = function (event) {
              $(".imgPreview").addClass("d-block");
              $(".imgPreview").attr("src", event.target.result);
          };
          reader.readAsDataURL(file);
      }
  });
});