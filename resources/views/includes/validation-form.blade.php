@if ($errors -> any())
    <ul class="errors">
        @foreach($errors->all() as $error)  
        <li class="error">{{ $error }}</li>
    </ul>
        @endforeach
    
@endif
