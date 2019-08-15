import FormResidency from './components/ResidencyComponent'
import PersonalInfo from './components/PersonalInfo'
import FilingStatus from './components/FilingStatus'
import NoneResidentProgram from './components/NoneResidentProgram'
import Income from './components/Income'
import W2 from './components/W2'
import TaxTreaty from './components/TaxTreaty'

export default {
    base: '/',
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
        },
        {
            path: '/income',
            component: Income
        },
        {
            path: '/filing-status',
            component: FilingStatus
        },
        {
            path: '/income/w2',
            component: W2
        },
        {
            path: '/income/tax-treaty',
            component: TaxTreaty
        }
    ]
}