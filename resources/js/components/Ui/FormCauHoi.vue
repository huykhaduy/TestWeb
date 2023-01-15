<template>
  <div id="form-cau-hoi">
    <h6 class="bg-primary text-white py-3 px-3 text-center">{{ formName }}</h6>
    <div id="form_body" v-if="currentQuestion" class="px-sm-5 px-4">
      <div class="d-flex justify-content-center mb-2 my-1">
        <p class="mr-3 mr-sm-5 mb-0"><BIconCheckCircleFill class="text-success fs-1"></BIconCheckCircleFill> Đúng: {{ countRightAnswer }}</p>
        <p class="mr-3 mr-sm-5 mb-0"><BIconXCircleFill class="text-danger fs-1"></BIconXCircleFill> Sai: {{ countFailAnswer }}</p>
        <p class="mr-3 mr-sm-5 mb-0"><BIconQuestionCircleFill class="text-info"></BIconQuestionCircleFill> Chưa làm: {{ countNotDoneAnswer }}</p>
      </div>
      <p class="mt-3 mt-sm-3 output-content" :class="{'dung':isRightChoice, 'sai': isRightChoice === false}">
        <b-badge v-if="isRightChoice" variant="success" style="font-size: 12px">Đúng</b-badge>
        <b-badge v-if="isRightChoice === false" variant="danger" style="font-size: 12px">Sai</b-badge>
        <b class="ml-1">Câu {{ currentIndex + 1 }}:</b> {{ currentQuestion.title }}
      </p>
<!--      <p class="text-muted">{{ currentQuestion['question_description'] }}</p>-->
      <div class="d-flex justify-content-center align-item-center">
        <img v-if="currentQuestion['image_url']" :src="currentQuestion['image_url']" class="img-fluid-custom">
      </div>
      <div id="answers-box" class="answer-container mt-3" v-bind:style="marginBottomAnswer">
        <div v-if="getQuestionType === this.radioType">
          <b-form-radio-group v-model="selectedRadio" :state="isRightChoice" :name="questionName" v-slot="{ ariaDescribedby }" @change="onChange" stacked>
            <b-form-radio class="py-md-3 py-2 pl-md-5 pl-5 pr-md-5 pr-4 my-md-3 my-2 bg-light cursor-pointer" :class="[{'success-icon': !(isRightChoice === null) && isInList(item['choice_value'],
            rightAnswersCurrentQuestion, 'choice_value'), 'fail-icon': isRightChoice === false && selectedRadio === item['choice_value']}]"
                          v-for="item in currentQuestion.choices" v-bind:key="item['choiceId']" :value="item['choice_value']" :aria-describedby="ariaDescribedby"
                          :disabled="selectedRadio !== ''">
              <div class="ml-1 output-content cursor-pointer" v-if="!item['image_url']">{{ item['choice_value'] }}</div>
              <div v-if="item['image_url']" class="d-flex justify-content-start cursor-pointer">
                <img class="mb-1 mt-1 img-fluid" :src="item['image_url']">
              </div>
            </b-form-radio>
            <!--          <b-form-invalid-feedback class="py-2 px-4" :state="getRadioState">Lựa chọn sai, vui lòng xem lại !</b-form-invalid-feedback>-->
<!--            <b-form-valid-feedback class="py-2 px-4" :state="isRightChoice">Lựa chọn đúng !</b-form-valid-feedback>-->
          </b-form-radio-group>
        </div>
        <div v-if="getQuestionType === this.checkboxType">
          <b-form-checkbox-group v-model="selectedCheckBox" :name="questionName" v-slot="{ ariaDescribedby }" stacked>
            <b-form-checkbox class="py-md-3 py-2 pl-md-5 pl-5 pr-md-5 pr-4 my-md-3 my-2 bg-light cursor-pointer" :class="{'success-icon': !(isRightChoice === null) && isInList(item['choice_value'], rightAnswersCurrentQuestion, 'choice_value'),
             'fail-icon': isRightChoice === false && isInList(item['choice_value'], selectedCheckBox, 'choice_value')}"
                             v-for="item in currentQuestion.choices" v-bind:key="item['choiceId']" :value="item['choice_value']" :aria-describedby="ariaDescribedby"
                             :disabled="selectValue.length > 0">
              <div class="ml-1 output-content cursor-pointer" v-if="!item['image_url']">{{ item['choice_value'] }}</div>
              <div v-if="item['image_url']" class="d-flex justify-content-start cursor-pointer">
                <img class="mb-1 mt-1 img-fluid" :src="item['image_url']">
              </div>
            </b-form-checkbox>
          </b-form-checkbox-group>
        </div>
      </div>
      <div>

      </div>
      <div class="form-navigation-bar d-md-flex justify-content-center py-2 d-none">
        <b-button variant="primary" class="mr-sm-3 mr-2" @click="previousPage">
          <BIconArrowLeftCircle></BIconArrowLeftCircle> Trước
        </b-button>

        <b-button variant="primary" class="mr-sm-3 ml-2" @click="nextPage">
          Tiếp <BIconArrowRightCircle></BIconArrowRightCircle>
        </b-button>
      </div>

      <div id="mobile-nav" ref="mobileNav" class="form-bottom-mobile d-md-none d-flex justify-content-between bg-light position-fixed px-3 py-3">
<!--        <div>-->
<!--          <b-button variant="danger">-->
<!--            <BIconArrowRepeat></BIconArrowRepeat>-->
<!--          </b-button>-->
<!--        </div>-->
        <div>
          <b-button variant="primary" class="mr-2" @click="previousPage">
            <BIconArrowLeftCircle></BIconArrowLeftCircle> Trước
          </b-button>

          <b-button variant="primary" @click="nextPage">
            Tiếp <BIconArrowRightCircle></BIconArrowRightCircle>
          </b-button>
        </div>
        <div>
          <b-button variant="primary" id="pop-over-content" @click="$bvModal.show('bv-modal-mucluc')">
            <BIconTagFill></BIconTagFill> Mục lục
          </b-button>

          <b-modal id="bv-modal-mucluc" size="sm" title="Mục lục" scrollable centered>
            <muc-luc style="max-height: 60vh" :questions="questions" :answers="answerData" :question-index="this.currentIndex" @updateQuestionIndex="childToParentIndex" title="hide"></muc-luc>
            <template #modal-footer="{ cancel }">
              <div class="d-flex justify-content-between w-100">
                <b-button variant="warning" @click="doAgain()">
                  <BIconArrowRepeat></BIconArrowRepeat> Làm lại
                </b-button>
                <b-button variant="success" @click="cancel()">
                  Trở về
                </b-button>
              </div>
            </template>
          </b-modal>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
import Vue from "vue";
import MucLuc from "./MucLuc";

export default {
  name: "FormCauHoi",
  components: {MucLuc},
  comments: {MucLuc},
  props: ['questions', 'formName', 'answers'],
  emits: ['updateAnswer', 'updateQuestionIndex'],
  data(){
    return{
      radioType: 'radio',
      checkboxType: 'checkbox',
      selectedRadio: "",
      selectedCheckBox: [],
      marginBottomAnswer: { },
      changeQuestionTimer: null,
    }
  },

  computed:{
    currentQuestion:{
      get(){
        return this.questions[this.currentIndex];
      },
    },
    currentIndex:{
      get(){
        return this.answers.questionIndex;
      },
      set(value){
        this.$emit('updateQuestionIndex', value);
      }
    },

    answerData:{
      get(){
        return this.answers.data;
      },
      set(val){
        console.log('send to parent');
        this.$emit('updateAnswer', val);
      }
    },

    currentAnswer:{
      get(){
        return this.answerData.find(ans => ans['questionId'] === this.currentQuestion['questionId']);
      },
      set(val){
        let myAns = new Object({
          questionId: this.currentQuestion.questionId,
          value: val,
          isRightChoice: this.isRightChoice,
        });
        let deepCopy = [...this.answerData]
        console.log(deepCopy)
        if (this.currentAnswer){
          deepCopy[this.answerData.indexOf(this.currentAnswer)] = myAns;
        }
        else {
          deepCopy.push(myAns);
        }
        this.answerData = deepCopy;
      }
    },

    selectValue(){
      if (this.getQuestionType === this.radioType)
        return this.selectedRadio;
      else if (this.getQuestionType === this.checkboxType)
        return this.selectedCheckBox;
      return null;
    },

    getQuestionType(){
      return this.currentQuestion['question_type'].toLowerCase();
    },

    isRightChoice(){
      let myValue = this.selectValue;
      if (this.getQuestionType === this.radioType){
        if (myValue === "")
          return null;
        let trueAns = this.currentQuestion.choices.find(option => option['isTrue']);
        return trueAns['choice_value'] === myValue;
      }
      else if (this.getQuestionType === this.checkboxType){
        if (!myValue.length)
          return null;
        let trueArr = this.currentQuestion.choices.filter(option => option['isTrue']);
        return trueArr.sort().join('') === myValue.sort().join('');
      }
      return null;
    },

    countRightAnswer(){
      return this.answerData.filter(item => item['isRightChoice']).length;
    },

    countAllQuestion(){
      return this.questions.length;
    },

    countFailAnswer(){
      return this.answerData.filter(item => item['isRightChoice'] === false).length;
    },

    countNotDoneAnswer(){
      return this.countAllQuestion - this.countRightAnswer - this.countFailAnswer;
    },

    questionName:{
      get(){
        if (this.currentQuestion)
          return "form-"+this.currentQuestion.questionId+"-"+this.getQuestionType;
        return "form-non-question";
      }
    },

    rightAnswersCurrentQuestion(){
      return this.currentQuestion.choices.filter(option => option['isTrue']);
    },

  },

  methods:{
    isInList(val, listVal, key){
      return listVal.find(item => item[key] === val) != null;
    },

    onChange(){
      this.currentAnswer = this.selectValue;
      console.log("Change");
      this.changeQuestionTimer = setTimeout(this.nextPage, 1800);
    },

    prepareSelectedData(){
      if (this.currentAnswer){
        if (this.getQuestionType === this.radioType)
          this.selectedRadio = this.currentAnswer['value'];
        if (this.getQuestionType === this.checkboxType)
          this.selectedCheckBox = this.currentAnswer['value'];
      }
    },

    nextPage(){
      this.currentIndex = this.currentIndex + 1 >= this.questions.length ? this.currentIndex : this.currentIndex+1;
      clearTimeout(this.changeQuestionTimer);
    },

    previousPage(){
      this.currentIndex = this.currentIndex - 1 < 0 ? this.currentIndex : this.currentIndex-1;
      clearTimeout(this.changeQuestionTimer);
    },

    childToParentIndex(val){
      this.currentIndex = val;
    },

    doAgain(){
      this.answerData = [];
      this.currentIndex = 0;
      this.prepareSelectedData();
      this.$bvModal.hide('bv-modal-mucluc');
    }
  },

  watch:{
    // Index thay đổi nên reset data
    currentIndex(){
      this.selectedRadio = "";
      this.selectedCheckBox = [];
      this.prepareSelectedData();
    },
  },

  beforeMount() {
    this.prepareSelectedData();
  },

  mounted() {
    let answerHeight = (this.$refs.mobileNav.clientHeight) > 0 ? this.$refs.mobileNav.clientHeight + 50: 0;
    Vue.set(this.marginBottomAnswer, 'margin-bottom', `${answerHeight}px`);
    console.log(answerHeight);
  }
}
</script>

<style>
#form_body{
  max-height: 90vh;
  overflow-y: auto;
}

.img-fluid-custom{
  max-width: 500px;
  text-align: center;
  min-width: 100px;
  height: auto;
}

@media screen and (max-width: 768px)  {
  html{
    font-size: 13px;
  }
}

@media screen and (max-width: 576px){
  html{
    font-size: 12px;
  }
}

html{
  font-size: 14px;
}

.custom-control-label{
  width: 100%;
}

.fail-icon input:checked ~ .custom-control-label::after,
.success-icon input:checked ~ .custom-control-label::after{
  background: transparent !important;
}

.success-icon input ~ .custom-control-label::before,
.success-icon input:checked ~ .custom-control-label::before{
  background-image: url("/public/icons8-done-64.png") !important;
  background-size: cover;
  background-color: transparent !important;
}

.fail-icon input:checked ~ .custom-control-label::before{
  background-size: contain;
  background-image: url("/public/icons8-cancel-128.png") !important;
  background-color: transparent !important;
}

.form-bottom-mobile{
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: 10;
}

.output-content{
  white-space: pre-line;
}

.cursor-pointer{
  cursor: pointer;
}

</style>
