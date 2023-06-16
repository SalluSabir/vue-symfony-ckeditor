import Vue from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue2';
import Example from './components/Example';

Vue.use(CKEditor);
/**
* Create a fresh Vue Application instance
*/
new Vue({
  el: '#app',
  components: {Example}
});