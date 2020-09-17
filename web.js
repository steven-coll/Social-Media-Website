
$(document).ready(function() {

    $('#loading').html('Loading...');

        $.ajax({
            type: 'GET',
            url: 'http://ec2-3-15-201-223.us-east-2.compute.amazonaws.com/final/message.xml',          
            dataType: 'xml',    
            success: function(xml) {
                
                $('#loading').html('');

                $(xml).find('dev').each(function() {
                        
                 
                $('#dialog').append(
                    '<div>' +
                    
                    '<div><b>Message from the developer: </b>' +
                    
                    $(this).find('msg').text() + '</div> ' +
                    
                    '</div>');
                    
                    });
                }
            });
    
    
   $('.img_div').click(function () {

    $(this).toggleClass('active');

});
 
        });

/* used this site to learn how to make a function that lets you preview an image before you upload https://developer.mozilla.org/en-US/docs/Web/API/FileReader/readAsDataURL */
function imgpreview() {
    
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {

    preview.src = reader.result;
    
  }, false);

  if (file) {
      
    reader.readAsDataURL(file);
    
  }
}
