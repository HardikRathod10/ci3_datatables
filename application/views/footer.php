<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- DataTable JS -->
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>

<script>
    $('#dataTable').DataTable({
        // Used to set paging
        // paging:false,
        // scrollY:400,
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?= base_url('employee/fetch_employees'); ?>",
            type: "post",
            dataType: "json"
        },
        colomns: [
            { data: 'emp_no' },
            { data: 'birth_date' },
            { data: 'first_name' },
            { data: 'last_name' },
            { data: 'gender' }
        ]
    });
</script>
</body>

</html>