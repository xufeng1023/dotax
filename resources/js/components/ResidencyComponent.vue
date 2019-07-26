<template>
    <div>
        <h3 class="my-4">Determine Your Residency Status</h3>
        <div v-show="showResult" class="card text-center">
            <div class="card-body">
                <p class="card-text">Based on the information you provided</p>
                <h5 class="card-title">You are <span v-if="isResident != 'yes'">not </span>a resident!</h5>
                <router-link :to="nextUrl" class="btn btn-primary">Continue</router-link>
                <a href="" @click.prevent="showResult = false" class="btn btn-secondary">Edit</a>
            </div>
        </div>
        <div v-show="!showResult">
            <div class="form-group">
                <label>Do you know your tax filing status?</label>
                <div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input v-model="isResident" type="radio" name="filingStatus" id="Resident" value="yes" checked class="custom-control-input">
                        <label class="custom-control-label" for="Resident">Resident</label>
                    </div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input v-model="isResident" type="radio" name="filingStatus" id="Non-resident" value="no" class="custom-control-input">
                        <label class="custom-control-label" for="Non-resident">Non Resident</label>
                    </div>
                    <div class="custom-control custom-radio d-inline-block mr-3">
                        <input v-model="isResident" type="radio" name="filingStatus" id="dontknow" value="" class="custom-control-input">
                        <label class="custom-control-label" for="dontknow">I don't know</label>
                    </div>
                </div>
            </div>
            <div v-show="this.isResident != 'yes'">
                <div class="form-group">
                    <label>Have you been a US citizen, by birth or naturalization, on the last day of {{ $root.taxYear }}? (tax year)</label>
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
                        <label>Have you been a green card holder, on the last day of {{ $root.taxYear }}? (tax year)</label>
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
                        <div class="form-group" v-if="r13 == 'yes'">
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
                        <div v-if="r13 == 'no'">
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
                                        <input v-model="r15" type="radio" id="r15-n" name="r15" value="" class="custom-control-input">
                                        <label class="custom-control-label" for="r15-n">None of the above</label>
                                    </div>
                                </div>
                            </div>
                            <div v-if="r15 == 'student'">
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
                                            <input v-model="r16" type="radio" id="r16-d" name="r16" value="" class="custom-control-input">
                                            <label class="custom-control-label" for="r16-d">I don't know</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="r15 == 'teacher'">
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
                                            <input v-model="r17" type="radio" id="r17-d" name="r17" value="" class="custom-control-input">
                                            <label class="custom-control-label" for="r17-d">I don't know</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-show="this.isResident != 'yes' && this.r11 != 'yes' && this.r12 != 'yes' && this.r14 != 'approved' && this.r16 != 'yes' && this.r17 != 'yes'">
                            <div>
                                <label>Please enter the visa type and period each time you enter and left the U.S.</label>
                            </div>
                            <div class="form-row" v-for="(item, index) in travelHistories" :key="index">
                                <div class="form-group col-12 col-sm">
                                    <label :for="'visaType-'+index">Visa type</label>
                                    <select class="form-control" v-model="item.visaType">
                                        <visa></visa>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-sm">
                                    <label :for="'enterDate-'+index">Date entered</label>
                                    <input v-model="item.enterDate" type="text" class="form-control datepicker" :class="index===invalidRowId? 'is-invalid' : ''" :id="'enterDate-'+index" :index="'enterDate-'+index" :name="'enterDate-'+index">
                                </div>
                                <div class="col-12 col-sm">
                                    <label :for="'leaveDate-'+index">Date left / Program ending date</label>
                                    <input v-model="item.leaveDate" type="text" class="form-control datepicker" :class="index===invalidRowId? 'is-invalid' : ''" :id="'leaveDate-'+index" :index="'leaveDate-'+index" :name="'leaveDate-'+index">
                                </div>
                                <div class="form-group col-12 col-sm-1">
                                    <div class="pt-sm-4 mt-sm-3">
                                        <a v-if="index !== 0" @click.prevent="remove(index)" href="#">X</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="#" @click.prevent="addOneLine">+ add one line</a>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-sm-6">
                                    <label>Current visa held as of 12/31/{{ $root.taxYear }}</label>   
                                    <select class="form-control" v-model="currentVisa"> 
                                        <visa></visa>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Have you changed your visa within the U.S. in any year, including the tax year {{ $root.currentYear }}?</label>
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
                            <div v-show="r19 == 'yes'">
                                <div class="form-row" v-for="(item, index) in changeHistory" :key="index">
                                    <div class="form-group col-12 col-sm">
                                        <label>From Visa</label>
                                        <select class="form-control" v-model="item.from"> 
                                            <visa></visa>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-sm">
                                        <label>To Visa</label>
                                        <select class="form-control" v-model="item.to"> 
                                            <visa></visa>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-sm">
                                        <label>Change Date</label>
                                        <input v-model="item.date" :id="'change-'+index" type="text" class="form-control datepicker">
                                    </div>
                                    <div class="form-group col-12 col-sm-1">
                                        <div class="pt-sm-4 mt-sm-3">
                                            <a v-if="index !== 0" @click.prevent="remove2(index)" href="#">X</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="#" @click.prevent="addOneLine2">+ add one line</a>
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
    let combinedDays = {}
    function newData() {
        return {
            visaType: '',
            enterDate: '',
            leaveDate: ''
        }
    }

    function changeHistory() {
        return {
            from: '',
            to: '',
            date: ''
        }
    }
    
    export default {
        data() {
            return {
                showResult: false,
                isResident: 'yes',
                nextUrl: 'personal',
                r11: 'no',
                r12: 'no',
                r13: 'no',
                r14: '',
                r15: 'student',
                r16: '',
                r17: '',
                r19: 'no',
                travelHistories: [newData()],
                invalidRowId: '',
                currentVisa: '',
                preVisa: '',
                visaChangeDate: '',
                yearDays: {},
                visaYearDays: {},
                firstEnter: {},
                combinedDays: {},
                changeHistory: [changeHistory()]
            }
        },
        mounted() {
            this.registerDatepicker()
        },
        updated: function () {
            this.registerDatepicker()
        },
        watch: {
            r15() {
                this.clear1617()
            },
            r13() {
                this.clear1617()
            }
        },
        methods: {
            nextPage() {
                if(this.isResident == 'yes' || this.r11 == 'yes' || this.r12 == 'yes' || this.r14 == 'approved' || this.r16 == 'yes' || this.r17 == 'yes') {
                    return this.$router.push(this.nextUrl)
                }
                if(!this.currentVisa) return alert('invalid current visa')
                if(!this.validDays()) return alert('invalid days')
                this.invalidRowId = ''
                this.getFirstEnter()
                this.combineDays()
                this.calcDays()
                this.determineResidency()
                this.showResult = true
                this.form8843()
            },
            form8843() {
                this.$root.$data.form8843 = {
                    currentVisa: this.currentVisa.slice(0, 2),
                    previousVisa: this.preVisa.slice(0, 2),
                    changeDate: this.visaChangeDate,
                    yearDays: this.yearDays,
                    firstEnter: this.firstEnter
                }
            },
            determineResidency() {
                let validDays = 0
                let studentPassed = false 
                let teacherPassed = false
                if(this.yearDays[this.$root.currentYear] < 31) {
                    return this.nextUrl = 'none-resident-program'
                }
                for(let prop in this.visaYearDays) {
                    if(['h1b'].includes(prop)) { 
                        validDays = this.get183Days(prop)
                        if(validDays >= 183) return this.isResident = 'yes'
                    }
                    if(['f1','f2','j1s','j2s','m1','q1s','q2s'].includes(prop)) { 
                        let daysPerYearAry = Object.values(this.visaYearDays[prop])
                        if(daysPerYearAry.length > 5) {
                            studentPassed = true
                            validDays = this.get183Days(prop)
                            if(validDays >= 183) return this.isResident = 'yes'
                        }
                    }
                    if(['j1t','j2t','q1t','q2t'].includes(prop)) {
                        let yearsIn6years = 0
                        let minYear = this.$root.currentYear - 6
                        for(let year in this.visaYearDays[prop]) {
                            if(year >= minYear) yearsIn6years++
                        }
                        if(yearsIn6years > 2) {
                            teacherPassed = true
                            validDays = this.get183Days(prop)
                        }
                        if(validDays >= 183) return this.isResident = 'yes'
                    }
                    if(studentPassed || teacherPassed) return this.isResident = 'yes'
                }
                return this.nextUrl = 'none-resident-program'
            },
            clear1617() {
                this.r14 = this.r16 = this.r17 = ''
            },
            get183Days(visa) {
                return (this.visaYearDays[visa][this.$root.currentYear] || 0) +
                        (this.visaYearDays[visa][this.$root.currentYear - 1] || 0) / 3 +
                        (this.visaYearDays[visa][this.$root.currentYear - 2] || 0) / 6
            },
            validDays() {
                return this.travelHistories.every((value, index) => {
                    let invalid;
                    if(!value.leaveDate) value.leaveDate = '12/31/'+ this.$root.taxYear;

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
            getFirstEnter() {
                let now = (new Date).getTime()
                for(let prop in this.travelHistories) {
                    let timestamp = (new Date(this.travelHistories[prop]['enterDate'])).getTime()
                    if(timestamp < now) {
                        now = timestamp
                        this.firstEnter.date = this.travelHistories[prop]['enterDate']
                        this.firstEnter.visa = this.travelHistories[prop]['visaType'].slice(0, 2)
                    }
                }
            },
            copyTravelHistory() {
                return JSON.parse(JSON.stringify(this.travelHistories))
            },
            combineDays() {
                combinedDays = this.copyTravelHistory()
                for(let prop in this.changeHistory) {
                    let changeDate = new Date(this.changeHistory[prop].date)
                    for(let index in combinedDays) {
                        let enterDate = (new Date(combinedDays[index].enterDate)).getTime()
                        let leaveDate = new Date(combinedDays[index].leaveDate)
                        if(changeDate.getTime() > enterDate && changeDate.getTime() < leaveDate.getTime() && this.changeHistory[prop].from == combinedDays[index].visaType) {
                            changeDate.setDate(changeDate.getDate() - 1)
                            let cutDate = changeDate.toLocaleDateString()
                            combinedDays.push({
                                visaType: this.changeHistory[prop].to,
                                enterDate: this.changeHistory[prop].date,
                                leaveDate: combinedDays[index].leaveDate
                            })
                            combinedDays[index].leaveDate = cutDate
                        }
                    }
                }
            },
            calcDays() {
                this.visaYearDays = {}
                this.yearDays = {}
                combinedDays.forEach((item, index) => {
                    let leave = new Date(item.leaveDate)
                    let leaveYear = leave.getFullYear()
                    if(!leaveYear || leaveYear > this.$root.taxYear) {
                        leaveYear = this.$root.taxYear
                        leave = new Date('12/31/' + leaveYear)
                    }   

                    let enter = new Date(item.enterDate);
                    let enterYear = enter.getFullYear()
                    let countingYear = enterYear
                    if(enterYear > this.$root.taxYear) countingYear = 9999

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
                        if(this.yearDays[countingYear] === undefined) {
                            this.yearDays[countingYear] = {}
                            this.yearDays[countingYear]['number'] = 0;
                            this.yearDays[countingYear]['type'] = item.visaType.slice(0, 2);
                        }
                        if(this.visaYearDays[item.visaType] === undefined) this.visaYearDays[item.visaType] = [];
                        if(this.visaYearDays[item.visaType][countingYear] === undefined) {
                            this.visaYearDays[item.visaType][countingYear] = 0
                        }
                        this.yearDays[countingYear]['number'] += this.daysBetweenDays(from, to);
                        this.visaYearDays[item.visaType][countingYear] += this.daysBetweenDays(from, to);
                        countingYear++;
                    }
                })
            },
            addOneLine() {
                this.travelHistories.push(newData())
            },
            addOneLine2() {
                this.changeHistory.push(changeHistory())
            },
            remove(index) {
                this.travelHistories.splice(index, 1)
            },
            remove2(index) {
                this.changeHistory.splice(index, 1)
            },
            daysBetweenDays(enter, leave) {
                let oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                return Math.round(Math.abs((leave.getTime() - enter.getTime()) / oneDay)) + 1
            },
            registerDatepicker() {
                $('.datepicker').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange: "-100:" + this.$root.currentYear,
                    onSelect: (dateText, el) => {
                        let keys = el.id.split('-')
                        try {
                            if(keys[0] == 'change') this.changeHistory[keys[1]].date = dateText
                            else this.travelHistories[keys[1]][keys[0]] = dateText
                        } catch(error) {
                            console.log('error assigning date')
                            this.visaChangeDate = dateText
                        }
                    }
                });
            }
        }
    }
</script>
