document.addEventListener('DOMContentLoaded', function() {
    var confirmLinks = document.querySelectorAll('#table .btndelete');
    confirmLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); 
            var closestRow = link.closest('tr');
            var id = closestRow.querySelector('td:first-child').innerText;
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'deleteorder.php',
                        type: 'POST', 
                        data: { id: id }, 
                        success: function(response) {
                            if(response.trim() != 'error'){
                                closestRow.remove();
                                Swal.fire('Deleted!', 'Your record has been deleted.', 'success');
                            }else{
                                Swal.fire('An error occurred!', 'We could not delete your record!', 'error');
                            }
                        },
                        error: function(xhr, status, error) {
                            
                            console.error(xhr);
                            alert('Error occurred while deleting order.');
                        }
                    });
                }
            });
            
        });
    });
});
