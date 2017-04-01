@if($errors->any())
    <div class="alert alert-warning">
        @foreach(collect($errors->all())->unique() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif