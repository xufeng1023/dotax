<template>
	<div>
		<a href="#" @click.prevent="$router.go(-1)">Back</a>
		<h3 class="my-4">College / Program</h3>
		<div class="form-group row">
			<div class="col-12 col-sm-8">
				<select v-model="tab" class="form-control">
					<option value="">I'm a...</option>
					<option value="student">Student</option>
					<option value="teacher">Teacher</option>
					<option value="trainee">Trainee</option>
					<option value="athletes">Professional athletes</option>
					<option value="individual">Individual with a medical condition or medical problem</option>
				</select>
			</div>
		</div>
		<div v-if="tab == 'student'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Name of University</label>
					<input type="text" v-model="student.name1" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Address of University</label>
					<input type="text" v-model="student.address1" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Telephone Number of University</label>
					<input type="text" v-model="student.phone1" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Name of Advisor</label>
					<input type="text" v-model="student.name2" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Address of Advisor</label>
					<input type="text" v-model="student.address2" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Telephone Number of Advisor</label>
					<input type="text" v-model="student.phone2" class="form-control">
				</div>
			</div>
			<!-- <div class="form-group row">
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
			</div> -->
		</div>
		<div v-if="tab == 'teacher'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Name of Institution</label>
					<input type="text" v-model="teacher.name" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Address of Institution</label>
					<input type="text" v-model="teacher.address" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Telephone Number of Institution</label>
					<input type="text" v-model="teacher.phone" class="form-control">
				</div>
			</div>
		</div>
		<div v-if="tab == 'trainee'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Name of Program Director</label>
					<input type="text" v-model="trainee.name" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Address of Program Director</label>
					<input type="text" v-model="trainee.address" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Phone of Program Director</label>
					<input type="text" v-model="trainee.phone" class="form-control">
				</div>
			</div>
		</div>
		<div v-show="tab == 'athletes'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Name of the charitable events is the U.S.</label>
					<input type="text" v-model="athletes.name" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Dates of competition</label>
					<input id="athletes-date" type="text" class="form-control datepicker">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Employer identification numbers of the charitable organization that benefited from the sports event</label>
					<input type="text" v-model="athletes.ID" class="form-control">
				</div>
			</div>
		</div>
		<div v-show="tab == 'individual'">
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Describe the medicial condition or medical problem that prevented you from leaving the U.S.</label>
					<textarea class="form-control" v-model="individual.description" rows="3"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Enter the date you intended to leave the U.S. before the illness</label>
					<input type="text" id="individual-date1" class="form-control datepicker">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>enter the date you actually left the U.S.</label>
					<input type="text" id="individual-date2" class="form-control datepicker">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Physician's name</label>
					<input type="text" v-model="individual.name" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Physician's office address</label>
					<input type="text" v-model="individual.address" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-12 col-sm-8">
					<label>Physician's phone number</label>
					<input type="text" v-model="individual.phone" class="form-control">
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
				tab: '',
				student: {
					name1: '',
					name2: '',
					address1: '',
					address2: '',
					phone1: '',
					phone2: ''
				},
				teacher: {
					name: '',
					address: '',
					phone: ''
				},
				trainee: {
					name: '',
					address: '',
					phone: ''
				},
				athletes: {
					name: '',
					date: '',
					ID: ''
				},
				individual: {
					description: '',
					date1: '',
					date2: '',
					name: '',
					address: '',
					phone: ''
				}
			}
		},
		mounted() {
			$('.datepicker').datepicker({
	            changeMonth:true,
	            changeYear:true,
	            yearRange: "-100:" + this.currentYear,
	            onSelect: (dateText, el) => {
	            	let id = el.id.split('-')
	                this.$data[id[0]][id[1]] = dateText
	            }
	        });
		},
		methods: {
			nextPage() {
				if(!this.isFormValid()) return alert('form not filled')
				this.$root.$data.form8843.type = this.tab
				this.$root.$data.form8843[this.tab] = this.$data[this.tab]
				this.$router.push('personal')
			},
			isFormValid() {
				for(let prop in this.$data[this.tab]) {
					if(!this.$data[this.tab][prop]) return false
				}
				return true
			}
		}
	}
</script>