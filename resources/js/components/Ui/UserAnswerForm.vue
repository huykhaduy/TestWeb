<template>
  <div class="row mx-0">
    <FormCauHoi class="col-md-8 px-0" :questions="localQuestion.data" :form-name="formName" v-bind:answers="localAnswer" @updateAnswer="updateAnswerData" @updateQuestionIndex="updateQuestionIndex"></FormCauHoi>
    <MucLuc class="col-md-4 d-md-block d-none" :questions="localQuestion.data" :answers="localAnswer.data" :question-index="localAnswer.questionIndex" @updateQuestionIndex="updateQuestionIndex" @doAgain="doAgain"></MucLuc>
  </div>
</template>

<script>

// import axios from "axios";
import rest_api from "../../api/rest_api.js";

import FormCauHoi from "./FormCauHoi"
import MucLuc from "./MucLuc"

export default {
  name: "UserAnswerForm",
  components: {MucLuc, FormCauHoi},
  props: ['propChapterId', 'formName'],
  data(){
    return{
      // TODO: Đổi propsChapterId và formname thành property sau khi xong
      // propsChapterId: 1,
      // formName: 'Chương 6: Hóa học hữu cơ',

      // Biến question cục bộ
      localQuestion: {
        name: 'local_question_data',
        data: [],
        chapterId: this.propChapterId,
      },

      // Biến answer cục bộ
      localAnswer: {
        name: 'local_answer_data',
        data: [],
        questionIndex: 0,
      },

      // localAnswer2: {
      //   name: 'local_answer_data',
      //   data: [
      //     {questionId: '123', value: ['choiceValue'], isRightChoice: null}
      //   ],
      //   questionIndex: 0,
      // },

      // Biến loading để hiển thị màn hình load
      isLoading: false,

      // Biến giúp watch không upload lại lần đầu tiên
      isDataLoaded: false,
    }
  },
  computed:{

  },

  // Các phương thức như getQuestionData(), getLocalAnswer(), getLocalQuestion();
  methods:{
    fetchQuestionData(){
      this.isLoading = true;
      axios.get(`/questions/${this.propChapterId}`)
        .then(res => {
          this.isLoading = false;
          console.log(res);
          return res;
        })
        .catch(err => {
          this.isLoading = false;
          console.log(err);
        });
      return {};
      // rest_api.post(`/questions/${this.propChapterId}`, null).then(
      //           response => {
      //               console.error('Thông tin đăng nhập trả về:')
      //               console.error(response)
      //               if(response.data.rc==0){
      //                   this.thongBao('success',response.data.rd)
      //                   if(response.data.data.role==1){
      //                       window.open("admin","_self")
      //                   }else{
      //                       window.open("/","_self")
      //                   }
      //               }
      //               else {
      //                   this.thongBao('error',response.data.rd)
      //               }
      //               this.loading.status = false;
      //           }
      //       ).catch((e) => {
      //       })
    },

    getLocalAnswer(){
      return JSON.parse(localStorage.getItem(this.localAnswer.name));
    },

    setLocalAnswer(value){
      localStorage.setItem(this.localAnswer.name ,JSON.stringify(value));
    },

    getLocalQuestion(){
      return JSON.parse(localStorage.getItem(this.localQuestion.name));
    },

    setLocalQuestion(value){
      localStorage.setItem(this.localQuestion.name, JSON.stringify(value));
    },

    updateQuestionIndex(e){
      this.localAnswer.questionIndex = e;
    },

    updateAnswerData(e){
      this.localAnswer.data = e;
    },

    doAgain(){
        this.updateQuestionIndex(0);
        this.updateAnswerData([]);
    },

  },

  // Theo dõi thay đổi của localAnswer - nơi lưu các câu trả lời vào localStorage
  watch:{
    localAnswer:{
        handler(val){
          if (this.isDataLoaded){
            this.setLocalAnswer(val);
            this.localAnswer = val;
          }
        },
        deep: true
    }
  },

  created() {
    // Kiểm tra localStorage nếu có thì hiển thị
    // Ngược lại, gọi request và lưu vào localStorage

    // TH1: Kiểm tra localStorage
    let tempQuestion = this.getLocalQuestion();
    // Tồn tại dữ liệu
    if (tempQuestion && tempQuestion.chapterId === this.propsChapterId){
      this.localQuestion = tempQuestion;
      let tempAnswer = this.getLocalAnswer();
      if (tempAnswer){
        this.localAnswer = tempAnswer;
      }
    }

    // Không tồn tại dữ liệu
    else {
      // Update local storage question
      this.localQuestion.data = this.fetchQuestionData()['questions'];
      this.setLocalQuestion(this.localQuestion);

      // Reset local answer
      this.setLocalAnswer(this.localAnswer);
    }

    this.isDataLoaded = true;
  }
}
</script>

<style scoped>

</style>
