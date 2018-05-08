@extends('web.layout.default')

@section('content')

    <ul class="list-group float-center" id="searchbox">
        <li class="list-group-item" >
            <input type="text" name="search" id="search" class="form-control" placeholder="search" v-model="search">
            <span class="text-muted font-size-sm mt-3">@{{ currentStatus }} </span>
        </li>
        
        <li v-for="models in models.data" class="list-group-item">
            @{{ models.firstname }} @{{ models.lastname }} 
            <span class='float-right'>
                <span id="add"><i class="fas fa-plus-circle"></i></span>
                <i class="fas fa-edit"></i>
                <i class="fas fa-trash"></i>
            </span>
        </li> 
    </ul>

@endsection
    
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.10/lodash.min.js"></script>
<script>
var searchbox = new Vue({
    el: '#searchbox',
    data: {
      search: '',
      models: '',
      currentStatus: '',
    },
    watch: {
        search: function() {
            this.models = ''
            if (this.search.length > 0) {
                this.findContact()
            }
        }
    },
    methods: {
        findContact: _.debounce(function(){
            var searchbox = this
            searchbox.currentStatus = 'Searching...'
            axios.post('http://www.contacts.com/api/contact_search?search=' + searchbox.search)
                .then(function (response) {
                    console.log(response.data)
                    searchbox.currentStatus = "Data with keyword: " + searchbox.search + ' has been found!'
                    searchbox.models = response.data 
                })
                .catch(function(error){
                    searchbox.currentStatus = "Invalid entry!"
                }) 
        }, 1000),
    }
  })
</script>
@endsection
    
    
    

