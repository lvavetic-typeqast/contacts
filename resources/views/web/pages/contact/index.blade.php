@extends('web.layout.default')

@section('content')

<div class='row'>
    <div class='col-2'></div>
        <div class="col-8">
            <ul class="list-group float-center">
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
    <div class='col-2'></div>
</div>


@endsection
    
    
    
    

