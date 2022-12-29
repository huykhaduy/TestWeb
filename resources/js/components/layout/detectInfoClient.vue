<template>
    <div class="container"
         v-loading.fullscreen.lock="fullscreenLoading"
    >
    </div>
</template>

<script>
import ElementUI from 'element-ui';
import {
    Icon
} from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);
Vue.use(Icon);
export default {
    data() {
        return {
            ipClient: '',
            fullscreenLoading:true
        }
    },
    mounted() {
        this.getIpClient()
        setTimeout(()=>{
            this.fullscreenLoading = false
        },1000)
    },
    methods: {
        getIpClient(){
            fetch('https://api.ipify.org?format=json')
                .then(x => x.json())
                .then(({ ip }) => {
                    let url_check_ip = 'http://103.116.107.249:8000/check-ip-config?ip=' + ip
                    $.getJSON(url_check_ip, function (resCheck) {
                        // console.error('Thông tin trả về:')
                        // console.error(resCheck)
                        if (resCheck.accept == true) {
                        } else {
                            console.log("Chặn")
                            alert(resCheck.rd)
                            window.open('503', "_self");
                        }
                    });
                });
        }
    }
}
</script>
