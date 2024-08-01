<?php $this->load->view("header"); ?>
<div class="container my-4 p-4">
    <table class="table" id="example">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <select class="form-select form-select-sm w-25" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            <div class="d-flex">
                <div class="d-flex align-items-center me-4">
                    <label for="sdate">Start:</label>
                    <input type="date" class="form-control form-control-sm" name="sdate" id="sdate"
                        placeholder="Start date">
                </div>
                <div class="d-flex align-items-center me-4">
                    <label for="sdate">End:</label>
                    <input type="date" class="form-control form-control-sm" name="edate" id="edate"
                        placeholder="End date">
                </div>
                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm" id="apply-btn">Apply</button>
                    <button class="btn btn-secondary btn-sm" id="reset-btn">Reset</button>
                </div>
            </div>
        </div>
</div>
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Birth Date</th>
        <th scope="col">Department</th>
        <th scope="col">Gender</th>
        <th scope="col">Hide Date</th>
        <th scope="col">Action</th>
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