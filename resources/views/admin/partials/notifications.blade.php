@if ($errors->any())
    <div class="alert alert-danger">
       @if (count($errors->all()) > 1)
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
            
        @else
            {{ $errors->all()[0] }}    
        @endif
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if (session()->has('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
@endif