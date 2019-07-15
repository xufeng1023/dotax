<template>
    <div>
        <h3 class="my-4">Determine Your Residency Status</h3>
        <div v-show="showResult" class="card text-center">
            <div class="card-body">
                <p class="card-text">Based on the information you provided</p>
                <h5 class="card-title">You are <span v-if="isResident != 1">not </span>a resident!</h5>
                <router-link :to="nextUrl" class="btn btn-primary">Continue</router-link>
                <a href="" @click.prevent="showResult = false" class="btn btn-secondary">Edit</a>
            </div>
        </div>
        <div v-show="!showResult">
            <div class="form-group">
                <label>Do you know your tax filing status?</label>
                <div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input v-model="isResident" type="radio" name="filingStatus" id="Resident" value="1" checked class="custom-control-input">
                        <label class="custom-control-label" for="Resident">Resident</label>
                    </div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input v-model="isResident" type="radio" name="filingStatus" id="Non-resident" value="0" class="custom-control-input">
                        <label class="custom-control-label" for="Non-resident">Non Resident</label>
                    </div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input v-model="isResident" type="radio" name="filingStatus" id="dontknow" value="" class="custom-control-input">
                        <label class="custom-control-label" for="dontknow">I don't know</label>
                    </div>
                </div>
            </div>
            <div v-show="this.isResident != 1">
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
                                <div class="form-group col-12 col-sm-6">
                                    <label :for="'visaType-'+index">Visa Type</label>
                                    <visa v-model="item.visaType"></visa>
                                </div>
                                <div class="form-group col-12 col-sm">
                                    <label :for="'enterDate-'+index">Date Entered US</label>
                                    <input v-model="item.enterDate" type="text" class="form-control datepicker" :class="index===invalidRowId? 'is-invalid' : ''" :id="'enterDate-'+index" :index="'enterDate-'+index" :name="'enterDate-'+index">
                                </div>
                                <div class="col-12 col-sm">
                                    <label :for="'leaveDate-'+index">Date Left US</label>
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
                            <div class="form-row">
                                <div class="form-group col-12 col-sm-6">
                                    <label>Current visa held as of 12/31/2019</label>    
                                    <visa v-model="currentVisa"></visa>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Have you changed your visa within the U.S. in any year, including the tax year 2019?</label>
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
                            <div v-show="r19 == 'yes'" class="form-row">
                                <div class="form-group col-12 col-sm">
                                    <label>Which visa did you change to?</label>
                                    <visa v-model="preVisa"></visa>
                                </div>
                                <div class="form-group col-12 col-sm">
                                    <label>When did it happen?</label>
                                    <input v-model="visaChangeDate" type="text" class="form-control datepicker">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" @click="nextPage">Next</button>
        </div>
    </div>
</template>

<script>
    const currentYear = (new Date).getFullYear()
    function newData() {
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
                showResult: false,
                isResident: 1,
                nextUrl: 'personal',
                r11: 'no',
                r12: 'no',
                r13: 'no',
                r14: '',
                r15: 'student',
                r16: 'dontknow',
                r17: 'dontknow',
                r19: 'no',
                travelHistories: [newData()],
                invalidRowId: '',
                currentVisa: '',
                preVisa: '',
                visaChangeDate: '',
                yearDays: {},
                visaYearDays:{}
            }
        },
        mounted() {
            let that = this;
            $('.datepicker').datepicker({
                changeMonth:true,
                changeYear:true,
                yearRange: "-100:"+((new Date()).getFullYear()),
                onSelect: function(dateText, el) {
                    let keys = el.id.split('-')
                    try {
                        that.travelHistories[keys[1]][keys[0]] = dateText
                    } catch(error) {
                        that.visaChangeDate = dateText
                    }
                }
            })
        },
        updated: function () {
            let that = this;
            $('.datepicker').datepicker({
                changeMonth:true,
                changeYear:true,
                yearRange: "-100:"+((new Date()).getFullYear()),
                onSelect: function(dateText, el) {
                    let keys = el.id.split('-')
                    try {
                        that.travelHistories[keys[1]][keys[0]] = dateText
                    } catch(error) {
                        that.visaChangeDate = dateText
                    }
                }
            });
        },
        methods: {
            nextPage() {
                if(this.isResident == 1) {
                    return this.$router.push(this.nextUrl)
                }
                if(!this.currentVisa) return alert('invalid current visa')
                if(!this.validDays()) return alert('invalid days')
                this.invalidRowId = '';
                //this.ifVisaChanged();
                this.calcDays();
                // console.log(this.visaYearDays,this.yearDays)
                this.determineResidency()
                this.showResult = true
                // axios.post(this.saveUrl, $('form#tax').serialize())
                // this.$router.push('residency-result')
            },
            determineResidency() {
                let validDays = 0
                let totalYears = 0
                if(this.yearDays[currentYear] < 31) {
                    return this.nextUrl = 'none-resident-program'
                }
                for(let prop in this.visaYearDays) {
                    if(['f1','f2','j1s','j2s','m1','q1s','q2s'].includes(prop)) { 
                        let daysPerYearAry = Object.values(this.visaYearDays[prop])
                        totalYears += daysPerYearAry.length
                        if(daysPerYearAry.length > 5) {
                            validDays = this.get183Days(prop)
                            if(validDays >= 183) return this.isResident = true
                        }
                    }

                    if(['j1t','j2t','q1t','q2t'].includes(prop)) {
                        let yearsIn6years = 0
                        let minYear = currentYear - 6
                        for(let year in this.visaYearDays[prop]) {
                            totalYears++
                            if(year >= minYear) yearsIn6years++
                        }
                        if(yearsIn6years > 2) {
                            validDays = this.get183Days(prop)
                        }
                        if(validDays >= 183) return this.isResident = true
                    }
                }
                if(totalYears> 5) return this.isResident = true
                return this.nextUrl = 'none-resident-program'
            },
            get183Days(visa) {
                return (this.visaYearDays[visa][currentYear] || 0) +
                        (this.visaYearDays[visa][currentYear - 1] || 0) / 3 +
                        (this.visaYearDays[visa][currentYear - 2] || 0) / 6
            },
            validDays() {
                return this.travelHistories.every((value, index) => {
                    let invalid;
                    if(!value.leaveDate) value.leaveDate = '12/31/'+ currentYear;

                    if(!value.enterDate) {invalid = false;}
                    else invalid = this.travelHistories.find((item, ind) => { //if find, not valid
                        if(index === ind) {return new Date(value.leaveDate) < new Date(value.enterDate);}
                        return (new Date(item.enterDate) <= new Date(value.enterDate) && new Date(item.leaveDate) >= new Date(value.enterDate))
                        || (new Date(item.enterDate) <= new Date(value.leaveDate) && new Date(item.leaveDate) >= new Date(value.leaveDate))
                    })

                    if(invalid === undefined) return true; 
                    this.invalidRowId = index
                    return false;
                });
            },
            ifVisaChanged() {
                if(this.preVisa && this.visaChangeDate) {
                    let changeDate = new Date(this.visaChangeDate)
                    let changeDateYear = changeDate.getFullYear()
                    this.travelHistories.forEach((item, index) => {
                        let enter = new Date(item.enterDate);
                        let leave = new Date(item.leaveDate);
                        if(changeDateYear >= enter.getFullYear() && changeDateYear <= leave.getFullYear()) {
                            this.travelHistories.push({
                                visaType: this.preVisa,
                                enterDate: this.visaChangeDate,
                                leaveDate: item.leaveDate
                            })
                            item.leaveDate = this.visaChangeDate
                        }
                    })
                }
            },
            calcDays() {
                this.visaYearDays = {}
                this.yearDays = {}
                this.travelHistories.forEach((item, index) => {
                    let enter = new Date(item.enterDate);
                    let leave = new Date(item.leaveDate);

                    let enterYear = enter.getFullYear()
                    let leaveYear = leave.getFullYear()
                    let countingYear = enterYear

                    let yearType
                    let from = enter
                    let to = leave

                    while(leaveYear >= countingYear) {
                        if(countingYear >= enterYear && countingYear < leaveYear) {
                            to = new Date('12/31/'+countingYear)
                        }
                        if(countingYear > enterYear && countingYear <= leaveYear) {
                            from = new Date('1/1/'+countingYear)
                            if(countingYear == leaveYear) to = leave
                        }
                        if(this.yearDays[countingYear] === undefined) this.yearDays[countingYear] = 0;
                        if(this.visaYearDays[item.visaType] === undefined) this.visaYearDays[item.visaType] = [];
                        if(this.visaYearDays[item.visaType][countingYear] === undefined) {
                            this.visaYearDays[item.visaType][countingYear] = 0
                        }
                        this.yearDays[countingYear] += this.daysBetweenDays(from, to);
                        this.visaYearDays[item.visaType][countingYear] += this.daysBetweenDays(from, to);
                        countingYear++;
                    }
                })
            },
            addOneLine() {
                this.travelHistories.push(newData())
            },
            remove(index) {
                this.travelHistories.splice(index, 1)
                // console.log(JSON.parse(JSON.stringify(this.travelHistories)))
            },
            daysBetweenDays(enter, leave) {
                let oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                return Math.round(Math.abs((leave.getTime() - enter.getTime()) / oneDay)) + 1
            }
        }
    }
</script>
