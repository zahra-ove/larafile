// start ckeditor configuration
ClassicEditor
.create( document.querySelector( '#desc_ck' ), {
    language: 'fa'    //support rtl for persian language
} )
.catch( error => {
    console.error( error );
} );

// end ckeditor configuration
