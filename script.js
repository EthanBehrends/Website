$(document).ready(function() {
  $("#thanks").hide();
  $("#err").hide();
  $("#submit").click(function () {
    if($("#number").val() != "" && $("#name").val() != "" && $("#email").val() != "") {
      $("#form").addClass('fadeout');
      $("#form input").prop("readonly", true);
      $("#err").hide();
      $("#thanks").show();
      var form = $('#emailform');
      $(form).submit(function(){
        event.preventDefault();
        var formData = $(form).serialize();
        $.ajax({
          type: 'POST',
          url: $(form).attr('action'),
          data: formData
        }).done(function(response) {
          $("input").not('#submit').val('');
          $("#thanks").show();
          }).fail(function(data) {
          $("#err").show();
          $("#thanks").hide()
          $('#err').text("Looks like something went wrong on our end, double check the fields above and resubmit.");
        })
      });
    }
    else {
      $("#err").show();
    }
  });
});
