@extends('web.layout.default')

@section('content')


<div class="float-center">
    <ul class="list-group w-50">
        @foreach ($contacts as $contact)
        <li class="list-group-item">{{ $contact['firstname'] }} {{ $contact['lastname'] }} 
            <span class='float-right'>
                <i class="fas fa-plus-circle"></i>
                <i class="fas fa-edit"></i>
                <i class="fas fa-trash"></i>
            </span>
        </li> 
        @endforeach
    </ul>
</div>


@endsection
    
    
    
    

