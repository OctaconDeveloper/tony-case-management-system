@if (Session::has('message'))
<div class="alert alert-success" style="color:green">
    {!! Session::get('message') !!}
</div>
<br/>
@endif