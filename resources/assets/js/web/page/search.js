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
                    if (response.data.length > 0) {
                        searchbox.currentStatus = "Data with keyword: " + searchbox.search + ' has been found!'
                    } else {
                        searchbox.currentStatus = "Data with keyword: " + searchbox.search + ' has not been found!'
                    }
                    searchbox.models = response.data
                })
                .catch(function(error){
                    searchbox.currentStatus = "Invalid entry!"
                })
        }, 1000),
    }
  })