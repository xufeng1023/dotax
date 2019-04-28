<template>
    <div class="form-row">
        <div class="form-group col-12 col-sm">
            <label :for="'visaType-'+index">Visa Type</label>
            <select v-model="row.visaType" class="custom-select" :index="'visaType-'+index" :name="'visaType-'+index">
                <option value=""></option>
                <option value="F1">F1 Student OPT or CPT</option>
                <option value="F2">F2 Spouse and children of student on F1</option>
                <option value="">J1 Student</option>
                <option value="">J2 Spouse or dependent of student on J1</option>
                <option value="">J1 Teacher or trainee(other than student)</option>
                <option value="">J2 Spouse or dependent of J1 Teacher or trainee</option>
                <option value="">M1 Student</option>
                <option value="">M2 Spouse or dependent of student</option>
                <option value="">Q1 Student</option>
                <option value="">Q2 Spouse or depedent of student on Q1</option>
                <option value="">Q1 Teacher or trainee(other than student)</option>
                <option value="">Q2 Spouse or dependent of teacher or trainee</option>
                <option value="">H1B Specialty Occupation Worker</option>
                <option value="">H4 Spouse or dependent of H-1B</option>
                <option value="">other</option>
            </select>
        </div>
        <div class="form-group col-12 col-sm">
            <label :for="'enterDate-'+index">Date Entered US on</label>
            <input type="text" class="form-control datepicker" :index="'enterDate-'+index" :name="'enterDate-'+index">
        </div>
        <div class="col-12 col-sm">
            <label :for="'leaveDate-'+index">Date Left US on</label>
            <input type="text" class="form-control datepicker" :index="'leaveDate-'+index" :name="'leaveDate-'+index">
        </div>
        <div class="form-group col-12 col-sm">
            <div class="pt-sm-4 mt-sm-3">
                <a @click.prevent="remove" href="#">- remove line</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item', 'index'],
    data() {
        return {
            row: this.item
            // visaType: this.item.visaType,
            // enterDate: this.item.enterDate,
            // leaveDate: this.item.leaveDate,
        }
    },
    created() {
        window.events.$on('collect', () => {
            window.events.$emit('startCollecting', {index:this.index,data:this.row})
        })
    },
    mounted() {
        let that = this;
        $('.datepicker').datepicker({
            onSelect: function(dateText, el) { 
                let key = el.id.split('-').shift()
                that.row[key] = dateText
            }
        });
    },
    methods: {
        remove() {
            window.events.$emit('remove', this.index)
        }
    }
}
</script>
