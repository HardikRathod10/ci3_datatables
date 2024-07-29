<?php $this->load->view("header"); ?>
<div class="container my-4 shadow p-4">
    <table class="table" id="dataTable">
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
            <?php //foreach ($employees as $employee): ?>
            <tr>
                <th scope="row"><?php //$employee->emp_no; ?></th>
                <td><?php //$employee->first_name; ?></td>
                <td><?php //$employee->last_name; ?></td>
                <td><?php //$employee->gender; ?></td>
                <td><?php //$employee->hire_date; ?></td>
            </tr>
            <?php //endforeach; ?>

        </tbody>
    </table>
</div>
<?php $this->load->view("footer"); ?>