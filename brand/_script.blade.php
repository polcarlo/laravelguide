<script>
$(document).ready(function(){
		//View Database
	$.fn.dataTable.ext.errMode = 'none';
    var table =	$('#brand-dt').DataTable({

		 "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"processing": true,
			"serverSide": true,


			"ajax" : "{{ route('brand.dt')}}",
			"columns":[
                {"data":"id"},
				{"data":"name"},
				{"data":"description"},
				{"data": "action", orderable:true, searchable: true}
			],
			
		});
    
    //Delete
        $(document).on('click', '.delete', function(){
            var id = $(this).attr('id');         
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
              .then((willDelete) => {
              if (willDelete) {
              $.ajax({
                    url: "{{ route('brand.destroy')}}",
                    method:"get",
                    data:{id:id},
                    success:function(data)
                    {

                        $( ".alert-dismissable" ).hide();
                       swal({
                        title: "Successfully deleted",
                        icon: "success",
                       });
                       $('#brand-dt').DataTable().ajax.reload();
                    },
                     error: function (request, status, error) {
                        alert(request.responseText);
                    }
                })
          } else {
            swal("Your file is safe!");
          }
      });
  });

    $( "#refresh" ).click(function() {
        $('#brand-dt').DataTable().ajax.reload();
    });
    $("#brand").click(function(){
        $( "#tab_update" ).hide();
    });
});


</script>