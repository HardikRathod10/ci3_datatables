# DataTables
### What is DataTable?

Datatable is javescript library used to display data on front side with several options like filters,paginations and many more.

---

### Using DataTables:

Step-1. Add datatable css and javascirpt files to your view.
> You muse also have included jquery files.

Step-2. Create structure of table in view file where you want to display table and give unique id to it to identify it for datatable.
```
<table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Hide Data</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"></th>
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

- paging: Used to enable/disable default pagination.
- ordering: Used to enable/disable default ordering.
- searching: Used to enable/disable default searching.
- processing: Enable/disable the display of a 'processing' indicator when the table is being processed (e.g. a sort) for server-side processing. 
- serverSide: Enable/disable server side processing for datatable.
- ajax: used to sending ajax request for data.
- length: No of records you want to dispay on datatable default is 10.
- dom: Changing dom structure of datatable or adding extra elements to it like buttons.
- columnDefs: Default column definitions 
- columns
