import Contacts from '../components/pages/contacts'
import FavouriteContacts from '../components/pages/favouriteContacts'


export default [
    {
        path: '/',
        component: Contacts
    },
    {
        path: '/favourite',
        component: FavouriteContacts
    },
]