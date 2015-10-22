<!DOCTYPE html>

<html lang="en" class="gradient-background">
<head>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>
<div>
    @yield('content')
</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function() {
        var date = new Date();
        date.setMonth({{$m}} - 1 );
        $('#mydate').datepicker({defaultDate: date});
        $( "#datepicker" ).datepicker({ firstDay: 1, defaultDate: date });
        $('#project').change(function(){
            $.get("{{ url('api/dropdown')}}",
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
    });

</script>
</body>
</html>