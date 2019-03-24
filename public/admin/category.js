$(document).ready(function() {
$(".list-records").on('click','#remove_cate', function(){
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
	axios.post('/cks-admin/category/delete', {
    id: id,
  })
  .then(function (response) {
    console.log(response);
    if(response.data.stt == 200){
    	$("#cat_"+id).remove();
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
});