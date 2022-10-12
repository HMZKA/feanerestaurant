@if ($errors->any())
<div class="alert alert-danger text-start fade show">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('not'))
    
    <div class="alert alert-danger alert-dismissible text-black">
        {{ session('not') }}
       
    </div>
    
@endif
@if (session('success'))
    
    <div class="alert alert-warning alert-dismissible text-black">
        {{ session('success') }}
       
    </div>
    
@endif
