<template>
    <div>
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" @submit.prevent="login">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" @keydown="clearErrors" type="email" class="form-control" :class="errors.login.email? 'is-invalid':''" name="email" value="" required autofocus>
                                        <span class="invalid-feedback" role="alert" v-if="errors.login.email">
                                            <strong>{{ errors.login.email }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" @keydown="clearErrors" type="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                            <label class="form-check-label" for="remember">Remember me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" @submit.prevent="register">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                    <div class="col-md-6">
                                        <input id="name" @keydown="clearErrors" type="text" class="form-control" :class="errors.register.name? 'is-invalid':''" name="name" value="" required autofocus>
                                        <span class="invalid-feedback" role="alert" v-if="errors.register.name">
                                            <strong>{{errors.register.name}}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_reg" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email_reg" @keydown="clearErrors" type="email" class="form-control" :class="errors.register.email? 'is-invalid':''" name="email" value="" required>
                                        <span class="invalid-feedback" role="alert" v-if="errors.register.email">
                                            <strong>{{errors.register.email}}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password_reg" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password_reg" @keydown="clearErrors" type="password" class="form-control" :class="errors.register.password? 'is-invalid':''" name="password" required>
                                        <span class="invalid-feedback" role="alert" v-if="errors.register.password">
                                            <strong>{{errors.register.password}}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" @keydown="clearErrors" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
    export default {
        props: ['loginUrl','registerUrl'],
        data() {
            return {
                errors: {
                    login: {
                        email: '',
                        password: ''
                    },
                    register: {
                        name: '',
                        email: '',
                        password: '',
                        password_confirmation: ''
                    }
                }
            }
        },
        methods: {
            login(e) {
                axios.post(this.loginUrl, $(e.target).serialize())
                .then(({data}) => {
                    location.assign(data)
                })
                .catch(({response}) => {
                    for(let prop in response.data.errors) {
                        this.errors.login[prop] = response.data.errors[prop].shift()
                    }
                })
            },
            register(e) {
                axios.post(this.registerUrl, $(e.target).serialize())
                .then(({data}) => {
                    location.assign(data)
                })
                .catch(({response}) => {
                    for(let prop in response.data.errors) {
                        this.errors.register[prop] = response.data.errors[prop].shift()
                    }
                })
            },
            clearErrors() {
                for(let prop in this.errors.login) {
                    this.errors.login[prop] = ''
                }
                for(let prop in this.errors.register) {
                    this.errors.register[prop] = ''
                }
            }
        }
    }
</script>
