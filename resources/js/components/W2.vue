<template>
    <div>
        <a href="#" @click.prevent="$router.go(-1)">Back</a>
        <h3 class="my-4">W2</h3>
        <h5 class="my-4">Employer Information</h5>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box B - Employer Identification Number (EIN):</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Employer's Name:</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Employer's Address:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Employer's City:</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Employer's State:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Employer's Zip Code:</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <h5 class="my-4">Federal Tax Information</h5>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 1 - Wages and Tips</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 2 - Federal Income Tax Withheld</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 3 - Social Security Wages</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 4 - Social Security Tax Withheld</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 5 - Medicare Wages and Tips</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 6 - Medicare Tax Withheld</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 7 - Social Security Tips</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 8 - Allocated Tips</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 9 - Verification Code (optional)</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 10 - Dependent Care Benefits</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-6">
                <label>Box 11 - Nonqualified Plans:</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm">
                <label>Box 12</label>
            </div>
        </div>
        <div v-for="(item, index) in box12" :key="index" class="form-group row">
            <div class="col-12 col-sm">
                <label>Code:</label>
                <select v-model="item.code" class="form-control">
                    <box-12-code></box-12-code>
                </select>
            </div>
            <div class="col-12 col-sm">
                <label>Amount:</label>
                <input v-model="item.amount" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <a href="#" @click.prevent="addOneLine('box12')">+ add one line</a>
        </div>
        <div class="row">
            <div class="col-12 col-sm">
                <label>Box 14 - Other</label>
            </div>
        </div>
        <div v-for="(item, index) in box14" class="form-group row">
            <div class="col-12 col-sm">
                <label>Description:</label>
                <input v-model="item.desc" type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Amount:</label>
                <input v-model="item.amount" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <a href="#" @click.prevent="addOneLine('box14')">+ add one line</a>
        </div>
        <h5 class="my-4">State and Local Tax Information</h5>
        <div v-for="(item, index) in box15">
            <div class="form-group row">
                <div class="col-12 col-sm">
                    <label>Box 15 - State:</label>
                    <input v-model="box15[index].state" type="text" class="form-control">
                </div>
                <div class="col-12 col-sm">
                    <label>Employer's State ID Number:</label>
                    <input v-model="box15[index].ID" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm">
                    <label>Box 16 - State Wages, Tips, Etc.:</label>
                    <input v-model="box16[index]" type="text" class="form-control">
                </div>
                <div class="col-12 col-sm">
                    <label>Box 17 - State Income Tax:</label>
                    <input v-model="box17[index]" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm">
                    <label>Box 18 - Local Wages, Tips, Etc.:</label>
                    <input v-model="box18[index]" type="text" class="form-control">
                </div>
                <div class="col-12 col-sm">
                    <label>Box 19 - Local Income Tax:</label>
                    <input v-model="box19[index]" type="text" class="form-control">
                </div>
                <div class="col-12 col-sm">
                    <label>Box 20 - Locality Name:</label>
                    <input v-model="box20[index]" type="text" class="form-control">
                </div>
            </div>
            <hr>
        </div>
        <div class="form-group">
            <a href="#" @click.prevent="addOneLine('box15')">+ add one line</a>
        </div>
        <button type="button" class="btn btn-primary" @click="nextPage">Next</button>
    </div>
</template>

<script>
    class Source {
        static box12() {
            return {
                code: '',
                amount: ''
            }
        }
        static box14() {
            return {
                desc: '',
                amount: ''
            }
        }
        static box15() {
            return {
                state: '',
                ID: ''
            }
        }
    }

export default {
    data() {
        return {
            box12: [Source.box12()],
            box14: [Source.box14()],
            box15: [Source.box15()],
            box16: [],
            box17: [],
            box18: [],
            box19: [],
            box20: []
        }
    },
    methods: {
        nextPage() {
            console.log(this.box15)
        },
        addOneLine(func) {
            this.$data[func].push(Source[func]())
        }
    }
}
</script>
