import FormResidency from './components/ResidencyComponent';
import PersonalInfo from './components/PersonalInfo';
import NoneResidentProgram from './components/NoneResidentProgram'

export default {
    base: '/dotax',
    mode: 'history',
    routes: [
        {
            path: '/',
            component: FormResidency
        },
        {
            path: '/none-resident-program',
            component: NoneResidentProgram
        },
        {
            path: '/personal',
            component: PersonalInfo
        }
    ]
}