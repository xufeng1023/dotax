<template>
    <div>
        <a href="#" @click.prevent="$router.go(-1)">Back</a>
    	<h3 class="my-4">Personal Information</h3>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>First Name</label>
	    		<input type="text" class="form-control" v-model="$root.personal.firstName">
    		</div>
    		<div class="col-12 col-sm">
				<label>Last Name</label>
	    		<input type="text" class="form-control" v-model="$root.personal.lastName">
    		</div>
    	</div>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>Date of Birth</label>
	    		<input type="text" id="birthday" class="form-control datepicker" v-model="$root.personal.dob">
    		</div>
    		<div class="col-12 col-sm">
				<label>Occupation</label>
	    		<input v-model="$root.personal.job" type="text" class="form-control">
    		</div>
    	</div>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>Phone</label>
	    		<input type="text" class="form-control" v-model="$root.personal.phone">
    		</div>
    		<div class="col-12 col-sm">
				<label>SSN / ITIN</label>
	    		<input type="text" class="form-control" v-model="$root.personal.ssn" @input="formatSSN">
    		</div>
    	</div>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>Passport Issuance Country/Country of Citizenship</label>
	    		<input type="text" class="form-control" v-model="$root.personal.citizen">
    		</div>
    		<div class="col-12 col-sm">
				<label>Passport No.</label>
	    		<input type="text" class="form-control" v-model="$root.personal.passport">
    		</div>
    	</div>
        <div class="form-group row">
            <div class="col-12 col-sm-6">
                <label>Filling Status</label>
                <select class="form-control" v-model="$root.personal.fillingStatus">
                    <option value="single">Single</option>
                </select>
            </div>
        </div>
    	<h3 class="my-4">Mailing Address in the United States</h3>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>Street Address</label>
	    		<input type="text" class="form-control" v-model="$root.address.street">
    		</div>
    		<div class="col-12 col-sm">
				<label>City</label>
	    		<input type="text" class="form-control" v-model="$root.address.city">
    		</div>
    	</div>
    	<div class="form-group row mb-4">
    		<div class="col-12 col-sm">
				<label>State</label>
	    		<input type="text" class="form-control" v-model="$root.address.state">
    		</div>
    		<div class="col-12 col-sm">
				<label>Zip Code</label>
	    		<input type="text" class="form-control" v-model="$root.address.zip">
    		</div>
    	</div>
        <h4 class="m-0">Address in country of residence</h4>
        <div class="text-muted mb-4">(Fill in these fields only if you are filing 8843 form by itself and not with your tax return.)</div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Street Address</label>
                <input type="text" class="form-control" v-model="addressOfResidence.street">
            </div>
            <div class="col-12 col-sm">
                <label>City</label>
                <input type="text" class="form-control" v-model="addressOfResidence.city">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>State</label>
                <input type="text" class="form-control" v-model="addressOfResidence.state">
            </div>
            <div class="col-12 col-sm">
                <label>Zip Code</label>
                <input type="text" class="form-control" v-model="addressOfResidence.zip">
            </div>
            <div class="col-12 col-sm">
                <label>Country</label>
                <input type="text" class="form-control" v-model="addressOfResidence.country">
            </div>
        </div>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
    			<label>Were you in the U.S. during the {{ $root.taxYear }} tax year?</label>
    		</div>
    		<div class="col-12 col-sm">
                <div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input type="radio" id="filling-ind" name="" value="yes" class="custom-control-input">
                        <label class="custom-control-label" for="filling-ind">Yes</label>
                    </div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input type="radio" id="filling-trust" value="no" class="custom-control-input">
                        <label class="custom-control-label" for="filling-trust">No</label>
                    </div>
                </div>
    		</div>
		</div>
		<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>Are you filling as an individual or trust?</label>
    		</div>
    		<div class="col-12 col-sm">
	    		<div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input type="radio" id="filling-ind" value="yes" class="custom-control-input">
                        <label class="custom-control-label" for="filling-ind">Individual</label>
                    </div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input type="radio" id="filling-trust" value="no" class="custom-control-input">
                        <label class="custom-control-label" for="filling-trust">Trust</label>
                    </div>
                </div>
    		</div>
    	</div>
    	<button type="button" class="btn btn-primary" @click="nextPage()">Next</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            addressOfResidence: {
                country: '',
                street: '',
                city: '',
                state: '',
                zip: ''
            }
        }
    },
    mounted() {
        $('.datepicker').datepicker({
            changeMonth:true,
            changeYear:true,
            yearRange: "-100:" + this.currentYear,
            onSelect: (dateText, el) => {
                this.$root.personal[el.id] = dateText
            }
        });
    },
    methods: {
        formatSSN(e) {
            let last
            let len = this.$root.personal.ssn.length
            this.$root.personal.ssn = this.$root.personal.ssn.slice(0, 11)
            if(len === 4) {
                last = this.$root.personal.ssn.slice(3)
                if(last !== '-') {
                    this.$root.personal.ssn = this.$root.personal.ssn.slice(0, 3) + '-' + last
                }
            }
            if(len === 7) {
                last = this.$root.personal.ssn.slice(6)
                if(last !== '-') {
                    this.$root.personal.ssn = this.$root.personal.ssn.slice(0, 6) + '-' + last
                }
            }
        },  
        nextPage() {
            this.$root.$data.addressOfResidence = this.addressOfResidence
            // this.$router.push('filing-status')
            axios.post('/8843', this.$root.$data)
                .then(data => {
                    location.assign(data.data)
                })
        }
    }
}
</script>
