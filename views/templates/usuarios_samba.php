<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Samba</title>
   
</head>
<body>
    <div id=UsuarioContenido> 
      <!--begin::Wrapper container-->
        <div class="app-container container-xxl d-flex flex-row flex-column-fluid">
                <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <!--begin::Content wrapper-->
                            <div class="d-flex flex-column flex-column-fluid">
                            <!--begin::Toolbar-->
                                <div id="kt_app_toolbar" class="app-toolbar pt-lg-9 pt-6">
                                    <!--begin::Toolbar container-->
                                    <div id="kt_app_toolbar_container"
                                        class="app-container container-fluid d-flex flex-stack flex-wrap">
                                        <!--begin::Toolbar wrapper-->
                                        <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                                            <!--begin::Page title-->
                                            <div class="page-title d-flex flex-column gap-3 me-3">
                                                <!--begin::Title-->
                                                <h1
                                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">
                                                    Lista de usuarios Samba</h1>
                                                <!--end::Title-->
                                                <!--begin::Breadcrumb-->
                                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                                    <!--begin::Item-->
                                                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                                        <a href="#" class="text-gray-500">
                                                            <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                                        </a>
                                                    </li>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <li class="breadcrumb-item">
                                                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                                    </li>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <li class="breadcrumb-item">
                                                        <i class="text-gray-700 fw-bold lh-1">Administracion de recursos</i>
                                                    </li>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <li class="breadcrumb-item">
                                                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                                    </li>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <!--< <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Users</li>-->
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <!--<li class="breadcrumb-item">
                                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                                        </li>-->
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <!--  <li class="breadcrumb-item text-gray-500">Users List</li>-->
                                                    <!--end::Item-->
                                                </ul>
                                                <!--end::Breadcrumb-->
                                            </div>
                                            <!--end::Page title-->
                                            <!--begin::Actions-->
                                            <div class="d-flex align-items-center gap-3 gap-lg-5">
                                                <!--begin::Secondary button-->
                                                <!-- <div class="m-0">
                                                    <a href="#" class="btn btn-flex btn-sm btn-color-gray-700 bg-body fw-bold px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">New Project</a>
                                                    </div>-->
                                                <!--end::Secondary button-->
                                                <!--begin::Primary button-->
                                                <!--<a href="#" class="btn btn-flex btn-center btn-dark btn-sm px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Reports</a>-->
                                                <!--end::Primary button-->
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Toolbar wrapper-->
                                    </div>
                                    <!--end::Toolbar container-->
                                </div>
                            <!--end::Toolbar-->
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
                                                            <input type="text" data-kt-user-table-filter="search"
                                                                class="form-control form-control-solid w-250px ps-13"
                                                                placeholder="Buscar carpeta">
                                                        </div>
                                                        <!--end::Search-->
                                                    </div>
                                                    <!--end::Card title-->
                                                    <!--begin::Card toolbar-->
                                                    <div class="card-toolbar">
                                                        <!--begin::Toolbar-->
                                                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                            <!--begin::Filter-->

                                                            <!--<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                                <i class="ki-duotone ki-filter fs-2">
                                                                                    <span class="path1"></span>
                                                                                    <span class="path2"></span>
                                                                                </i>Filter</button>-->
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
                                                                        <select
                                                                            class="form-select form-select-solid fw-bold select2-hidden-accessible"
                                                                            data-kt-select2="true" data-placeholder="Select option"
                                                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                                                            data-hide-search="true" data-select2-id="select2-data-7-ix4b"
                                                                            tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                            <option data-select2-id="select2-data-9-7l0i"></option>
                                                                            <option value="Administrator">Administrator</option>
                                                                            <option value="Analyst">Analyst</option>
                                                                            <option value="Developer">Developer</option>
                                                                            <option value="Support">Support</option>
                                                                            <option value="Trial">Trial</option>
                                                                        </select>
                                                                        <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-mcc1"
                                                                            style="width: 100%;">
                                                                            <span class="selection">
                                                                                <span
                                                                                    class="select2-selection select2-selection--single form-select form-select-solid fw-bold"
                                                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                                                    tabindex="0" aria-disabled="false"
                                                                                    aria-labelledby="select2-ha6c-container"
                                                                                    aria-controls="select2-ha6c-container">
                                                                                    <span
                                                                                        class="select2-selection__rendered"
                                                                                        id="select2-ha6c-container" role="textbox"
                                                                                        aria-readonly="true" title="Select option">
                                                                                        <span
                                                                                            class="select2-selection__placeholder">Select option
                                                                                            <span
                                                                                                class="select2-selection__arrow" role="presentation">
                                                                                                <b role="presentation"></b>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                <span
                                                                                class="dropdown-wrapper" aria-hidden="true">
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="mb-10">
                                                                        <label class="form-label fs-6 fw-semibold">Two Step
                                                                        Verification:</label>
                                                                            <select
                                                                                class="form-select form-select-solid fw-bold select2-hidden-accessible"
                                                                                data-kt-select2="true" data-placeholder="Select option"
                                                                                data-allow-clear="true" data-kt-user-table-filter="two-step"
                                                                                data-hide-search="true" data-select2-id="select2-data-10-56wy"
                                                                                tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                                <option data-select2-id="select2-data-12-tb0i"></option>
                                                                                <option value="Enabled">Enabled</option>
                                                                            </select>
                                                                            <span
                                                                            class="select2 select2-container select2-container--bootstrap5"
                                                                            dir="ltr" data-select2-id="select2-data-11-gr6i"
                                                                            style="width: 100%;">
                                                                            <span class="selection">
                                                                                <span
                                                                                    class="select2-selection select2-selection--single form-select form-select-solid fw-bold"
                                                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                                                    tabindex="0" aria-disabled="false"
                                                                                    aria-labelledby="select2-jqdt-container"
                                                                                    aria-controls="select2-jqdt-container"><span
                                                                                        class="select2-selection__rendered"
                                                                                        id="select2-jqdt-container" role="textbox"
                                                                                        aria-readonly="true" title="Select option"><span
                                                                                            class="select2-selection__placeholder">Select
                                                                                            option</span></span><span
                                                                                        class="select2-selection__arrow" role="presentation"><b
                                                                                            role="presentation"></b></span></span></span><span
                                                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Actions-->
                                                                    <div class="d-flex justify-content-end">
                                                                        <button type="reset"
                                                                            class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                                            data-kt-menu-dismiss="true"
                                                                            data-kt-user-table-filter="reset">Reset</button>
                                                                        <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                                            data-kt-menu-dismiss="true"
                                                                            data-kt-user-table-filter="filter">Apply</button>
                                                                    </div>
                                                                    <!--end::Actions-->
                                                                </div>
                                                                <!--end::Content-->
                                                            </div>
                                                            <!--end::Menu 1-->

                                                            <!--end::Filter-->
                                                            <!--begin::Export-->

                                                            <!--<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                                                                        <i class="ki-duotone ki-exit-up fs-2">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>Export</button>-->

                                                            <!--end::Export-->
                                                            <!--begin::Add user-->
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#AñadirUsuarioSamba">
                                                                <i class="ki-duotone ki-plus fs-2"></i>Añadir usuario Samba</button>
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                                data-bs-target="#EliminarUsuarioSamba">
                                                                <i class="ki-duotone ki-plus fs-2"></i>Eliminar usuario Samba</button>
                                                            <!--end::Add user-->
                                                        </div>
                                                        <!--end::Toolbar-->
                                                        
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
                                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                            data-kt-users-modal-action="close">
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
                                                                        <form id="kt_modal_export_users_form"
                                                                            class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-10">
                                                                                <!--begin::Label-->
                                                                                <label class="fs-6 fw-semibold form-label mb-2">Select
                                                                                    Roles:</label>
                                                                                <!--end::Label-->
                                                                                
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                                                                <!--begin::Label-->
                                                                                <label class="required fs-6 fw-semibold form-label mb-2">Select
                                                                                    Export Format:</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <select name="format" data-control="select2"
                                                                                    data-placeholder="Select a format" data-hide-search="true"
                                                                                    class="form-select form-select-solid fw-bold select2-hidden-accessible"
                                                                                    data-select2-id="select2-data-16-sgrt" tabindex="-1"
                                                                                    aria-hidden="true" data-kt-initialized="1">
                                                                                    <option data-select2-id="select2-data-18-ukvi"></option>
                                                                                    <option value="excel">Excel</option>
                                                                                    <option value="pdf">PDF</option>
                                                                                    <option value="cvs">CVS</option>
                                                                                    <option value="zip">ZIP</option>
                                                                                </select><span
                                                                                    class="select2 select2-container select2-container--bootstrap5"
                                                                                    dir="ltr" data-select2-id="select2-data-17-q01f"
                                                                                    style="width: 100%;"><span class="selection"><span
                                                                                            class="select2-selection select2-selection--single form-select form-select-solid fw-bold"
                                                                                            role="combobox" aria-haspopup="true"
                                                                                            aria-expanded="false" tabindex="0"
                                                                                            aria-disabled="false"
                                                                                            aria-labelledby="select2-format-77-container"
                                                                                            aria-controls="select2-format-77-container"><span
                                                                                                class="select2-selection__rendered"
                                                                                                id="select2-format-77-container" role="textbox"
                                                                                                aria-readonly="true"
                                                                                                title="Select a format"><span
                                                                                                    class="select2-selection__placeholder">Select
                                                                                                    a format</span></span><span
                                                                                                class="select2-selection__arrow"
                                                                                                role="presentation"><b
                                                                                                    role="presentation"></b></span></span></span><span
                                                                                        class="dropdown-wrapper"
                                                                                        aria-hidden="true"></span></span>
                                                                                <!--end::Input-->
                                                                                <div class="fv-plugins-message-container invalid-feedback">
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                            <!--begin::Actions-->
                                                                            <div class="text-center">
                                                                                <button type="reset" class="btn btn-light me-3"
                                                                                    data-kt-users-modal-action="cancel">Discard</button>
                                                                                <button type="submit" class="btn btn-primary"
                                                                                    data-kt-users-modal-action="submit">
                                                                                    <span class="indicator-label">Submit</span>
                                                                                    <span class="indicator-progress">Please wait...
                                                                                        <span
                                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                                                        
                                                    </div>
                                                    <!--end::Card toolbar-->
                                                </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                                <div class="card-body py-4">
                                                    <!--begin::Table-->
                                                    <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                        <div class="table-responsive">
                                                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                id="kt_table_users">
                                                                <thead>
                                                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                                                            aria-label="" style="width: 29.890625px;">
                                                                            <div
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                                                <input class="form-check-input" type="checkbox"
                                                                                    data-kt-check="true"
                                                                                    data-kt-check-target="#kt_table_users .form-check-input"
                                                                                    value="1">
                                                                            </div>
                                                                        </th>
                                                                        <th class="min-w-125px sorting" tabindex="0"
                                                                            aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                                            aria-label="User: activate to sort column ascending"
                                                                            style="width: 276.90625px;">
                                                                            Nombre
                                                                        </th>
                                                                        
                                                                       
                                                                        <th class="min-w-125px sorting" tabindex="0"
                                                                            aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                                            aria-label="Joined Date: activate to sort column ascending"
                                                                            style="width: 210.953125px;">
                                                                            Estado
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-gray-600 fw-semibold">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--end::Table-->
                                                </div>
                                            <!--end::Card body-->
                                        </div>
                                    <!--end::Card-->
                                </div>
                            <!--end::Content-->
                            </div>    
                        <!--end::Content wrapper-->
                        <!--begin::Modal 1-->
                            <div class="modal fade" tabindex="-1" id="AñadirUsuarioSamba">
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                                                <!--begin::Modal content-->
                                                                <div class="modal-content">
                                                                    <!--begin::Modal header-->
                                                                    <div class="modal-header" id="kt_modal_add_user_header">
                                                                        <!--begin::Modal title-->
                                                                        <h2 class="fw-bold">Nuevo usuario Samba</h2>
                                                                        <!--end::Modal title-->
                                                                        <!--begin::Close-->
                                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                            data-kt-users-modal-action="close">
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
                                                                        <form id="kt_modal_add_user_form"
                                                                            class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                                                            <!--begin::Scroll-->
                                                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                                                data-kt-scroll-max-height="auto"
                                                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                                                data-kt-scroll-offset="300px" style="max-height: 449px;">
                                                                                <!--begin::Input group-->

                                                                                <!--end::Input group-->
                                                                                <!--begin::Input group-->
                                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                                    <!--begin::Label-->
                                                                                    <label class="required fw-semibold fs-6 mb-2">Nombre del
                                                                                        usuario</label>
                                                                                    <!--end::Label-->
                                                                                    <!--begin::Input-->
                                                                                    <input type="text" name="user_name"
                                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                        placeholder="Nombre">
                                                                                    <!--end::Input-->
                                                                                    
                                                                                </div>
                                                                                <!--end::Input group-->
                                                                               
                                                                            </div>
                                                                            <!--end::Scroll-->
                                                                            <!--begin::Actions-->
                                                                            <div class="text-center pt-15">
                                                                                <button type="reset" class="btn btn-light me-3"
                                                                                data-bs-dismiss="modal">Cancelar</button>
                                                                                <button type="submit" class="btn btn-success"
                                                                                    data-kt-users-modal-action="submit">
                                                                                    <span class="indicator-label">Guardar</span>
                                                                                    <span class="indicator-progress">Por favor espere...
                                                                                        <span
                                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                            </div>
                        <!--end::Modal 1-->
                        <!--begin::Modal 2-->
                        <div class="modal fade" id="EliminarUsuarioSamba" tabindex="-1" aria-hidden="true">
                                                            <!--begin::Modal dialog-->
                                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                                <!--begin::Modal content-->
                                                                <div class="modal-content">
                                                                    <!--begin::Modal header-->
                                                                    <div class="modal-header" id="kt_modal_add_user_header">
                                                                        <!--begin::Modal title-->
                                                                        <h2 class="fw-bold">¿Seguro que quiere eliminar al usuario?</h2>
                                                                        <!--end::Modal title-->
                                                                        <!--begin::Close-->
                                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                            data-kt-users-modal-action="close">
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
                                                                        <form id="kt_modal_add_user_form"
                                                                            class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                                                            <!--begin::Scroll-->
                                                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                                                data-kt-scroll-max-height="auto"
                                                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                                                data-kt-scroll-offset="300px" style="max-height: 449px;">
                                                                            </div>
                                                                            <!--end::Scroll-->
                                                                            <!--begin::Actions-->
                                                                            <div class="text-center pt-15">
                                                                                <button type="reset" class="btn btn-light me-3"
                                                                                data-bs-dismiss="modal">Cancelar</button>
                                                                                <button type="submit" class="btn btn-primary"
                                                                                    data-kt-users-modal-action="submit">
                                                                                    <span class="indicator-label">Guardar</span>
                                                                                    <span class="indicator-progress">Por favor espere...
                                                                                        <span
                                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                        <!--end::Modal 2-->
                        <!--begin::Footer-->
                                <div id="kt_app_footer"
                                    class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3 py-lg-6">
                                    <!--begin::Copyright-->
                                    <div class="text-dark order-2 order-md-1">
                                        <span class="text-muted fw-semibold me-1">2023©</span>
                                        <a href="https://rodriguezjulian.com" target="_blank"
                                            class="text-gray-800 text-hover-primary">Julian</a>
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
</body>
</html>