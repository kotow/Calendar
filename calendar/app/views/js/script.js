//My custom functions

function renderProgress(circleId, progress)
{
    progress = Math.floor(progress);
    if(progress<25){
        var angle = -90 + (progress/100)*360;
        $("#"+circleId+" .animate-0-25-b").css("transform","rotate("+angle+"deg)");
    }
    else if(progress>=25 && progress<50){
        var angle = -90 + ((progress-25)/100)*360;
        $("#"+circleId+" .animate-0-25-b").css("transform","rotate(0deg)");
        $("#"+circleId+" .animate-25-50-b").css("transform","rotate("+angle+"deg)");
    }
    else if(progress>=50 && progress<75){
        var angle = -90 + ((progress-50)/100)*360;
        $("#"+circleId+" .animate-25-50-b, #"+circleId+" .animate-0-25-b").css("transform","rotate(0deg)");
        $("#"+circleId+" .animate-50-75-b").css("transform","rotate("+angle+"deg)");
    }
    else if(progress>=75 && progress<=100){
        var angle = -90 + ((progress-75)/100)*360;
        $("#"+circleId+" .animate-50-75-b, #"+circleId+" .animate-25-50-b, #"+circleId+" .animate-0-25-b")
                                              .css("transform","rotate(0deg)");
        $("#"+circleId+" .animate-75-100-b").css("transform","rotate("+angle+"deg)");
    }
};

function animOccup(delay, userId, percentage,  progress) {
    if(progress > percentage) {
        return;
    }
    
    setTimeout(function(){
        renderProgress("user-"+userId, progress);
        animOccup(delay, userId, percentage, progress + 1)
    }, delay);
    
}

//INITIALIZE
    
$(function() {
    
    //Datepicker
    var date = new Date();
    date.setMonth(09 - 1 );
    $('#mydate').datepicker({defaultDate: date});
    $( "#datepicker" ).datepicker({ firstDay: 1, defaultDate: date });
    
    //Backend comms
    $('#project').change(function(){
        $.get("http://localhost:8000/api/dropdown",
                { option: $(this).val() },
                function(data) {
                    var model = $('#task');
                    model.empty();
                    model.append('<option value="" disabled selected>Select task</option>');
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.name + "</option>");
                    });
                });
    });
    
    
    
    //Progress bars
    var occupancy = {'victor':      25,
                     'karamfil':    45,
                     'mehmed':      30,
                     'ivo':         85,
                     'angelina':    60,
                    };
    
    $.each(occupancy, function(key, value){
        animOccup(20, key, value, 0);
       
    });
    
    //Theme picker
    
    $("#theme-picker").change(function(e){
        var themeId = e.currentTarget.value;
        $('.themes').remove();
        $('head').append('<link class="themes" href="css/theme-'+themeId+'.css" rel="stylesheet">');
    });
});    
    
