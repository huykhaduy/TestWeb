<template>
    <div v-loading.fullscreen.lock="loading.status" :element-loading-text="loading.text"
         element-loading-spinner="el-icon-loading" element-loading-background="rgba(0, 0, 0, 0.8)">
        <div class="login-wrapper">
            <div class="loginbox">
                <div class="img-logo">
                    <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                </div>
                <h3>Đăng nhập thành viên</h3>
                <p class="account-subtitle">Đăng nhập với email của bạn</p>

                <div class="form-group">
                    <label class="focus-label">Email</label>
                    <input type="text" v-model="infoLogin.userName" required name="email" placeholder="Nhập email của bạn" class="form-control ">
                </div>
                <div class="form-group">
                    <label class="focus-label">Mật khẩu</label>
                    <input type="password" v-model="infoLogin.passWord" required name="password" class="form-control ">
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" @click.passive="login()">Đăng nhập</button>
                </div>
                <div class="dont-have">Bạn chưa có tài khoản? <a href="/register">Đăng ký</a></div>
            </div>
        </div>
    </div>
</template>
<script>
import rest_api from "../../api/rest_api";
import Vue from 'vue';
import ElementUI from 'element-ui';
import {Icon} from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);
Vue.use(Icon);
export default {
    data() {
        return {
            loading: {
                status: false,
                text: 'Loading...'
            },
            infoLogin: {
                userName: '@gmail.com',
                password: 'xxxx',
            }
        }
    },
    mounted() {
        console.log('Mounted Login...')
    },
    methods: {
        login() {
            if(!this.infoLogin.userName){
                this.thongBao('error','Vui lòng bổ sung tên tài khoản.')
                return;
            }
            if(!this.infoLogin.passWord){
                this.thongBao('error','Vui lòng bổ sung mật khẩu.')
                return;
            }
            let params = {
                'email': this.infoLogin.userName,
                'password': this.infoLogin.passWord,
            }
            console.log(params)
            var url = '/login'
            this.loading.status = true;
            this.loading.text = 'Đang đăng nhập...'
            rest_api.post(url, params).then(
                response => {
                    console.error('Thông tin đăng nhập trả về:')
                    console.error(response)
                    if(response.data.rc==0){
                        this.thongBao('success',response.data.rd)
                        if(response.data.data.role==1){
                            window.open("admin","_self")
                        }else{
                            window.open("/","_self")
                        }
                    }
                    else {
                        this.thongBao('error',response.data.rd)
                    }
                    this.loading.status = false;
                }
            ).catch((e) => {
            })
        },
        thongBao(typeNoty, msgNoty) {
            let msg = "";
            let cl = "";
            if (msgNoty) {
                msg = msgNoty;
            }
            let type = "success";
            if (typeNoty) {
                type = typeNoty
            }
            if (type == "success") {
                cl = "dts-noty-success"
            }
            if (type == "warning") {
                cl = "dts-noty-warning"
            }
            if (type == "error") {
                cl = "dts-noty-error"
            }
            if (type == "info") {
                cl = "dts-noty-info"
            }
            this.$message({
                customClass: cl,
                showClose: true,
                message: msg,
                type: type,
                duration: 3000
            });
        },
    }
}
</script>
<style scoped="scoped">
.pxn-button-login {
    color: #ffffff;
    font-family: 'Encode Sans', sans-serif;
    padding: 7px 16px;
    text-align: center;
    background: #1A9CC6;
    border: unset;
    box-shadow: inset 0 0 0 0 #0071dc;
    border-radius: 4px;
    min-width: 110px;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
    font-weight: 600;
    font-size: 13px;
    line-height: 22px;
}
</style>
