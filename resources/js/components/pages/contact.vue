<template>
    <div class="contact">
        <div class="media p-2">
            <img class="mr-3" src="https://whatsupcairo.com/site/wp-content/uploads/2018/04/Avicii.jpg" alt="Generic placeholder image" width="300" height="300">
            <div class="media-body">
                <div v-if="!editContact">
                    <button v-on:click="editContact = true" class="btn btn-primary float-right mb-1">Edit</button>
                    <h3 class="mt-0">{{ contact.firstname }} {{ contact.lastname }}</h3>
                    <h5>{{ contact.email }}</h5>
                    <p v-if="contact.is_favorite == 1" class="font-weight-bold">
                        Favorite: Yes <i class="fas fa-star"></i>
                    </p>
                    <p v-else class="font-weight-bold">
                        Favourite: No <i class="far fa-times-circle"></i>
                    </p>
                </div>
                <div class="mb-3" v-else>
                    <div v-if="errors">
                        <p class="alert-danger p-2" v-for="error in errors">{{ error.toString() }}</p>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
                        </div>
                        <input v-model="contact.firstname" type="text" class="form-control" placeholder="Firstname" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-signature"></i></span>
                        </div>
                        <input v-model="contact.lastname" type="text" class="form-control" placeholder="Lastname" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                        </div>
                        <input v-model="contact.email" type="text" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <div>
                                    <input v-model="contact.is_favorite"  id="checkbox" type="checkbox" aria-label="Checkbox for following text input">
                                </div>
                            </div>
                        </div>
                        <input class="form-control" aria-label="Text input with checkbox" disabled placeholder="Favorite">
                    </div>
                    <button v-on:click="editContact = false" class="btn btn-danger float-right ml-1">Cancel</button>
                    <button v-on:click.prevent="saveContact()" class="btn btn-primary float-right mb-1">Save</button>
                </div>

                <div class="phoneNumbers mt-3" v-if="!editContact">
                    <table class="table table-bordered table-hover mt-3" v-if="! contact.numbers.length == 0">
                        <thead class="thead-background">
                            <h5 class="text-center mt-1">Numbers</h5>
                        </thead>
                        <tbody>
                            <tr v-for="number in contact.numbers">
                                <td>
                                    <button class="btn btn-primary float-right mb-1">Edit</button>
                                    <p class="font-weight-bold mt-3"><span class="text-uppercase">{{ number.label }}</span>: {{ number.number }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data ()  {
            return {
                id: this.$route.params.id,
                contact: {},
                errors: [],
                editContact: false,
            }
        },
        methods: {
            saveContact: function () {
                let self = this;

                axios({
                    method: 'put',
                    url: 'http://contactapp.test/api/contact/' + this.id,
                    data: {
                        id: this.id,
                        firstname: this.contact.firstname,
                        lastname: this.contact.lastname,
                        email: this.contact.email,
                        is_favorite: this.contact.is_favorite,
                    }
                }).then(function (data) {
                    if (data.data.errors) {
                        return self.errors = data.data.errors;
                    }
                    console.log(data.data.data);
                    //set new values to contact object
                    self.editContact = false;
                    return self.contact = data.data.data;
                });
            },
        },
        mounted () {
            let self = this
            axios
                .get('http://contactapp.test/api/contact/' + this.id)
                .then(function(data){
                    self.contact = data.data.data;
                })
        },
    }
</script>

<style scoped>

</style>