<?php

?>

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <!--begin::Wrapper container-->
    <div class="app-container container-xxl d-flex flex-row flex-column-fluid">
        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content pb-0">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search user">
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Filter-->
                                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-filter fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Filter</button>
                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Separator-->
                                        <div class="separator border-gray-200"></div>
                                        <!--end::Separator-->
                                        <!--begin::Content-->
                                        <div class="px-7 py-5" data-kt-user-table-filter="form">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <label class="form-label fs-6 fw-semibold">Role:</label>
                                                <select class="form-select form-select-solid fw-bold select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true" data-select2-id="select2-data-7-ix4b" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                    <option data-select2-id="select2-data-9-7l0i"></option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Analyst">Analyst</option>
                                                    <option value="Developer">Developer</option>
                                                    <option value="Support">Support</option>
                                                    <option value="Trial">Trial</option>
                                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-mcc1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ha6c-container" aria-controls="select2-ha6c-container"><span class="select2-selection__rendered" id="select2-ha6c-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
                                                <select class="form-select form-select-solid fw-bold select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true" data-select2-id="select2-data-10-56wy" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                    <option data-select2-id="select2-data-12-tb0i"></option>
                                                    <option value="Enabled">Enabled</option>
                                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-gr6i" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-jqdt-container" aria-controls="select2-jqdt-container"><span class="select2-selection__rendered" id="select2-jqdt-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Menu 1-->
                                    <!--end::Filter-->
                                    <!--begin::Export-->
                                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                                        <i class="ki-duotone ki-exit-up fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Export</button>
                                    <!--end::Export-->
                                    <!--begin::Add user-->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                                        <i class="ki-duotone ki-plus fs-2"></i>Añadir recurso</button>
                                    <!--end::Add user-->
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                    <div class="fw-bold me-5">
                                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                                </div>
                                <!--end::Group actions-->
                                <!--begin::Modal - Adjust Balance-->
                                <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Export Users</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_export_users_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bold select2-hidden-accessible" data-select2-id="select2-data-13-fpp1" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                            <option data-select2-id="select2-data-15-9abc"></option>
                                                            <option value="Administrator">Administrator</option>
                                                            <option value="Analyst">Analyst</option>
                                                            <option value="Developer">Developer</option>
                                                            <option value="Support">Support</option>
                                                            <option value="Trial">Trial</option>
                                                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-spqd" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-role-qs-container" aria-controls="select2-role-qs-container"><span class="select2-selection__rendered" id="select2-role-qs-container" role="textbox" aria-readonly="true" title="Select a role"><span class="select2-selection__placeholder">Select a role</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold select2-hidden-accessible" data-select2-id="select2-data-16-sgrt" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                            <option data-select2-id="select2-data-18-ukvi"></option>
                                                            <option value="excel">Excel</option>
                                                            <option value="pdf">PDF</option>
                                                            <option value="cvs">CVS</option>
                                                            <option value="zip">ZIP</option>
                                                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-q01f" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-format-77-container" aria-controls="select2-format-77-container"><span class="select2-selection__rendered" id="select2-format-77-container" role="textbox" aria-readonly="true" title="Select a format"><span class="select2-selection__placeholder">Select a format</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center">
                                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - New Card-->
                                <!--begin::Modal - Add task-->
                                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header" id="kt_modal_add_user_header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Add User</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" style="max-height: 449px;">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                                                            <!--end::Label-->
                                                            <!--begin::Image placeholder-->
                                                            <style>.image-input-placeholder { background-image: url('../../public/assets/media/svg/files/blank-image.svg'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('../../public/assets/media/svg/files/blank-image-dark.svg'); }</style>
                                                            <!--end::Image placeholder-->
                                                            <!--begin::Image input-->
                                                            <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                                <!--begin::Preview existing avatar-->
                                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(../../public/assets/media/avatars/300-6.jpg);"></div>
                                                                <!--end::Preview existing avatar-->
                                                                <!--begin::Label-->
                                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                                    <i class="ki-duotone ki-pencil fs-7">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <!--begin::Inputs-->
                                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                                    <input type="hidden" name="avatar_remove">
                                                                    <!--end::Inputs-->
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Cancel-->
                                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
																					<i class="ki-duotone ki-cross fs-2">
																						<span class="path1"></span>
																						<span class="path2"></span>
																					</i>
																				</span>
                                                                <!--end::Cancel-->
                                                                <!--begin::Remove-->
                                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
																					<i class="ki-duotone ki-cross fs-2">
																						<span class="path1"></span>
																						<span class="path2"></span>
																					</i>
																				</span>
                                                                <!--end::Remove-->
                                                            </div>
                                                            <!--end::Image input-->
                                                            <!--begin::Hint-->
                                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                            <!--end::Hint-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                                            <!--begin::Label-->
                                                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="Emma Smith">
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                                            <!--begin::Label-->
                                                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="smith@kpmg.com">
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                            <!--end::Label-->
                                                            <!--begin::Roles-->
                                                            <!--begin::Input row-->
                                                            <div class="d-flex fv-row">
                                                                <!--begin::Radio-->
                                                                <div class="form-check form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked="checked">
                                                                    <!--end::Input-->
                                                                    <!--begin::Label-->
                                                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                                        <div class="fw-bold text-gray-800">Administrator</div>
                                                                        <div class="text-gray-600">Best for business owners and company administrators</div>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Radio-->
                                                            </div>
                                                            <!--end::Input row-->
                                                            <div class="separator separator-dashed my-5"></div>
                                                            <!--begin::Input row-->
                                                            <div class="d-flex fv-row">
                                                                <!--begin::Radio-->
                                                                <div class="form-check form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1">
                                                                    <!--end::Input-->
                                                                    <!--begin::Label-->
                                                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                                        <div class="fw-bold text-gray-800">Developer</div>
                                                                        <div class="text-gray-600">Best for developers or people primarily using the API</div>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Radio-->
                                                            </div>
                                                            <!--end::Input row-->
                                                            <div class="separator separator-dashed my-5"></div>
                                                            <!--begin::Input row-->
                                                            <div class="d-flex fv-row">
                                                                <!--begin::Radio-->
                                                                <div class="form-check form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="2" id="kt_modal_update_role_option_2">
                                                                    <!--end::Input-->
                                                                    <!--begin::Label-->
                                                                    <label class="form-check-label" for="kt_modal_update_role_option_2">
                                                                        <div class="fw-bold text-gray-800">Analyst</div>
                                                                        <div class="text-gray-600">Best for people who need full access to analytics data, but don't need to update business settings</div>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Radio-->
                                                            </div>
                                                            <!--end::Input row-->
                                                            <div class="separator separator-dashed my-5"></div>
                                                            <!--begin::Input row-->
                                                            <div class="d-flex fv-row">
                                                                <!--begin::Radio-->
                                                                <div class="form-check form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="3" id="kt_modal_update_role_option_3">
                                                                    <!--end::Input-->
                                                                    <!--begin::Label-->
                                                                    <label class="form-check-label" for="kt_modal_update_role_option_3">
                                                                        <div class="fw-bold text-gray-800">Support</div>
                                                                        <div class="text-gray-600">Best for employees who regularly refund payments and respond to disputes</div>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Radio-->
                                                            </div>
                                                            <!--end::Input row-->
                                                            <div class="separator separator-dashed my-5"></div>
                                                            <!--begin::Input row-->
                                                            <div class="d-flex fv-row">
                                                                <!--begin::Radio-->
                                                                <div class="form-check form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="4" id="kt_modal_update_role_option_4">
                                                                    <!--end::Input-->
                                                                    <!--begin::Label-->
                                                                    <label class="form-check-label" for="kt_modal_update_role_option_4">
                                                                        <div class="fw-bold text-gray-800">Trial</div>
                                                                        <div class="text-gray-600">Best for people who need to preview content data, but don't need to make any updates</div>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Radio-->
                                                            </div>
                                                            <!--end::Input row-->
                                                            <!--end::Roles-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - Add task-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                                        <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0"><th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.890625px;">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1">
                                                </div>
                                            </th><th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 276.90625px;">
                                                Estado
                                            </th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 162.0625px;">
                                                Sólo Lectura
                                            </th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Last login: activate to sort column ascending" style="width: 162.0625px;">
                                                Nombre
                                            </th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Two-step: activate to sort column ascending" style="width: 162.0625px;">
                                                Ruta
                                            </th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Joined Date: activate to sort column ascending" style="width: 210.953125px;">
                                                Acceso de Invitado
                                            </th>
                                            <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 132.609375px;">
                                                Comentario
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-semibold">

                                        </tbody>
                                    </table></div>
                                 <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Content wrapper-->
                <!--end::Botones_accion-->
                <div style="margin-top: 100px;">
                    <button type="button" class="btn btn-light" id="Editar" data-bs-toggle="modal" data-bs-stacked-modal="#kt_modal_stacked_1">Editar</button>
                    <button type="button" class="btn btn-light" id="Suprimir" data-bs-toggle="modal" data-bs-target="#Modal_suprimir2">Suprimir</button>
                </div>
                <!--end::Botones_accion-->
                <!--begin::Modal_1-->
                <div>
                    <div class="modal bg-body fade" tabindex="-1" id="kt_modal_stacked_1">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content shadow-none">
                                <div class="modal-header">
                                    <h5 class="modal-title">Recurso compartido
                                        <script></script>
                                    </h5>
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <div class="Opciones_y_valores">
                                    <span class="Opciones_y_valores">Opción</span>
                                    <span class="Opciones_y_valores">Valor</span>
                                </div>
                                <!--begin::Botones_dentro_modal-->
                                <div style="margin-top: 480px">
                                    <button type="Button" class="btn btn-light" id="Boton_añadir" data-bs-stacked-modal="#kt_modal_stacked_2">Añadir</button>
                                    <button type="Button" class="btn btn-light" id="Boton_editar" data-bs-stacked-modal="#Modal_editar">Editar</button>
                                    <button type="Button" class="btn btn-light" id="Boton_suprimir" data-bs-stacked-modal="#Modal_suprimir">Suprimir</button>
                                </div>
                                <!--end::Botones_dentro_modal-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Modal_1-->
                <!--begin::Modal_2-->
                <div class="modal fade" tabindex="-1" id="kt_modal_stacked_2">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Yast2</h3>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>

                            <div class="modal-body">
                                <h6>Opcion seleccionada</h6>
                                <select class="form-select" data-control="select2" style="display: inline-block !important">
                                    <option></option>
                                    <script>
                                    </script>
                                </select>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Modal_2-->
                <!--begin::Modal_3-->
                <div class="modal fade" tabindex="-1" id="Modal_editar">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Yast2</h3>
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <div class="modal-body">
                                <h6>Opcion actual: <script></script></h6>
                                <script></script>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Modal_3-->
                <!--begin::Modal_4-->
                <div class="modal fade" tabindex="-1" id="Modal_suprimir">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Yast2</h3>
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <div class="modal-body">
                                <h6>¿Desea suprimir la opción seleccionada?</h6>
                                <script></script>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Modal_4-->
                <!--begin::Modal_5-->
                <div>
                    <div class="modal fade" tabindex="-1" id="Modal_suprimir2">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content shadow-none">
                                <div class="modal-header">
                                    <h5 class="modal-title">Yast2</h5>
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <div class="modal-body">
                                    <h6>Si suprime el recurso compartido <script></script>,
                                        se perderán todos sus ajustes.
                                        ¿Seguro de que desea suprimirlo?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-success">Si</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Modal_5-->
            <!--begin::Footer-->
            <div id="kt_app_footer" class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3 py-lg-6">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2023©</span>
                    <a href="https://rodriguezjulian.com" target="_blank" class="text-gray-800 text-hover-primary">Julian</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="https://rodriguezjulian.com" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://rodriguezjulian.com/" target="_blank" class="menu-link px-2">Purchase</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end:::Main-->
    </div>
    <!--end::Wrapper container-->
</div>

    <script>
        var samba_delete_get_web = '<?php echo $url_delete.'|id|'; ?>';
    </script>
