<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- DataTable JS -->
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<!-- This is required to inclue button library to use datatable buttons -->
<script src="<?php echo base_url('assets/js/datatables_button.min.js'); ?>"></script>

<!-- <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.bootstrap.min.js"></script> -->


<script>
    $(document).ready(function () {
        function isDateValid(date) {
            return !isNaN(new Date(date));
        }
        // datatable with buttons
        $('#example').DataTable({
            // Provides column definitions for table.
            dom: '<<"d-flex justify-content-between"<l><f>><t><"d-flex justify-content-between"i<"pagination pagination-sm"p>>>',
            columnDefs: [
                // Following rule will target 0th and 4th column and apply desable ordering for that columns
                {
                    'target': [0],
                    'orderable': false
                },
                {
                    'target': [0, 3, 4],
                    'searchable': false
                },
                // Following will provides names to columns that can be access in back end side for applying searching and filtering.
                { name: 'emp_no', targets: 0 },
                { name: 'first_name', targets: 1 },
                { name: 'last_name', targets: 2 },
                { name: 'gender', targets: 3 },
                { name: 'hire_date', targets: 4 }
            ],
            paging: true,
            processing: true,
            serverSide: true, //serverSide attrubute lets you to enable of disable serverSide Processing for datatable.
            // Used to send ajax request to specified end-point for data retrival with datatable cofiguration data.
            ajax: {
                url: '<?php echo base_url('employee/fetch_employees'); ?>',
                type: 'post',
                data: function (d) {
                    d.gender = $('#gender').val();
                    d.sdate = $('#sdate').val();
                    d.edate = $('#edate').val();
                    d.dept = $('#department').val();
                }
            },
            // Data that will going to display i columns
            columns: [
                { data: 'emp_no' },
                { data: 'first_name' },
                { data: 'last_name' },
                { data: 'birth_date' },
                { data: 'dept_name' },
                { data: 'gender' },
                { data: 'hire_date' },
                // { data: 'action' },
            ],
            // buttons: ['csv', 'excel', 'pdf']
            // paging:{
            //     firstLast:false,
            //     previousNext:false
            // }
        });

        // Redrawing datatable on changing gender in select box
        $('#gender').on('change', function () {
            // empDataTable.draw();
            $('#example').DataTable().ajax.reload();
        });

        // Retriving employees between specified birthdate
        $('#apply-btn').on('click', function () {
            $('#example').DataTable().ajax.reload();
        });

        // Reseting birthdate filter
        $('#reset-btn').on('click', function () {
            $('#sdate').val("");
            $('#edate').val("");
            $('#example').DataTable().ajax.reload();
        });

        // $('#dept').on('change', function(){
        //     $('#example').DataTable().ajax.reload();
        // });

        $('#sdate').on('change', function () {
            // If end date is disable then it will enable it.
            if ($('#edate').is(":disabled")) {
                $('#edate').prop('disabled', false);
            }
            // If end date is enabled and valid date is there then it will send ajax for data new data retrival.
            else if (!($('#edate').is(":disabled")) && isDateValid($('#edate').val())) {
                $('#example').DataTable().ajax.reload();
            }
            else {
                alert("Please select end date.");
            }
        });

        $('#edate').on('change', function () {
            $('#example').DataTable().ajax.reload();
        });

        $('#department').on('change', function () {
            $('#example').DataTable().ajax.reload();
        });

        // Resetting all filters
        $('#reset-filters-btn').on('click', function () {
            $('#gender').val("");
            $('#sdate').val("");
            $('#edate').val("");
            $('#department').val("");
            $("#example").DataTable().ajax.reload();
        });
    });
</script>
</body>

</html>