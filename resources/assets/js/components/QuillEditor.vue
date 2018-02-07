<template>
<div>
	  <p>{{message}}</p>
     <quill-editor v-model="content"
                  ref="quillEditorA"
                  :options="editorOption"
                  @blur="onEditorBlur($event)"
                  @focus="onEditorFocus($event)"
                  @ready="onEditorReady($event)">
		</quill-editor>
</div>
	
</template>

<script type="text/javascript">

import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'

import VueQuillEditor from 'vue-quill-editor'

	export default{
		 data(){
		 	return {	
		     message: 'Hi from Vue.',
		     content: '',
		     editorOption: {
		        theme: 'snow'
		      }
		 	}
	 	},
    components: {
    	QuillEditor: VueQuillEditor.quillEditor
    },
    methods: {
      onEditorBlur(quill) {
        console.log('editor blur!', quill)
      },
      onEditorFocus(quill) {
        console.log('editor focus!', quill)
      },
      onEditorReady(quill) {
        console.log('editor ready!', quill)
      }
    },
    computed: {
      editorA() {
        return this.$refs.quillEditorA.quill
      }
    },
    mounted() {
      console.log('this is quill A instance object', this.editorA)
    }
	}
</script>