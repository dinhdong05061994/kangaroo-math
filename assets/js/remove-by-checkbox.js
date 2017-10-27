$("#check_all").click(function(){
        if($(this).prop('checked')){
            $( "input" ).each(function(){
                $(this).prop('checked', true);
            });
        } else {
            $( "input" ).each(function(){
                $(this).prop('checked', false);
            });
        } 
    });
    
    function removeByCheckbox(urlProccess, urlIndex) {
        var arrayId = [];
        if($("#check_all").prop('checked')){
            $( ".child" ).each(function(){
                arrayId.push($(this).attr('id').substr(6));
            });
        } else {
            $( "input:checked" ).each(function(){
                arrayId.push($(this).attr('id').substr(6));
            });
        }
        if (confirm('Do you really want to delete had choice?')) {
            var url = urlProccess;
            var obj = {};
            for (var i = 0; i < arrayId.length; i++) {
                obj[i] = arrayId[i];
            } 
            $.post(url, obj, function(data){
                if (data.error) {
                    alert(data.message);
                }
                window.location.href = urlIndex;
            });
        }
        return false;
    }


