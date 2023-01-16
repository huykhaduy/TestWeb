<template>
  <div id="table_of_content" class="m-0 p-0">
    <div class="table-main-content">
      <div v-if="title !== 'hide'" class="panel-heading text-center py-2">
        <p><BIconTagFill></BIconTagFill> Mục lục câu hỏi</p>
      </div>
      <div class="px-3 py-2 d-flex flex-wrap justify-content-center h-100 w-100" :class="{'panel-body': title !== 'hide'}">
        <b-button v-for="(item, index) in questions" v-bind:key="item.questionId" variant="light" class="button-question-item mx-2 my-2 rounded-lg"
                  :class="{'success': isRightAnswerOfQuestion(item.questionId) , 'selected': currentIndex === index && isAnswerOfQuestionNotFound(item.questionId),
                  'fail': isWrongAnswerOfQuestion(item.questionId)}" @click="setCurrentIndex(index)">{{ index + 1 }}
        </b-button>
      </div>
      <div v-if="title !== 'hide'" class="d-flex justify-content-center mt-3">
        <b-button variant="warning" @click="$emit('doAgain')">
          <BIconArrowRepeat></BIconArrowRepeat> Làm lại tất cả
        </b-button>
      </div>
    </div>

    <div id="quang-cao-pc" class="mt-3">
      <img class="img-fluid my-2" src="https://cdn.tgdd.vn/2023/01/banner/aseri-tet-720-220-720x220-2.png">
      <img class="img-fluid my-2" src="  https://cdn.tgdd.vn/2022/12/banner/reno8-tet-720-220-720x220-2.webp">
    </div>
  </div>
</template>

<script>
export default {
  name: "MucLuc",
  props: ['questions', 'questionIndex', 'answers', 'title'],
  emits: ['updateQuestionIndex'],
  data(){
    return {

    }
  },
  computed:{
    currentQuestion:{
      get(){
        return this.questions[this.currentIndex];
      }
    },

    currentAnswer:{
      get(){
        return this.answers.find(ans => ans['questionId'] === this.currentQuestion['questionId']);
      }
    },

    currentIndex:{
      get(){
        return this.questionIndex;
      },

      set(val){
        this.$emit('updateQuestionIndex', val);
      }
    }
  },

  methods:{
    getAnswerOfQuestionId(questionId){
      return this.answers.find(ans => ans['questionId'] === questionId);
    },

    isRightAnswerOfQuestion(questionId){
      let question = this.answers.find(ans => ans['questionId'] === questionId);
      return !!(question && question.isRightChoice);
    },

    isWrongAnswerOfQuestion(questionId){
      let question = this.answers.find(ans => ans['questionId'] === questionId);
      return !!(question && question.isRightChoice === false);
    },

    isAnswerOfQuestionNotFound(questionId){
      let question = this.answers.find(ans => ans['questionId'] === questionId);
      return !question;
    },

    setCurrentIndex(index){
      this.currentIndex = index;
      this.$bvModal.hide('bv-modal-mucluc');
    }
  }
}
</script>

<style scoped>
h6, p{
  margin: 0;
  padding: 0;
}

.panel-heading{
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #d6e9c6;
}

.button-question-item{
  background-color: #f4f4f4;
  color: #444;
  border-color: #ddd;
  width: 50px;
}

.button-question-item.success{
  background-color: #5cb85c!important;
  color: white !important;
}

.button-question-item.fail{
  background-color: #d9534f!important;
  color: white !important;
}

.button-question-item.selected{
  background-color: #3c8dbc!important;
  color: white !important;
}

.panel-body{
  overflow: auto;
  max-height: 430px;
}

@media screen and (min-width: 768px){
  .panel-body{
    max-height: 250px;
  }
}
</style>