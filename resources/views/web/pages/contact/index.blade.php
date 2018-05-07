@extends('web.layout.default')

@section('content')

    <ul class="list-group float-center">
        <li class="list-group-item">
            <input type="text" name="search" id="search" class="form-control" placeholder="search" v-model="search">
            <button class='btn btn-primary float-right mt-2'>Search</button>
        </li>
        <div id="example-2">
            <!-- `greet` is the name of a method defined below -->
            <button v-on:click="greet">Greet</button>
        </div>
        @foreach ($contacts as $contact)
        <li class="list-group-item">{{ $contact['firstname'] }} {{ $contact['lastname'] }} 
            <span class='float-right'>
                <span id="add"><i class="fas fa-plus-circle"></i></span>
                <i class="fas fa-edit"></i>
                <i class="fas fa-trash"></i>
            </span>
        </li> 
        @endforeach
    </ul>

@endsection
    
@section('footer')

<script>
var example2 = new Vue({
  el: '#example-2',
  data: {
    name: 'Vue.js'
  },
  // define methods under the `methods` object
  methods: {
    greet: function (event) {
      // `this` inside methods points to the Vue instance
      alert('Hello ' + this.name + '!')
      // `event` is the native DOM event
      if (event) {
        alert(event.target.tagName)
      }
    }
  }
})
</script>

@endsection
    
    
    

