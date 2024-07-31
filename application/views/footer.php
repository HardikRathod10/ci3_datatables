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
<script src="<?php //echo base_url('assets/js/datatables_button.min.js'); ?>"></script>

<!-- <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.bootstrap.min.js"></script> -->


<script>
    $(document).ready(function(){
    // datatable with buttons
        $('#example').DataTable({
            // Provides column definitions for table.
            columnDefs:[
                // Following rule will target 0th and 4th column and apply desable ordering for that columns
                {
                    'target':[0,4],
                    'ordering':false
                },
                {
                    'target':[0,3,4],
                    'searching':false
                },
                // Following will provides names to columns that can be access in back end side for applying searching and filtering.
                { name: 'emp_no', targets: 0 },
                { name: 'first_name', targets: 1 },
                { name: 'last_name', targets: 2 },
                { name: 'gender', targets: 3 },
                { name: 'hire_date', targets: 4 }
            ],
            paging:true,
            processing:true,
            serverSide:true, //serverSide attrubute lets you to enable of disable serverSide Processing for datatable.
            // Used to send ajax request to specified end-point for data retrival with datatable cofiguration data.
            ajax:{
                url:'<?php echo base_url('employee/fetch_employees'); ?>',
                type:'post'
            },
            // Data that will going to display i columns
            columns: [
                { data: 'emp_no' },
                { data: 'first_name' },
                { data: 'last_name' },
                { data: 'gender' },
                { data: 'hire_date' }
            ],
            // dom:'<<"d-flex justify-content-between"l<B>f><t><"d-flex justify-content-between"ip>>',
            buttons: ['csv','excel','pdf']
            // paging:{
            //     firstLast:false,
            //     previousNext:false
            // }
        });
    });
</script>
</body>

</html>