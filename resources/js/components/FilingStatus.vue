<template>
	<div>
        <a href="#" @click.prevent="$router.go(-1)">Back</a>
    	<h3 class="my-4">Filing Status</h3>
    	<div class="form-group">
            <label>Did you earn any income in {{ $root.taxYear }}?</label>
            <div>
                <div class="custom-control custom-radio d-inline-block mr-3">
                    <input v-model="q1" type="radio" id="q1-y" name="q1" value="yes" class="custom-control-input">
                    <label class="custom-control-label" for="q1-y">Yes</label>
                </div>
                <div class="custom-control custom-radio d-inline-block mr-3">
                    <input v-model="q1" type="radio" id="q1-n" name="q1" value="no" class="custom-control-input">
                    <label class="custom-control-label" for="q1-n">No</label>
                </div>
            </div>
        </div>
        <div v-if="q1 == 'yes'">
	        <div class="form-group">
	            <label>Can you be claimed as a dependent on someone else's US tax return?</label>
	            <div>
	                <div class="custom-control custom-radio d-inline-block mr-3">
	                    <input v-model="q2" type="radio" id="q2-y" name="q2" value="yes" class="custom-control-input">
	                    <label class="custom-control-label" for="q2-y">Yes</label>
	                </div>
	                <div class="custom-control custom-radio d-inline-block mr-3">
	                    <input v-model="q2" type="radio" id="q2-n" name="q2" value="no" class="custom-control-input">
	                    <label class="custom-control-label" for="q2-n">No</label>
	                </div>
	            </div>
	        </div>
	        <div class="form-group">
	            <label>Are you legally Blind?</label>
	            <div>
	                <div class="custom-control custom-radio d-inline-block mr-3">
	                    <input v-model="q3" type="radio" id="q3-y" name="q3" value="yes" class="custom-control-input">
	                    <label class="custom-control-label" for="q3-y">Yes</label>
	                </div>
	                <div class="custom-control custom-radio d-inline-block mr-3">
	                    <input v-model="q3" type="radio" id="q3-n" name="q3" value="no" class="custom-control-input">
	                    <label class="custom-control-label" for="q3-n">No</label>
	                </div>
	            </div>
	        </div>
	        <div class="form-group row">
	        	<div class="col-12 col-sm-6">
		            <label>On the date of 12/31/{{ $root.taxYear }}, I am</label>
		            <select v-model="q4" class="form-control">
		            	<option value="single">Single</option>
		            	<option value="mfj">Maried filing jointly</option>
		            </select>
	            </div>	
	        </div>
	        <div class="form-group">
	            <label>Do you have any dependent?</label>
	            <div>
	                <div class="custom-control custom-radio d-inline-block mr-3">
	                    <input v-model="q5" type="radio" id="q5-y" name="q5" value="yes" class="custom-control-input">
	                    <label class="custom-control-label" for="q5-y">Yes</label>
	                </div>
	                <div class="custom-control custom-radio d-inline-block mr-3">
	                    <input v-model="q5" type="radio" id="q5-n" name="q5" value="no" class="custom-control-input">
	                    <label class="custom-control-label" for="q5-n">No</label>
	                </div>
	            </div>
	        </div>
	        <button type="button" class="btn btn-primary" @click="$root.nextPage('income')">Next</button>
	    </div>
    </div>
</template>

<script>
	export default {
		data() {
			return {
				q1: '',
				q2: '',
				q3: '',
				q4: '',
				q5: ''
			}
		},
		methods: {

		}
	}
</script>