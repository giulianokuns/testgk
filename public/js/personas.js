
$(document).ready(function(){
    /**
    *   AJAX para cambiar la actividad de una persona.
    */
    $('.activePerson').click(function() {
        ci = $(this).data('ci');
        activity = $(this).val();
        button = $(this);
        $.ajax({
            type: "POST",
            url: "http://localhost/GK/test/index.php/personas/changeActivity/"+ci+"/"+activity
        })
        .done(function (result) {  
            if (result == 0) {
                button.attr("class", "activePerson btn btn-success");
                button.attr("value", "1");
            } else {
                button.attr("class", "activePerson btn btn-danger");
                button.attr("value", "0");
            }
        })
    });
});

