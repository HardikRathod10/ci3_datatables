# DataTables
### What is DataTable?

Datatable is javescript library used to display data on front side with several options like filters,paginations and many more.

---

### Using DataTables:

Step-1. Add datatable css and javascirpt files to your view.
> You muse also have included jquery files.

Step-2. Create structure of table in view file where you want to display table and give unique id to it to identify it for datatable.
> While working with datatable we must have ```<thead></thead>``` in table, ```<tbody>``` not required
```
<table class="table" id="example">
        <thead> // Required
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Hide Data</th>
            </tr>
        </thead>
        <tbody> // Optional
            <tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
</table>
```
Step-3. Initialize datatable in ```<script></script>``` or inside .js file.
```
<script>
    $(document).ready(function(){
        $('#example').DataTable();
    });
</script>
```
---
### Different Options:
Datatable comes with some built-in opstions that powers use of datatable with different confifigurations. You can pass this options in Datatable object in form of objects.
```
$(document).ready(function(){
    // datatable with buttons
        $('#example').DataTable({
            // Options will go here
            paging: false,
            scrollY: 400
        });
    });
```
Below are most used options:

- **paging**:
  Used to enable/disable default pagination.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           paging: false //Will desable pagination
        });
    });
  ```
- **ordering**:
  Used to enable/disable default ordering.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           ordering: false //Will desable ordering
        });
    });
  ```
- **searching**:
  Used to enable/disable default searching.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           searching: false //Will desable searching
        });
    });
  ```
- **processing**:
  Enable/disable the display of a 'processing' indicator when the table is being processed (e.g. a sort) for server-side processing.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           processing: true //Will enable processing true
        });
    });
  ```
- **serverSide**:
  Enable/disable server side processing for datatable.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           serverSide: true //Will enable serverside processing.
        });
    });
  ```
- **ajax**:
  Used to sending ajax request for data.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           ajax:{
              url: <endpoing_url>
              type: 'post'
        });
    });
  ```
- **data**:
  Used to specify sorce of data, we have to specify result object of database query in data attribute in serveside processing.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           ajax:{
              url: <endpoing_url>
              type: 'post'
        },
        columns: [
             { data: 'emp_no' }, // Will display employee number at first column
             { data: 'first_name' } // Will display first name at second column
          ]);
    });
  ```
- **dom**:
  Changing dom structure of datatable or adding extra elements to it like buttons.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           dom:'<<"d-flex justify-content-between"l<B>f><t><"d-flex justify-content-between"ip>>'
        });
    });
    ```
- **columnDefs**:
  We can specify default column definitions for different colums.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           columnDefs:[
                // Following rule will target 0th and 4th column and apply desable ordering for that columns
                {
                    'target':[0,4],
                    'ordering':false
                },
                {
                    'target':[0,3,4],
                    'searching':false
                }
            ]
        });
    });
  ``` 
- **columns**:
  Same like columnDefs specifies column configurations.
  ```
    $(document).ready(function(){
        $('#example').DataTable({
           columns: [
                { data: 'emp_no' },
                { data: 'first_name' },
                { data: 'last_name' }
            ]
        });
    });
   ```
  You can explore more options from [Here](https://datatables.net/reference/option/)
---
### Server side processing:
Datatables basically work on two modes:
1. **Client side:** First fetch all records at client side and loads in datatable.
2. **Server side:** Fetches records as required and then loads in datatable.
> It is good to use client side datatable if you have small amout of data like 50 or 100 records but for large amout of dataset we have use serverside datatables.
#### How to enable serverside processing?
To enable serverside processing we have to set **serverSide** and **processing** option as true and neet to send ajax request to url for fetching data with **ajax** attribute.
```
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
                { name: 'last_name', targets: 2 }
            ],
            processing:true,
            serverSide:true, //serverSide attrubute lets you to enable of disable serverSide Processing for datatable.
            // Used to send ajax request to specified end-point for data retrival with datatable cofiguration data.
            ajax:{
                url:'<?php echo base_url('employee/fetch_employees'); ?>',
                type:'post'
            },
            // Data that will going to display in columns
            columns: [
                { data: 'emp_no' },
                { data: 'first_name' },
                { data: 'last_name' }
            ]
        });
    });
```
While processing data at serverside response must be in json format with following keys
1. **draw** : Number of times request send for datafetching
2. **recordsFiltered** : Count of records get filtered after query execution Without applying limit clause.
3. **recordsTotal** : Count of total record of table.
4. **data** : Actual records for display filtered with limit clause.
```
    $output = [
        'draw' => $this->input->post('draw'),
        'recordsFiltered' => $this->employee_model->count_filtered(),
        'recordsTotal' => $this->employee_model->count_all(),
        'data' => $data
    ];
    echo json_encode($output);
```   
> While workin with serverside processing we have don and have to pass data before appling limit in recordsFiltered options. also have to apply grouping if query have grouping in recordsFiltered option.

> We got some parameters about datatable like search value, order value, and many more with ajax request that can be accesed by **Post** and **Get** input methos and we can modify our queries as per this parameters.
> We can see it in **"payload"** section in network tab.

#### Redrawing datatable on filter change:
If you have used custom filter in datatable then on changing it we have to redraw datatable means we have to send new ajax request for new filter applied data.
```
 // Redrawing datatable on changing gender in select box
$('#gender').on('change', function () {
     $('#example').DataTable().ajax.reload();
});
```
