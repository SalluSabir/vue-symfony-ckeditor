<template>
    <div id="myeditor">
        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
    </div>
</template>

<script>
    
    import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';

    import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph';
    import Heading from '@ckeditor/ckeditor5-heading/src/heading';
    import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
    import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
    import Link from '@ckeditor/ckeditor5-link/src/link';
    import List from '@ckeditor/ckeditor5-list/src/list';
    import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote';
    import SimpleUploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter';
    import Image from '@ckeditor/ckeditor5-image/src/image';
    import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption';
    import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle';
    import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar';
    import ImageUpload from '@ckeditor/ckeditor5-image/src/imageupload';
    import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials';
    import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed';

    export default {
        name: 'MyEditor',
        data() {
            return {
                editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                locale: 'en',
                editorConfig: {
                    language: this.locale,
                    plugins: [Essentials,Bold,Italic,BlockQuote,Heading,MediaEmbed,SimpleUploadAdapter,Image,ImageCaption,ImageStyle,ImageToolbar,ImageUpload,Link,List,Paragraph],
                    toolbar: {
                        items: ['paragraph','heading','bold','italic','link','bulletedList','numberedList','blockQuote','imageUpload','mediaEmbed','undo','redo']
                    },
                    simpleUpload: {
                        uploadUrl: process.env.ARTICLE_UPLOAD_URL
                    },
                    image: {
                        toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],
                        styles: ['full','alignLeft','alignRight']
                    },
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                        ]
                    }
                }
            };
        }
    };
</script>