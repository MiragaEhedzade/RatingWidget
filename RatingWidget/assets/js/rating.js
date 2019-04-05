$( document ).ready(function() {  
    
   $('.withHover').on('click', function() {
        
        var _this = $(this);
        var rating = _this.data('id');
        
        $.ajax({
            type: 'POST',
            data: 'rating='+rating+'&eduMatID='+eduMatID,
            url: ajaxUrl,
            cache: false,
            processData: false,
            
            success: function(data){ 
                window.location.reload();                
            }
        });
        
        return false;        
    });
    
});