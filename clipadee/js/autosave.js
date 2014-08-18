setInterval(function()
{
  (function($)
  {
    $.fn.autoSubmit = function(options) 
    {
      return $.each(this, function() 
      {
        // VARIABLES: Input-specific
        var textarea = $(this);
        var column = textarea.attr('name');

        // VARIABLES: Form-specific
        var form = textarea.parents('form');
        var method = form.attr('method');
        var action = form.attr('action');

        // VARIABLES: Where to update in database
        var where_val = form.find('#where').val();
        var where_col = form.find('#where').attr('name');

        // ONBLUR: Dynamic value send through Ajax
        textarea.bind('blur', function(event) 
        {
          // Get latest value
          var value = textarea.val();
          
          // AJAX: Send values
          $.ajax(
          {
            url: action,
            type: method,
            data: 
            {
              val: value,
              col: column,
              w_col: where_col,
              w_val: where_val
            },
            cache: false,
            timeout: 10000,
            success: function(data) 
            {
              // Alert if update failed
              if (data) 
              {
                alert(data);
              }
              // Load output into a P
              else
              {
                $('#notice').text('Updated');
                $('#notice').fadeOut().fadeIn();
              }
            }
          });
          // Prevent normal submission of form
          return false;
        })
      });
    }
  })(jQuery);

  // JQUERY: Run .autoSubmit() on all INPUT fields within form
  $(function()
  {
    $('#ajax-form TEXTAREA').autoSubmit();
  });

},3000);    