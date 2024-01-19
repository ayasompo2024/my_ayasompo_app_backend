@if (count($errors) > 0)
<div>
    <br>
    <ul class="alert alert-danger pt-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
