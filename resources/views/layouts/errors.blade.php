@if ($errors->any())
    <div class="alert alert-danger" style="color:red">
        The following error(s) were discovered... <br/>
        @foreach ($errors->all() as $key => $error)
           {{$key+1}}. {{ $error }}  <br/>
        @endforeach
    </div>
    <br/>
@endif