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
