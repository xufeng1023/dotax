<template>
	<div>
		<a href="#" @click.prevent="$router.go(-1)">Back</a>
		<h3 class="my-4">College / Program</h3>
		<div class="form-group row">
			<div class="col-12 col-sm-8">
				<label>Are you a student / teacher / trainee / professional athletes / individual with a medical condition or medical problem?</label>
				<select v-model="tab" class="form-control">
					<option value="">I'm a...</option>
					<option value="student">Student</option>
					<option value="teacher">Teacher</option>
					<option value="trainee">Trainee</option>
					<option value="athletes">Professional athletes</option>
					<option value="individual">Athletes/ individual with a medical condition or medical problem</option>
				</select>
			</div>
		</div>
		<div v-if="tab == 'student'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Name of Advisor</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Major</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-4">
					<label>Course type</label>
					<select class="form-control">
						<option value="Bacholar Degree">Bacholar Degree</option>
						<option value="Master Degree">Master Degree</option>
						<option value="Doctorate">Doctorate</option>
					</select>
				</div>
				<div class="col-12 col-sm-4">
					<label>or other type</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Name of University</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Address</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>City</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>State</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Zip Code</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Phone</label>
					<input type="text" class="form-control">
				</div>
			</div>
		</div>
		<div v-if="tab == 'teacher'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Institution Name</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Address</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>City</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>State</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Zip Code</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Phone</label>
					<input type="text" class="form-control">
				</div>
			</div>
		</div>
		<div v-if="tab == 'trainee'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Program Name</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Program Co-ordinator name</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Address</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>City</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>State</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Zip Code</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Phone</label>
					<input type="text" class="form-control">
				</div>
			</div>
		</div>
		<div v-show="tab == 'athletes'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Name of the charitable events is the U.S.</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Dates of competition</label>
					<input type="text" class="form-control datepicker">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Employer identification numbers of the charitable organization that benefited from the sports event</label>
					<input type="text" class="form-control">
				</div>
			</div>
		</div>
		<div v-show="tab == 'individual'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Describe the medicial condition or medical problem that prevented you from leaving the U.S.</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Enter the date you intended to leave the U.S. before the illness</label>
					<input type="text" class="form-control datepicker">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>enter the date  you actually left the U.S.</label>
					<input type="text" class="form-control datepicker">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Physician's name</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Physician's office address</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Physician's phone number</label>
					<input type="text" class="form-control">
				</div>
			</div>
		</div>
		<button v-if="tab" type="button" class="btn btn-primary" @click="nextPage">Next</button>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				tab: ''
			}
		},
		mounted() {
			$('.datepicker').datepicker({
                changeMonth:true,
                changeYear:true,
                yearRange: "-100:"+this.$parent.year,
            })
		},
		methods: {
			nextPage() {
				this.$router.push('personal')
			}
		}
	}
</script>