$(document).ready(function() {
$(".list-records").on('click','#remove_post', function(){
	const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
  	var id = $(this).data("id");
	axios.post('/cks-admin/post/delete', {
    id: id,
  })
  .then(function (response) {
    console.log(response);
    if(response.data.stt == 200){
    	$("#post_"+id).remove();
    	swalWithBootstrapButtons.fire(
	      'Deleted!',
	      'Your file has been deleted.',
	      'success'
	    )
    }
  })
  .catch(function (error) {
    console.log(error);
  });
    
  } else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
	
})
// var options = {
//     filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
//     filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
//     filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
//     filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
//   };
//   CKEDITOR.replace('summary-ckeditor', options);
CKEDITOR.replace( 'summary-ckeditor', {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        } );
});

    // CKEDITOR.replace( 'summary-ckeditor' );
    
