import FormResidency from './components/ResidencyComponent';
import PersonalInfo from './components/PersonalInfo';

export default {
    base: '/dotax',
    mode: 'history',
    routes: [
        {
            path: '/',
            component: FormResidency
        },
        {
            path: '/personal',
            component: PersonalInfo
        }
    ]
}