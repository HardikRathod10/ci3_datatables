<?php $this->load->view("header"); ?>
<h3 class="text-center my-4">EMPLOYEES</h3>
<div class="row mx-4">
    <div class="col-md-3 row">
        <div class="col-md col-12 p-0">
            <ul class="list-group">
                <!-- Geneder wise filter selector -->
                <li class="list-group-item">
                    <label class="col-6 col-form-label" for="sdate">Gender-wise filter:</label>
                    <select class="form-select form-select-sm" name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </li>
                <!-- Department-wise filter selector options will come diynamically from department table. -->
                <li class="list-group-item">
                    <label class="col-6 col-form-label" for="sdate">Department-wise filter:</label>
                    <select class="form-select form-select-sm" name="department" id="department">
                        <option value="">Select Department</option>
                        <?php foreach ($departments as $department): ?>
                            <option value="<?= $department->dept_no; ?>"><?= $department->dept_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <!-- Birthdate wilse filter -->
                <li class="list-group-item">
                    <div class="row">
                        <label class="col-3 col-form-label" for="sdate">Start Date:</label>
                        <div class="col-9">
                            <input type="date" class="form-control form-control-sm" name="sdate" id="sdate"
                                placeholder="Start date">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-3 col-form-label" for="edate">End Date:</label>
                        <div class="col-9">
                            <input type="date" class="form-control form-control-sm" name="edate" id="edate"
                                placeholder="End date" disabled>
                        </div>
                    </div>
                    <!-- <div class="btn-group">
                    <button class="btn btn-secondary btn-sm" id="apply-btn">Apply</button>
                    <button class="btn btn-secondary btn-sm" id="reset-btn">Reset</button>
                </div> -->
                </li>
                <!-- Button to reset all filters. -->
                <li class="list-group-item">
                    <button id="reset-filters-btn" class="btn btn-outline-secondary btn-sm w-100">Reset all
                        filters</button>
                </li>
            </ul>
        </div>

        <div class="col-md col-12 p-0 mb-4 mt-3">
            <ul class="list-group">
                <!-- Department wise employee-->
                <li class="list-group-item">
                    <label class="" for="sdate">Gender-wise employees</label>
                    <table class="table" id="departme-emp-count" border="1">
                        <thead>
                            <tr class="table-light">
                                <th scope="col">Gender</th>
                                <th class="text-end" scope="col">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gender as $count): ?>
                                <tr>
                                    <td><?= $count->gender == "M" ? "Male" : "Female" ?></td>
                                    <td class="text-end"><?= $count->count ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </li>
                <!-- Gender wise employee-->
                <li class="list-group-item">
                    <label class="" for="sdate">Gender-wise employees</label>
                    <table class="table" id="departme-emp-count" border="1">
                        <thead>
                            <tr class="table-light">
                                <th scope="col">Department</th>
                                <th class="text-end" scope="col">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($departmet_count as $dept): ?>
                                <tr>
                                    <td><?= $dept->dept ?></td>
                                    <td class="text-end"><?= $dept->count ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>

    </div>

    <!-- **NOTE**: While working with datatable we must have <thead></thead> in table, <tbody> not required -->

    <div class="col-md-9">
        <ul class="list-group">
            <li class="list-group-item">
                <table class="table table-striped mb-2 w-100" id="example" border="1">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Birth Date</th>
                            <th scope="col">Department</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Hire Date</th>
                            <!-- <th scope="col">Action</th> -->
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
            </li>
        </ul>
    </div>
</div>
<?php $this->load->view("footer"); ?>