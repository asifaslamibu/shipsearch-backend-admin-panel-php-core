<?php
$cur_date = date('Y-m-d');
include("config.php");
// $user_id = $_SESSION['userid'];

$result = mysqli_query($db, "SELECT * ,rc.is_active as isActive FROM `ss_setup_region_country_port` rc inner join ss_setup_region r on rc.region_id = r.region_id inner join ss_setup_country c on rc.country_id = c.country_id inner join ss_setup_port p on rc.port_id = p.port_id;");
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<!-- Mirrored from themesbrand.com/velzon/html/default/apps-crm-contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Apr 2022 06:31:08 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Contacts | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php include_once('header.php'); ?>
        <!-- ========== App Menu ========== -->
        <?php include_once('sidebar.php'); ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Ports</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                                        <li class="breadcrumb-item active">Ports</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card" id="contactList">

                                <div class="card-header border-0">

                                    <div class="row g-4 align-items-center">
                                        <div class="col-sm-3">
                                            <div class="search-box">
                                                <input type="text" class="form-control search" placeholder="Search for...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto ms-auto">
                                            <div class="hstack gap-2">
                                                <!-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button> -->
                                                <button type="button" class="btn btn-info" id="coontry" data-bs-toggle="offcanvas" href="#offcanvasExample"><i class="ri-add-line align-bottom me-1"></i> Add Port</button>
                                                <!-- <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add Users</button> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-card mb-3">
                                            <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 50px;">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="responsivetableCheck">
                                                                <label class="form-check-label" for="responsivetableCheck"></label>
                                                            </div>
                                                        </th>
                                                        <th class="sort" data-sort="id">ID</th>
                                                        <th class="sort" data-sort="country">Region Name</th>
                                                        <th class="sort" data-sort="ports">Country Name</th>
                                                        <th class="sort" data-sort="ports">Ports Name</th>
                                                        <th class="sort" data-sort="status">Status</th>

                                                        <th class="sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <?php
                                                    if (mysqli_num_rows($result) > 0) {
                                                    ?>
                                                        <?php
                                                        $i = 1;
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                                    </div>
                                                                </th>
                                                                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ001</a></td>
                                                                <td class="id"><?php echo $i ?></td>
                                                                <td class="ports"><?php echo $row["region_name"]; ?></td>
                                                                <td class="ports"><?php echo $row["country_name"]; ?></td>
                                                                <td class="country"><?php echo $row["port_name"]; ?></td>

                                                                <td class="text-center" id="iditi"> <?php if ($row["isActive"] == '0') { ?>

                                                                        <div class="form-check form-switch">
                                                                            <label class="switch s-icons s-outline  s-outline-success  mb-4 mr-2">
                                                                                <input id="SwitchCheck4<?php echo $row["id"]; ?>" role="switch" class="form-check-input" type="checkbox" name=toggle value="<?php echo $row["id"]; ?>">
                                                                                <span class="slider round  mixin"></span>
                                                                            </label>
                                                                        </div>

                                                                    <?php } else { ?>
                                                                        <div class="form-check form-switch">
                                                                            <label class="switch s-icons s-outline  s-outline-success  mb-4 mr-2">
                                                                                <input class="form-check-input" role="switch" id="toggle_<?php echo $row["id"]; ?>" type="checkbox" checked="" name=toggle value="<?php echo $row["id"]; ?>" data-toggle="toggle" data-off="Closed" data-on="Open">
                                                                                <span class="slider round mixin"></span>
                                                                            </label>
                                                                        </div>

                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <ul class="list-inline hstack gap-2 mb-0">


                                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                            <a name="edit" id="<?php echo $row["id"]; ?>" data-id="<?php echo $row["id"]; ?>" class="edit_data" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="offcanvas" href="#offcanvasExample"><i class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Delete">
                                                                            <a class="delete_product" data-id='<?php echo $row['id']; ?>'>
                                                                                <i class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $i++;
                                                        }
                                                        ?>
                                                    <?php
                                                    } else {
                                                        echo '<div class="noresult" style="display: block">
                                                    <div class="text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                                        </lord-icon>
                                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                                       
                                                    </div>
                                                </div>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                                    </lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted mb-0">We've searched more than 150+ contacts We
                                                        did not find any
                                                        contacts for you search.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <div class="pagination-wrap hstack gap-2">
                                                <a class="page-item pagination-prev disabled" href="#">
                                                    Previous
                                                </a>
                                                <ul class="pagination listjs-pagination mb-0"></ul>
                                                <a class="page-item pagination-next" href="#">
                                                    Next
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0">
                                                <div class="modal-header bg-soft-info p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end add modal-->

                                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                                </div>
                                                <div class="modal-body p-5 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                                    <div class="mt-4 text-center">
                                                        <h4 class="fs-semibold">You are about to delete a contact ?</h4>
                                                        <p class="text-muted fs-14 mb-4 pt-1">Deleting your contact will
                                                            remove all of your information from our database.</p>
                                                        <div class="hstack gap-2 justify-content-center remove">
                                                            <button class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                                                Close</button>
                                                            <button class="btn btn-danger" id="delete-record">Yes,
                                                                Delete It!!</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end delete modal -->

                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->

                        <!--end col-->
                    </div>
                    <!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header bg-light">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Create Port</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!--end offcanvas-header-->
        <div class="offcanvas-body p-0 overflow-hidden">
            <div data-simplebar style="height: calc(100vh - 112px);">
                <form method="post" id="insert_form" enctype="multipart/form-data">
                    <div class="p-4">


                        <div class="mb-3">
                            <label for="date-field" class="form-label">Region</label>
                            <select class="form-control" id="region_id" name="region_id">
                                <option>Please Select</option>
                                <?php $devices = "SELECT * FROM ss_setup_region";
                                $devices1 = mysqli_query($db, $devices);
                                ?>
                                <?php foreach ($devices1 as $key => $value) { ?>
                                    <option value="<?php echo $value["region_id"]; ?>"><?php echo $value["region_name"]; ?>
                                    </option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date-field" class="form-label">Country</label>
                            <select class="form-control" id="country_id" name="country_id" data-choices>
                                <option>Please Select</option>
                                <?php $devices = "SELECT * FROM ss_setup_country";
                                $devices1 = mysqli_query($db, $devices);
                                ?>
                                <?php foreach ($devices1 as $key => $value) { ?>
                                    <option value="<?php echo $value["country_id"]; ?>"><?php echo $value["country_name"]; ?>
                                    </option>
                                <?php
                                } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date-field" class="form-label">Port</label>
                            <select class="form-control" id="port_id" name="port_id" data-choices>
                                <option>Please Select</option>
                                <?php $devices = "SELECT * FROM ss_setup_port";
                                $devices1 = mysqli_query($db, $devices);
                                ?>
                                <?php foreach ($devices1 as $key => $value) { ?>
                                    <option value="<?php echo $value["port_id"]; ?>"><?php echo $value["port_name"]; ?>
                                    </option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <input type="hidden" name="employee_id" id="employee_id">


                        <br>


                        <button type="submit" name="insert" id="insert" value="Insert" style="float: right;" class="btn btn-success">
                            <i class="ri-save-line align-bottom me-1"></i>
                            Save
                        </button>


                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include_once('setups.php'); ?>


    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- list.js min js -->
    <script src="assets/libs/list.js/list.min.js"></script>
    <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <script src="assets/js/pages/crm-contact.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script>
        $('input[name=toggle]').change(function() {
            var mode = $(this).prop('checked');
            console.log("hamza " + mode)
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: 'assign_country_port_api/active_inactiv.php',
                data: {
                    mode: mode,
                    id: id
                },
                success: function(data) {
                    var data = eval(data);
                    response_result = data.response_result;
                    success = data.success;
                    $("#heading").html(success);
                    $("#body").html(response_result);
                    location.reload();

                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#coontry').on("click", function(event) {
                // $('#insert_form')[0].reset();

                document.getElementById('port_name').value = "";

            })


            $('#insert').on("click", function(event) {
                event.preventDefault();
                if ($('#fname').val() == "") {
                    alert("fName is required");


                } else {
                    $.ajax({
                        url: "assign_country_port_api/insert_update_assign.php",
                        method: "POST",
                        data: $('#insert_form').serialize(),
                        beforeSend: function() {
                            $('#insert').val("Inserting");
                        },
                        success: function(data) {
                            $('#insert_form')[0].reset();
                            // $('#zoomupModal').modal('hide');
                            // $('#employee_table').html(data);
                            // $("#html5-extension").load(" #html5-extension");
                            // alert(data);
                            window.location.reload();
                        }
                    });
                }
            });


            $(document).on('click', '.edit_data', function() {

                var employee_id = $(this).attr("id");
                // alert(employee_id)
                $.ajax({
                    url: "assign_country_port_api/fetch_assign.php",
                    method: "POST",
                    data: {
                        employee_id: employee_id
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data.region_id)

                        $('#employee_id').val(data.id);
                        $('#region_id').val(data.region_id);
                        $('#country_id').val(data.country_id);
                        $('#port_id').val(data.port_id);


                        $('#insert').val("Update");
                        $('#title_edit').text("Edit Data");
                        // window.location.reload();

                        // $('#zoomupModal').modal('show');
                    }
                });
            });
            $(document).on('click', '.delete_product', function(e) {
                var el = this;

                // Delete id
                var deleteid = $(this).data('id');
                // 

                var confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {

                    $.ajax({
                        url: 'assign_country_port_api/delet_assign.php',
                        type: 'POST',
                        data: {
                            id: deleteid
                        },
                        success: function(response) {

                            if (response == 1) {
                                // Remove row from HTML Table
                                $(el).closest('tr').css('background', 'tomato');
                                $(el).closest('tr').fadeOut(800, function() {
                                    $(this).remove();
                                    swal({
                                        title: 'Delete Record succesfully',
                                        padding: '2em'
                                    })
                                });
                                // window.location.reload();


                            } else {
                                alert('Invalid ID.');
                            }

                        }
                    });
                }

            });
        });
    </script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/apps-crm-contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Apr 2022 06:31:09 GMT -->

</html>