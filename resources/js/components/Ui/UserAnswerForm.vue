<template>
  <div class="row mx-0">
    <FormCauHoi class="col-md-8 px-0" :questions="localQuestion.data" v-bind:answers="localAnswer" @updateAnswer="updateAnswerData" @updateQuestionIndex="updateQuestionIndex"></FormCauHoi>
    <MucLuc class="col-md-4 d-md-block d-none" :questions="localQuestion.data" :answers="localAnswer.data" :question-index="localAnswer.questionIndex" @updateQuestionIndex="updateQuestionIndex" @doAgain="resetData"></MucLuc>
  </div>
</template>

<script>

import axios from "axios";
// import rest_api from "../../api/rest_api.js";

import FormCauHoi from "./FormCauHoi"
import MucLuc from "./MucLuc"

export default {
  name: "UserAnswerForm",
  components: {MucLuc, FormCauHoi},
  props: ['chapterId'],
  data(){
    return{
      // TODO: Đổi propsChapterId và formname thành property sau khi xong
      // formName: 'Chương 6: Hóa học hữu cơ',

      // Biến question cục bộ
      // chapterId: 1,
      localQuestion: {
        name: 'local_question_data',
        data: [],
        chapterId: this.chapterId,
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

    resetData(){
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
    if (tempQuestion && tempQuestion.chapterId === this.chapterId){
      this.localQuestion = tempQuestion;
      let tempAnswer = this.getLocalAnswer();
      if (tempAnswer){
        this.localAnswer = tempAnswer;
      }
    }

    // Không tồn tại dữ liệu
    else {

      // Update local storage question
      this.isLoading = true;
      axios.get(`/questions/${this.chapterId}`)
        .then(res => {
          this.isLoading = false;
          this.localQuestion.data = res['data']['questions'];
          this.setLocalQuestion(this.localQuestion);
          // Reset local answer
          this.setLocalAnswer(this.localAnswer);
        })
        .catch(err => {
          this.isLoading = false;
          this.setLocalQuestion(this.localQuestion);
          this.resetData();
          console.log(err);
        });
    }

    this.isDataLoaded = true;
  }
}
</script>

<style scoped>

</style>
