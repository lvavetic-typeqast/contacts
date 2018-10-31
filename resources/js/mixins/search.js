export default {
    computed: {
        filteredContacts:function(){
            return this.contacts.filter((contact) => {
                var fullname = contact.firstname.toLowerCase() + ' ' + contact.lastname.toLowerCase();

                return fullname.match(this.search.toLowerCase());
            });
        }
    }
}