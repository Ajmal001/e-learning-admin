@if($errors->count() > 0)
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item">
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            </li>
        @endforeach
    </ul>
@endif