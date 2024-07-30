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

<!-- <script src="https://cdn.datatables.net/buttons/3.1.0/js/dataTables.buttons.min.js"></script> -->


<script>
    $(document).ready(function(){
    // datatable with buttons
        $('#example').DataTable({
            columnDefs:[
                {
                'target':[0,4],
                'ordering':false
                }
            ],
            processing:true,
            serverSide:true,
            ajax:{
                url:'<?php echo base_url('employee/fetch_employees'); ?>',
                type:'post'
            },
            columns: [
                { data: 'emp_no' },
                { data: 'first_name' },
                { data: 'last_name' },
                { data: 'gender' },
                { data: 'hire_date' }
            ],
            dom:'<<"d-flex justify-content-between"l<B>f><t><"d-flex justify-content-between"ip>>',
            buttons: ['csv','excel','pdf']
            // paging:{
            //     firstLast:false,
            //     previousNext:false
            // },
            // search:{
            //     return:true
            // }
        });
    });
</script>
</body>

</html>