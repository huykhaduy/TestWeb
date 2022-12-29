<template>
    <div class="row" v-loading.fullscreen.lock="loading.status" :element-loading-text="loading.text"
         element-loading-spinner="el-icon-loading" element-loading-background="rgba(0, 0, 0, 0.8)">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title">Danh sách người dùng</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-3">
                    <div class="table-responsive">
                        <table class="datatable table-bordered table hover-table">
                            <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Ngày đăng ký</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody v-if="list_data&&list_data.length">
                            <tr v-for="(ip,index) in list_data" :key="index">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td>{{ ip.name }}</td>
                                <td>{{ ip.email }}</td>
                                <td class="text-center">
                                    <el-button size="mini" :type="ip.status==1?'success':'warning'">
                                        {{ ip.status == 1 ? 'Đã duyệt' : 'Chưa duyệt' }}
                                    </el-button>
                                </td>
                                <td class="text-center">{{ ip.created_at }}</td>
                                <td class="text-center">
                                    <el-button v-if="ip.status==1" size="mini" type="warning"
                                               @click.prevent="updateStatus(ip.id,0)">Huỷ duyệt
                                    </el-button>
                                    <el-button v-else size="mini" type="success"
                                               @click.prevent="updateStatus(ip.id,1)">Duyệt
                                    </el-button>
                                    <el-button size="mini" type="danger" @click.prevent="confirmDel(ip.id)">Xoá
                                    </el-button>
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p>Không có dữ liệu</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <PhanTrang v-show="paging.total>0" :tongbanghi="paging.total"
                               :batdau="trangbatdau"
                               @pageChange="layLai($event)">
                    </PhanTrang>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import rest_api from "../../api/rest_api";
import Vue from 'vue';
import ElementUI from 'element-ui';
import PhanTrang from "../Ui/PhanTrang";
import {
    Icon
} from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);
Vue.use(Icon);
export default {
    components: {
        PhanTrang
    },
    data() {
        return {
            list_data: [],
            loading: {
                status: false,
                text: 'Loading...'
            },
            show_add: false,
            dataAdd: {
                ip: '',
                name: ''
            },
            rules: {
                // name: [{
                //     required: true,
                //     message: 'Chưa nhập địa chỉ ip',
                //     trigger: ['blur', 'change']
                // }],
                ip: [{
                    required: true,
                    message: 'Chưa nhập địa chỉ ip',
                    trigger: ['blur', 'change']
                }],
            },
            trangbatdau: false,
            paging: {
                total: 250,
                start: 0,
                limit: 10,
                currentPage: 1
            },
            dataSearch: {
                userName: ''
            }
        }
    },
    mounted() {
        console.log('Mounted quản lý người dùng...')
        this.getData()
    },
    methods: {
        layLai(e) {
            console.log('onPagingClick')
            this.paging.start = e.start;
            this.paging.limit = e.limit;
            this.paging.currentPage = e.currentPage;
            this.getData()
        },
        getDataPage(page) {
            console.error('getDataPage')
            this.trangbatdau = !this.trangbatdau;
        },
        updateStatus(id, status) {
            this.$confirm('Xác nhận thay đổi trạng thái người dùng?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    let params = {
                        userId: id,
                        status: status
                    }
                    console.log(params)
                    var url = '/update-user'
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    rest_api.post(url, params).then(
                        response => {
                            if (response.data.rc == 0) {
                                console.log('Danh sách ip trả về')
                                console.log(response)
                                this.getData()
                                this.thongBao('success', 'Thay đổi trạng thái thành công')
                            } else {
                                this.thongBao('error', response.data.rd)
                            }
                            this.loading.status = false;
                        }
                    ).catch((e) => {
                    })
                })
                .catch(_ => {
                });
        },
        confirmDel(id) {
            this.$confirm('Xác nhận xoá người dùng này?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    let params = {
                        userId: id,
                    }
                    console.log(params)
                    var url = '/delete-user'
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    rest_api.post(url, params).then(
                        response => {
                            if (response.data.rc == 0) {
                                this.getData()
                                this.thongBao('success', 'Xoá dữ liệu thành công')
                            } else {
                                this.thongBao('error', response.data.rd)
                            }
                            this.loading.status = false;
                        }
                    ).catch((e) => {
                    })
                })
                .catch(_ => {
                });
        },
        getData() {
            let params = {
                start: this.paging.start,
                limit: this.paging.limit,
                userName: this.dataSearch.userName
            }
            var url = '/get-list-user'
            this.loading.status = true;
            this.loading.text = 'Đang lấy dữ liệu...'
            this.list_data = [];
            rest_api.post(url, params).then(
                response => {
                    if (response.data.rc == 0) {
                        this.list_data = response.data.data;
                        this.paging.total = response.data.total
                        this.thongBao('success', 'Lấy dữ liệu thành công')
                    } else {
                        this.thongBao('error', response.data.rd)
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
label {
    margin-bottom: 0;
}

td {
    text-align: left;
}

</style>
