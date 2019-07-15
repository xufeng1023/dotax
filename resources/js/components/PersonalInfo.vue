<template>
    <div>
        <a href="#" @click.prevent="$router.go(-1)">Back</a>
    	<h3 class="my-4">Personal Information</h3>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>First Name</label>
	    		<input type="text" class="form-control">
    		</div>
    		<div class="col-12 col-sm">
				<label>Last Name</label>
	    		<input type="text" class="form-control">
    		</div>
    	</div>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>Date of Birth</label>
	    		<input type="text" class="form-control datepicker">
    		</div>
    		<div class="col-12 col-sm">
				<label>Occupation</label>
	    		<input type="text" class="form-control">
    		</div>
    	</div>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>Phone</label>
	    		<input type="text" class="form-control">
    		</div>
    		<div class="col-12 col-sm">
				<label>SSN / ITIN</label>
	    		<input type="text" class="form-control">
    		</div>
    	</div>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>Passport Issuance Country/Country of Citizenship</label>
	    		<input type="text" class="form-control">
    		</div>
    		<div class="col-12 col-sm">
				<label>Passport No.</label>
	    		<input type="text" class="form-control">
    		</div>
    	</div>
    	<h3 class="my-4">Address in the United States</h3>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>Street Address</label>
	    		<input type="text" class="form-control">
    		</div>
    		<div class="col-12 col-sm">
				<label>City</label>
	    		<input type="text" class="form-control">
    		</div>
    	</div>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
				<label>State</label>
	    		<input type="text" class="form-control">
    		</div>
    		<div class="col-12 col-sm">
				<label>Zip Code</label>
	    		<input type="text" class="form-control">
    		</div>
    	</div>
    	<div class="form-group row">
    		<div class="col-12 col-sm">
    			<label>Were you in the U.S. during the {{ $parent.year }} tax year?</label>
    		</div>
    		<div class="col-12 col-sm">
                <div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input type="radio" id="filling-ind" value="yes" class="custom-control-input">
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
    	<button type="button" class="btn btn-primary">Next</button>
    </div>
</template>

<script>
export default {
    mounted() {
    	
    }
}
</script>
