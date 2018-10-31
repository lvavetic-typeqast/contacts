<template>
    <div>
        <header class='hidden-print'>
            <div class='wrapper-header'>
                <div class='container-fluid'>
                    <logo></logo>

                    <navigation></navigation>

                    <div class='clearfix'></div>
                </div>
            </div>
        </header>
        <div class='wrapper-content'>
            <div class=''>
                <!--include sidebar-->
            </div>

            <div class="container">
                <router-view></router-view>
            </div>

            <div class='clearfix'></div>
        </div>
        <footer>
            <div class="wrapper-footer">
                <hr class='bg-secondary my-4'>
                <copyright></copyright>
            </div>
        </footer>
    </div>
</template>

<script>
    //header
    import Navigation from './components/header/navigation.vue'
    import Logo from './components/header/logo.vue'

    //content
    import Contacts from './components/pages/contacts.vue'

    //footer
    import Copyright from './components/footer/copyright.vue'

    export default {
        components: {
            //header
            'navigation': Navigation,
            'logo': Logo,

            //content
            'contacts': Contacts,

            //footer
            'copyright': Copyright,
        }
    }
</script>

<style scoped>

</style>