<?php $this->load->view("header"); ?>
<div class="container my-4 p-4">
    <table class="table" id="example">
        <select class="form-select w-25 float-end mb-3" name="gender" id="gender">
            <option value="">Select Gender</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Hide Data</th>
            </tr>
        </thead>
        <!-- <tbody>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody> -->
    </table>
</div>
<?php $this->load->view("footer"); ?>