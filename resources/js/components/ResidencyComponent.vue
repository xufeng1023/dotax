<template>
    <div>
        <h1 class="my-4">Determine Your Residency Status</h1>
        <div class="form-group">
            <label>Do you know your tax filing status?</label>
            <div>
                <div class="custom-control custom-radio d-inline-block mr-3">
                    <input v-model="residency" type="radio" name="filingStatus" id="Resident" value="Resident" checked class="custom-control-input">
                    <label class="custom-control-label" for="Resident">Resident</label>
                </div>
                <div class="custom-control custom-radio d-inline-block mr-3">
                    <input v-model="residency" type="radio" name="filingStatus" id="Non-resident" value="Non Resident" class="custom-control-input">
                    <label class="custom-control-label" for="Non-resident">Non Resident</label>
                </div>
                <div class="custom-control custom-radio d-inline-block mr-3">
                    <input v-model="residency" type="radio" name="filingStatus" id="dontknow" value="dontknow" class="custom-control-input">
                    <label class="custom-control-label" for="dontknow">I don't know</label>
                </div>
            </div>
        </div>
        <div v-show="residency == 'dontknow' || residency == 'Non Resident'">
            <div class="form-group">
                <label>Have you been a US citizen, by birth or naturalization, on the last day of 2019? (tax year)</label>
                <div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input v-model="r11" type="radio" id="r11-y" name="r11" value="yes" class="custom-control-input">
                        <label class="custom-control-label" for="r11-y">Yes</label>
                    </div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input v-model="r11" type="radio" id="r11-n" name="r11" value="no" class="custom-control-input" checked>
                        <label class="custom-control-label" for="r11-n">No</label>
                    </div>
                </div>
            </div>
            <div v-show="r11 == 'no'">
                <div class="form-group">
                    <label>Have you been a green card holder, on the last day of 2019? (tax year)</label>
                    <div>
                        <div class="custom-control custom-radio d-inline-block mr-3">
                            <input v-model="r12" type="radio" id="r12-y" name="r12" value="yes" class="custom-control-input" checked>
                            <label class="custom-control-label" for="r12-y">Yes</label>
                        </div>
                        <div class="custom-control custom-radio d-inline-block mr-3">
                            <input v-model="r12" type="radio" id="r12-n" name="r12" value="no" class="custom-control-input">
                            <label class="custom-control-label" for="r12-n">No</label>
                        </div>
                    </div>
                </div>
                <div v-show="r12 == 'no'">
                    <div class="form-group">
                        <label>Have you ever applied for US citizenship/ lawful residence?</label>
                        <div>
                            <div class="custom-control custom-radio d-inline-block mr-3">
                                <input v-model="r13" type="radio" id="r13-y" name="r13" value="yes" class="custom-control-input">
                                <label class="custom-control-label" for="r13-y">Yes</label>
                            </div>
                            <div class="custom-control custom-radio d-inline-block mr-3">
                                <input v-model="r13" type="radio" id="r13-n" name="r13" value="no" class="custom-control-input">
                                <label class="custom-control-label" for="r13-n">No</label>
                            </div>
                        </div>
                    </div>
                    <div v-show="r13 == 'yes'">
                        <div class="form-group">
                            <label>What is the status of your application?</label>
                            <div>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input v-model="r14" type="radio" id="r14-a" name="r14" value="approved" class="custom-control-input">
                                    <label class="custom-control-label" for="r14-a">Approved</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input v-model="r14" type="radio" id="r14-p" name="r14" value="pending" class="custom-control-input">
                                    <label class="custom-control-label" for="r14-p">Pending</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input v-model="r14" type="radio" id="r14-d" name="r14" value="denied" class="custom-control-input">
                                    <label class="custom-control-label" for="r14-d">Denied</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-show="r13 == 'no'">
                        <div class="form-group">
                            <label>I am currently a</label>
                            <div>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input v-model="r15" type="radio" id="r15-f" name="r15" value="student" class="custom-control-input">
                                    <label class="custom-control-label" for="r15-f">Student</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input v-model="r15" type="radio" id="r15-j" name="r15" value="teacher" class="custom-control-input">
                                    <label class="custom-control-label" for="r15-j">Teacher or Trainee</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input v-model="r15" type="radio" id="r15-n" name="r15" value="no" class="custom-control-input">
                                    <label class="custom-control-label" for="r15-n">None of the above</label>
                                </div>
                            </div>
                        </div>
                        <div v-show="r15 == 'student'">
                            <div class="form-group">
                                <label>Have you been a student in the U.S. for 5 years prior to current tax year?</label>
                                <div>
                                    <div class="custom-control custom-radio d-inline-block mr-3">
                                        <input v-model="r16" type="radio" id="r16-y" name="r16" value="yes" class="custom-control-input">
                                        <label class="custom-control-label" for="r16-y">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block mr-3">
                                        <input v-model="r16" type="radio" id="r16-n" name="r16" value="no" class="custom-control-input">
                                        <label class="custom-control-label" for="r16-n">No</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block mr-3">
                                        <input v-model="r16" type="radio" id="r16-d" name="r16" value="dontknow" class="custom-control-input">
                                        <label class="custom-control-label" for="r16-d">I don't know</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-show="r15 == 'teacher'">
                            <div class="form-group">
                                <label>Have you been a teacher or trainee in the U.S. for 2 out of the past 6 years prior to current tax year?</label>
                                <div>
                                    <div class="custom-control custom-radio d-inline-block mr-3">
                                        <input v-model="r17" type="radio" id="r17-y" name="r17" value="yes" class="custom-control-input">
                                        <label class="custom-control-label" for="r17-y">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block mr-3">
                                        <input v-model="r17" type="radio" id="r17-n" name="r17" value="no" class="custom-control-input">
                                        <label class="custom-control-label" for="r17-n">No</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block mr-3">
                                        <input v-model="r17" type="radio" id="r17-d" name="r17" value="dontknow" class="custom-control-input">
                                        <label class="custom-control-label" for="r17-d">I don't know</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-show="
                    r15 == 'no' || 
                    ((r14 == 'pending' || r14 == 'denied') && r13 == 'yes')
                    || (r15 == 'student' && r16 != 'yes') || (r15 == 'teacher' && r17 != 'yes')
                    ">
                        <div>
                            <label>Please enter the visa type and period each time you enter and left the U.S.</label>
                        </div>
                        <div class="form-row" v-for="(item, index) in travelHistories" :key="index">
                            <div class="form-group col-12 col-sm">
                                <label :for="'visaType-'+index">Visa Type</label>
                                <select v-model="item.visaType" class="custom-select" :index="'visaType-'+index" :name="'visaType-'+index">
                                    <option value=""></option>
                                    <option value="F1">F1 Student OPT or CPT</option>
                                    <option value="F2">F2 Spouse and children of student on F1</option>
                                    <option value="J1 student">J1 Student</option>
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
                                <input v-model="item.enterDate" type="text" class="form-control datepicker" :class="index===invalidRowId? 'is-invalid' : ''" :id="'enterDate-'+index" :index="'enterDate-'+index" :name="'enterDate-'+index">
                            </div>
                            <div class="col-12 col-sm">
                                <label :for="'leaveDate-'+index">Date Left US on</label>
                                <input v-model="item.leaveDate" type="text" class="form-control datepicker" :class="index===invalidRowId? 'is-invalid' : ''" :id="'leaveDate-'+index" :index="'leaveDate-'+index" :name="'leaveDate-'+index">
                            </div>
                            <div class="form-group col-12 col-sm">
                                <div class="pt-sm-4 mt-sm-3">
                                    <a v-if="index !== 0" @click.prevent="remove(index)" href="#">- remove line</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="#" @click.prevent="addOneLine">+ add one line</a>
                        </div>
                        <div class="form-group">
                            <label>Current visa held as of 12/31/2019</label>    
                            <select class="custom-select">
                                <option value=""></option>
                                <option value="F1">F1 Student OPT or CPT</option>
                                <option value="F2">F2 Spouse and children of student on F1</option>
                                <option value="J1 student">J1 Student</option>
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
                        <div class="form-group">
                            <label>Have you changed your visa in any year, including the tax year 2019?</label>
                            <div>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input v-model="r19" type="radio" id="r19-y" name="r19" value="yes" class="custom-control-input">
                                    <label class="custom-control-label" for="r19-y">Yes</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input v-model="r19" type="radio" id="r19-n" name="r19" value="no" class="custom-control-input">
                                    <label class="custom-control-label" for="r19-n">No</label>
                                </div>
                            </div>
                        </div>
                        <div v-if="r19 == 'yes'" class="form-row">
                            <div class="form-group col-12 col-sm">
                                <label>Previous visa type</label>
                                <select class="custom-select">
                                    <option value=""></option>
                                    <option value="F1">F1 Student OPT or CPT</option>
                                    <option value="F2">F2 Spouse and children of student on F1</option>
                                    <option value="J1 student">J1 Student</option>
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
                                <label>On what date was it changed?</label>
                                <input type="text" class="form-control datepicker">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" @click="nextPage">Next</button>
    </div>
</template>

<script>
    function newData () {
        return {
            visaType: '',
            enterDate: '',
            leaveDate: ''
        }
    }
    
    export default {
        props: ['saveUrl'],
        data() {
            return {
                residency: 'Resident',
                r11: 'no',
                r12: 'no',
                r13: 'no',
                r14: '',
                r15: 'student',
                r16: 'dontknow',
                r17: 'dontknow',
                r19: 'no',
                travelHistories: [newData()],
                invalidRowId: ''
            }
        },
        updated: function () {
            let that = this;
            $('.datepicker').datepicker({
                onSelect: function(dateText, el) { 
                    let keys = el.id.split('-')
                    that.travelHistories[keys[1]][keys[0]] = dateText
                }
            });
            this.$nextTick(function () {
                $('.datepicker').datepicker()
            })
        },
        methods: {
            nextPage() {
                if(!this.checkDays()) return;
                this.invalidRowId = '';
                console.log(2)
                // axios.post(this.saveUrl, $('form#tax').serialize())
                // this.$router.push('personal')
            },
            addOneLine() {
                this.travelHistories.push(newData())
            },
            remove(index) {
                this.travelHistories.splice(index, 1)
                // console.log(JSON.parse(JSON.stringify(this.travelHistories)))
            },
            checkDays() {
                return this.travelHistories.every((value, index) => {
                    let invalid;
                    if(!value.leaveDate || !value.enterDate) {invalid = false;}
                    else invalid = this.travelHistories.find((value, ind) => { //if find, not valid
                        if(index === ind) return value.leaveDate < value.enterDate;
                        return item.enterDate <= value.leaveDate || item.leaveDate >= value.enterDate
                    })
                    if(invalid === undefined) return true; 
                    console.log(3)
                    this.invalidRowId = index
                    return false;
                });
            }
        }
    }
</script>
