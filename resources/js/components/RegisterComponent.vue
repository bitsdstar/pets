<template>


              <div class="form-block">
                  <div class="mb-4">
                  <h3>Sign Up to <strong>Pet</strong></h3>
                </div>
                <p v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul>
                    <li v-for="error in errors" v-bind:key = error >{{ error }}</li>
                    </ul>
                </p>
                <form v-on:submit.prevent="register">
                  <div class="form-group first">
                    <label for="username">First Name</label>
                    <input type="text" v-model="first_name" class="form-control" id="first_name">
                   
                  </div>
                     <div class="form-group first">
                    <label for="username">LastName</label>
                    <input type="text" v-model="last_name" class="form-control" id="last_name">

                  </div>
                     <div class="form-group first">
                    <label for="username">Email</label>
                    <input type="email" v-model="email" class="form-control" id="Email">

                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" v-model="password" class="form-control" id="password">
                    
                  </div>
                     <div class="form-group first">
                    <label for="username">User Type</label>
                    <input type="text" v-model.trim="user_type" class="form-control" id="user_type">

                  </div>
                     <div class="form-group first">
                    <label for="username">Mobile No.</label>
                    <input type="text" v-model.trim="mobile_no" class="form-control" id="mobile_no">

                  </div>
                  
                     <div class="form-group first">
                    <label for="username">Address</label>
                    <textarea v-model.trim="address" class="form-control" id="address"></textarea>

                  </div>

                  <button class="btn btn-pill text-white btn-block btn-primary">Register</button>

                </form>
              </div>
       
  
</template>

<script>
 import axios from 'axios'
export default {
    name:'RegisterComponent',
     data(){
            return {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                user_type: '',
                mobile_no: '',
                address: '',

                errors: [],
            }
        },
  methods:{
          register() {
            this.errors= [];
               if (!this.first_name) {
                return  this.errors.push('First Name required.');
                }
                if (!this.last_name) {
                 return this.errors.push('Last Name required.');
                }
                if (!this.email) {
                 return this.errors.push('Email required.');
                }
                if (!this.password) {
                 return this.errors.push('Password required.');
                }
                if (!this.user_type) {
                 return this.errors.push('User Type required.');
                }
                axios.post('/api/auth/signup',
                    {
                        firstname:this.first_name,
                        lastname:this.last_name,
                        email:this.email,
                        password:this.password,
                        user_type:this.user_type,
                        mobile_no:this.mobile_no,
                        address:this.address,
                        device_type: 'web',
                    })
                    .then((res) => {
                        console.log(res)
                        let msg = res.data.message
                         this.$router.push({name:"Login",  params: { msg }});
                    })
                    .catch((error) => {
                      if (error.response.status == 422){
                        let obj = error.response.data.message;
                        let valerror = obj[Object.keys(obj)[0]];
                        this.errors.push(valerror[0]);
                      }else{
                        let msg = error.response.data.message;
                        this.errors.push(msg);
                      }
                       $("html, body").animate({ scrollTop: 0 }, "slow");
                    })
            },
  }

}
</script>
<style>
h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: "Roboto", sans-serif; }

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a:hover {
    text-decoration: none !important; }

h2 {
  font-size: 20px; }

.form-block {
  background: whitesmoke;
  padding: 180px;
  padding-left: 400px;
  padding-right: 400px;
  -webkit-box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.1); }
  @media (max-width: 991.98px) {
    .form-block {
      padding: 30px; } }

.social-login a {
  text-decoration: none;
  position: relative;
  text-align: center;
  color: #fff;
  margin-bottom: 10px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: inline-block; }
  .social-login a span {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%); }
  .social-login a:hover {
    color: #fff; }
  .social-login a.facebook {
    background: #3b5998; }
    .social-login a.facebook:hover {
      background: #344e86; }
  .social-login a.twitter {
    background: #1da1f2; }
    .social-login a.twitter:hover {
      background: #0d95e8; }
  .social-login a.google {
    background: #ea4335; }
    .social-login a.google:hover {
      background: #e82e1e; }

.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
  font-size: 14px; }
  .control .caption {
    position: relative;
    top: .2rem;
    color: #888; }

.control input {
  position: absolute;
  z-index: -1;
  opacity: 0; }

.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;
  border-radius: 4px; }

.control--radio .control__indicator {
  border-radius: 50%; }

.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
  background: #ccc; }

.control input:checked ~ .control__indicator {
  background: #38d39f; }

.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:checked:focus ~ .control__indicator {
  background: #4dd8a9; }

.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.9;
  pointer-events: none; }

.control__indicator:after {
  font-family: 'icomoon';
  content: '\e5ca';
  position: absolute;
  display: none;
  font-size: 16px;
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }

.control input:checked ~ .control__indicator:after {
  display: block;
  color: #fff; }

.control--checkbox .control__indicator:after {
  top: 50%;
  left: 50%;
  margin-top: -1px;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%); }

.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b; }

.control--checkbox input:disabled:checked ~ .control__indicator {
  background-color: #7e0cf5;
  opacity: .2; }
</style>




