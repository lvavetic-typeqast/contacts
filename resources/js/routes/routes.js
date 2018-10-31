import Contacts from '../components/pages/contacts'
import FavouriteContacts from '../components/pages/favouriteContacts'
import Contact from '../components/pages/contact'


export default [
    {
        path: '/',
        component: Contacts
    },
    {
        path: '/favourite',
        component: FavouriteContacts
    },
    {
        path: '/contact/:id',
        component: Contact
    },
]