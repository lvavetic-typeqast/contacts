<template>
    <div>
        <div class="input-group">
            <input type="text" class="form-control" v-model="search">
            <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fas fa-lg fa-search"></i>
                    </span>
            </div>
        </div>
        <div class="contacts">
            <div class="row">
                <div v-for="contact in filteredContacts" class="col-12 col-md-3">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="https://oneedm.com/wp-content/uploads/2018/04/avicii.jpg" alt="Card image cap" width="600" height="400">
                        <div class="card-body">
                            <h5 class="card-title">{{ contact.firstname }} {{ contact.lastname }}</h5>
                            <p class="card-text">{{ contact.email }}</p>
                            <a href="#" class="btn btn-primary">Go to contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import search from '../../mixins/search';

export default {
    data ()  {
        return {
            contacts: [],
            search: ''
        }
    },
    mounted () {
        let self = this
        axios
            .get('http://contactapp.test/api/contacts')
            .then(function(data){
                self.contacts = data.data.data;
            })
    },
    mixins: [search]
}
</script>

<style scoped>

</style>