<form method="POST" action="/task">
    <input type="text" name="name">
    <input type="number" name="estimate">
    <input type="number" name="project" hidden="hidden" value="{{$projectId}}">
    <input type="submit">
</form>