<template>
    <div class="contact">
        <div class="media p-2">
            <img class="mr-3" src="https://whatsupcairo.com/site/wp-content/uploads/2018/04/Avicii.jpg" alt="Generic placeholder image" width="300" height="300">
            <div class="media-body">
                <button class="btn btn-primary float-right mb-1">Edit</button>
                <h3 class="mt-0">{{ contact.firstname }} {{ contact.lastname }}</h3>
                <h5>{{ contact.email }}</h5>
                <p v-if="contact.is_favorite === 1" class="font-weight-bold">
                    Favorite: Yes <i class="fas fa-star"></i>
                </p>
                <p v-else class="font-weight-bold">
                    Favourite: No <i class="far fa-times-circle"></i>
                </p>
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
</template>

<script>
    export default {
        data ()  {
            return {
                id: this.$route.params.id,
                contact: {},
            }
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