$(document).ready(function()
    {
      $(".user").hide();
      $("#admin_button").addClass('active');
      $("#admin_button").click(function()
        {
          $(".user").hide();
          $(".admin").show();
          $(this).addClass('active');
          $("#user_button").removeClass('active');
        });
                               
      $("#user_button").click(function()
        {
          $(".admin").hide();
          $(".user").show();
          $(this).addClass('active');
          $("#admin_button").removeClass('active');

        });
    });
        