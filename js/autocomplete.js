aData = {};
$("#exercises").autocomplete({
    source: function(request, response){
        $.ajax({
            url: 'http://localhost/php/OptimisedGains/backend/connection.php',
            type: 'GET',
            dataType: 'json',
            success:function(data){
                // console.log(data);
                aData = $.map(data, function(value, key){
                    return{
                        id: value.id,
                        label:value.exercise_name,
                        type: value.exercise_type
                    };
                });
                // console.log(aData);
                var results = $.ui.autocomplete.filter(aData, request.term);
                response(results);

            }
        })
    }
})