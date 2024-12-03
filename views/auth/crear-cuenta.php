<?php
$css = [
    '/assets/plugins/custom/datatables/datatables.bundle.css'
];
$js=[
    "/assets/js/custom/apps/projects/list/list.js",
    "/assets/js/widgets.bundle.js",
    "/assets/js/custom/utilities/modals/create-project/type.js",
    "/assets/js/custom/utilities/modals/create-project/budget.js",
    "/assets/js/custom/utilities/modals/create-project/complete.js",
    "/assets/js/custom/utilities/modals/create-project/settings.js",
    "/assets/js/custom/utilities/modals/create-project/targets.js",
    "/assets/js/custom/utilities/modals/create-project/team.js",
    "/assets/js/custom/utilities/modals/create-project/main.js"

];
?>

<?php
include_once __DIR__ . "/../templates/alertas.php";
?>
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Multi-steps-->
    <div class="d-flex row flex-column flex-root justify-content-center" id="kt_app_root">
        <!--begin::Authentication - Multi-steps-->
        <div class="d-flex justify-content-center flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep center" id="kt_create_account_stepper" data-kt-stepper="true">
            <!--begin::Aside-->
            <div class="d-flex flex-column justify-content-center  ps-20">
                <!--begin::Wrapper-->
                <!--end::Illustration-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--begin::Aside-->

        <!--begin::Body-->
        <div class=" row  col-12 d-flex w-100 py-10">
            <!--begin::Content-->
            <div class="d-flex ">
                <!--begin::Wrapper-->
                <div class="card  p-10 p-lg-15 w-100">
                    <!--begin::Form-->
                    <!--begin::Nav-->
                    <div class="d-flex justify-content-center align-items-center gap-3 gap-lg-5">
                        <!--begin::Secondary button-->
                        <div class="m-0">
                            <a href="#" class="btn btn-flex btn-sm btn-color-gray-700 bg-body fw-bold px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">Registrate</a>
                        </div>
                        <!--end::Secondary button-->

                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <!-- begin: Modal Registro -->
            <div class="modal fade" id="kt_modal_create_project" tabindex="-1" style="display: none;" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-fullscreen p-9">
                    <!--begin::Modal content-->
                    <div class="modal-content modal-rounded">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2>Creacion del proyecto</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y m-5">
                            <!--begin::Stepper-->
                            <div class="stepper stepper-links d-flex flex-column first" id="kt_modal_create_project_stepper" data-kt-stepper="true">
                                <!--begin::Container-->
                                <div class="container">
                                    <!--begin::Nav-->
                                    <div class="stepper-nav justify-content-center py-2">
                                        <!--begin::Step 1-->
                                        <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                                            <h3 class="stepper-title">Project Type</h3>
                                        </div>
                                        <!--end::Step 1-->
                                        <!--begin::Step 2-->
                                        <div class="stepper-item me-5 me-md-15 pending" data-kt-stepper-element="nav">
                                            <h3 class="stepper-title">Registro</h3>
                                        </div>
                                        <!--end::Step 2-->
                                        <!--begin::Step 3-->
                                        <div class="stepper-item me-5 me-md-15 pending" data-kt-stepper-element="nav">
                                            <h3 class="stepper-title">Base de datos</h3>
                                        </div>
                                        <!--end::Step 3-->
                                        <!--begin::Step 4-->
                                        <div class="stepper-item me-5 me-md-15 pending" data-kt-stepper-element="nav">
                                            <h3 class="stepper-title">FTP</h3>
                                        </div>
                                        <!--end::Step 4-->
                                        <!--begin::Step 5-->
                                        <div class="stepper-item me-5 me-md-15 pending" data-kt-stepper-element="nav">
                                            <h3 class="stepper-title">Set First Target</h3>
                                        </div>
                                        <!--end::Step 5-->

                                    </div>
                                    <!--end::Nav-->
                                    <!--begin::Form-->
                                    <form class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_modal_create_project_form" method="post">
                                        <!--begin::Type-->
                                        <div class="current" data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-7 pb-lg-12">
                                                    <!--begin::Title-->
                                                    <h1 class="fw-bold text-dark">Project Type</h1>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fw-semibold fs-4">If you need more info, please check out
                                                        <a href="#" class="link-primary fw-bold">FAQ Page</a></div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-15 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid" data-kt-buttons="true" data-kt-initialized="1">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 mb-6 active">
                                                        <!--begin::Input-->
                                                        <input class="btn-check" type="radio" checked="checked" name="project_type" value="1">
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <span class="d-flex">
														<!--begin::Icon-->
														<i class="ki-duotone ki-profile-circle fs-3hx">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
                                                            <!--end::Icon-->
                                                            <!--begin::Info-->
														<span class="ms-4">
															<span class="fs-3 fw-bold text-gray-900 mb-2 d-block">Personal Project</span>
															<span class="fw-semibold fs-4 text-muted">If you need more info, please check it out</span>
														</span>
                                                            <!--end::Info-->
													</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <!-- cometita -->
                                                    <!--end::Option-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-lg btn-primary" data-kt-element="type-next">
                                                        <span class="indicator-label">Inicio</span>
                                                        <span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Type-->

                                        <!--begin::Budget-->
                                        <div data-kt-stepper-element="content" class="pending">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-10 pb-lg-12">
                                                    <!--begin::Title-->
                                                    <h1 class="fw-bold text-dark">Sesion</h1>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Heading-->

                                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                        <span class="required">Usuario</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Specify project name" data-bs-original-title="Specify project name" data-kt-initialized="1">
														<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="Ingrese el usuario"  name="settings_name">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>

                                                <!--CONTRASENA inicio-->
                                                <!--begin::Form-->


                                                    <!--begin::Input group-->
                                                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                                                        <!--begin::Wrapper-->
                                                        <div class="mb-1">
                                                            <!--begin::Label-->
                                                            <label class="form-label fw-semibold fs-6 mb-2 required">
                                                                Password
                                                            </label>
                                                            <!--end::Label-->

                                                            <!--begin::Input wrapper-->
                                                            <div class="position-relative mb-3">
                                                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off" />

                                                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                </span>
                                                            </div>
                                                            <!--end::Input wrapper-->

                                                            <!--begin::Meter-->
                                                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                                            </div>
                                                            <!--end::Meter-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Hint-->
                                                        <div class="text-muted">
                                                            Use 8 or more characters with a mix of letters, numbers & symbols.
                                                        </div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <!--end::Input group--->

                                                    <!--begin::Input group--->
                                                    <div class="fv-row mb-10">
                                                        <label class="form-label fw-semibold fs-6 mb-2 required">Confirmar Password</label>

                                                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm_password" autocomplete="off" />
                                                    </div>
                                                    <!--end::Input group--->
                                                <!--end::Form-->
                                                <!-- CONTRASENA FINAL-->


                                                <!--begin::Input group-->
                                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                        <span class="required">holaa</span>
                                                        <span class="ms-1" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="<div class='p-4 rounded bg-light'> <div class='d-flex flex-stack text-muted mb-4'> <i class=&quot;ki-duotone ki-bank fs-3 me-3&quot;><span class=&quot;path1&quot;></span><span class=&quot;path2&quot;></span></i> <div class='fw-bold'>INCBANK **** 1245 STATEMENT</div> </div> <div class='d-flex flex-stack fw-semibold text-gray-600'> <div>Amount</div> <div>Transaction</div> </div> <div class='separator separator-dashed my-2'></div> <div class='d-flex flex-stack text-dark fw-bold mb-2'> <div>USD345.00</div> <div>KEENTHEMES*</div> </div> <div class='d-flex flex-stack text-muted mb-2'> <div>USD75.00</div> <div>Hosting fee</div> </div> <div class='d-flex flex-stack text-muted'> <div>USD3,950.00</div> <div>Payrol</div> </div> </div>" data-kt-initialized="1">
														<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Dialer-->
                                                    <div class="position-relative w-lg-250px" id="kt_modal_create_project_budget_setup" data-kt-dialer="true" data-kt-dialer-min="50" data-kt-dialer-max="50000" data-kt-dialer-step="100" data-kt-dialer-prefix="$" data-kt-dialer-decimals="2">
                                                        <!--begin::Decrease control-->
                                                        <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                                            <i class="ki-duotone ki-minus-circle fs-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </button>
                                                        <!--end::Decrease control-->
                                                        <!--begin::Input control-->
                                                        <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Amount" name="budget_setup" readonly="readonly" value="$50">
                                                        <!--end::Input control-->
                                                        <!--begin::Increase control-->
                                                        <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                                            <i class="ki-duotone ki-plus-circle fs-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </button>
                                                        <!--end::Increase control-->
                                                    </div>
                                                    <!--end::Dialer-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                <!--end::Input group-->


                                                <!--begin::Actions-->
                                                <div class="d-flex flex-stack">
                                                    <button type="button" class="btn btn-lg btn-light me-3" data-kt-element="budget-previous">Atras</button>
                                                    <button type="button" class="btn btn-lg btn-primary" data-kt-element="budget-next">
                                                        <span class="indicator-label">Continuar</span>
                                                        <span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Budget-->

                                        <!--begin::Team  nombre de la base de datos-->
                                        <div data-kt-stepper-element="content" class="pending">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-12">
                                                    <!--begin::Title-->
                                                    <h1 class="fw-bold text-dark">Configuracion de la base de datos </h1>
                                                    <!--end::Title-->

                                                </div>
                                                <!--end::Heading-->

                                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                        <span class="required">Nombre de la base de datos </span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Specify project name" data-bs-original-title="Specify project name" data-kt-initialized="1">
														<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="Ingrese el nombre de la base de datos"  name="settings_name">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                        <span class="required">Nombre de usuario </span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Specify project name" data-bs-original-title="Specify project name" data-kt-initialized="1">
														<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="Ingrese el nombre del usuario"  name="settings_name">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>


                                                <!--CONTRASENA inicio-->
                                                <!--begin::Form-->


                                                    <!--begin::Input group-->
                                                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                                                        <!--begin::Wrapper-->
                                                        <div class="mb-1">
                                                            <!--begin::Label-->
                                                            <label class="form-label fw-semibold fs-6 mb-2 required">
                                                                Password
                                                            </label>
                                                            <!--end::Label-->

                                                            <!--begin::Input wrapper-->
                                                            <div class="position-relative mb-3">
                                                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off" />

                                                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                </span>
                                                            </div>
                                                            <!--end::Input wrapper-->

                                                            <!--begin::Meter-->
                                                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                                            </div>
                                                            <!--end::Meter-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Hint-->
                                                        <div class="text-muted">
                                                            Use 8 or more characters with a mix of letters, numbers & symbols.
                                                        </div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <!--end::Input group--->

                                                    <!--begin::Input group--->
                                                    <div class="fv-row mb-10">
                                                        <label class="form-label fw-semibold fs-6 mb-2 required">Confirmar Password</label>

                                                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm_password" autocomplete="off" />
                                                    </div>
                                                    <!--end::Input group--->
                                                <!--end::Form-->
                                                <!-- CONTRASENA FINAL-->



                                                <!--begin::Actions-->
                                                <div class="d-flex flex-stack">
                                                    <button type="button" class="btn btn-lg btn-light me-3" data-kt-element="team-previous">Atras</button>
                                                    <button type="button" class="btn btn-lg btn-primary" data-kt-element="team-next">
                                                        <span class="indicator-label">Continuar</span>
                                                        <span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Team-->
                                        <!--begin::Targets-->
                                        <div data-kt-stepper-element="content" class="pending">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-12">
                                                    <!--begin::Title-->
                                                    <h1 class="fw-bold text-dark">Configuracion del FTP</h1>
                                                    <!--end::Title-->

                                                </div>
                                                <!--end::Heading-->
                                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                        <span class="required">Usuario</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Specify project name" data-bs-original-title="Specify project name" data-kt-initialized="1">
														<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="Ingrese el usuario"  name="settings_name">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>

                                                <!--CONTRASENA inicio-->
                                                <!--begin::Form-->


                                                    <!--begin::Input group-->
                                                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                                                        <!--begin::Wrapper-->
                                                        <div class="mb-1">
                                                            <!--begin::Label-->
                                                            <label class="form-label fw-semibold fs-6 mb-2 required">
                                                                Password
                                                            </label>
                                                            <!--end::Label-->

                                                            <!--begin::Input wrapper-->
                                                            <div class="position-relative mb-3">
                                                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off" />

                                                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                </span>
                                                            </div>
                                                            <!--end::Input wrapper-->

                                                            <!--begin::Meter-->
                                                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                                            </div>
                                                            <!--end::Meter-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Hint-->
                                                        <div class="text-muted">
                                                            Use 8 or more characters with a mix of letters, numbers & symbols.
                                                        </div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <!--end::Input group--->

                                                    <!--begin::Input group--->
                                                    <div class="fv-row mb-10">
                                                        <label class="form-label fw-semibold fs-6 mb-2 required">Confirmar Password</label>

                                                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm_password" autocomplete="off" />
                                                    </div>
                                                    <!--end::Input group--->
                                                <!--end::Form-->
                                                <!-- CONTRASENA FINAL-->




                                                <!--begin::Actions-->
                                                <div class="d-flex flex-stack">
                                                    <button type="button" class="btn btn-lg btn-light me-3" data-kt-element="targets-previous">Atras</button>
                                                    <button type="button" class="btn btn-lg btn-primary" data-kt-element="targets-next">
                                                        <span class="indicator-label">Continuar</span>
                                                        <span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Targets-->

                                        <!--begin::Settings-->
                                        <div data-kt-stepper-element="content" class="pending">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-12">
                                                    <!--begin::Title-->
                                                    <h1 class="fw-bold text-dark">Registro de archivos</h1>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <!--   <div class="text-muted fw-semibold fs-4">If you need more info, please check
                                                           <a href="#" class="link-primary">Project Guidelines</a></div>-->
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-8">
                                                    <!--begin::Dropzone-->
                                                    <div class="dropzone dz-clickable" id="kt_modal_create_project_settings_logo">
                                                        <!--begin::Message-->
                                                        <div class="dz-message needsclick">
                                                            <!--begin::Icon-->
                                                            <i class="ki-duotone ki-file-up fs-3hx text-primary">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <!--end::Icon-->
                                                            <!--begin::Info-->
                                                            <div class="ms-4">
                                                                <h3 class="dfs-3 fw-bold text-gray-900 mb-1">Suelta los archivos aqui</h3>
                                                                <span class="fw-semibold fs-4 text-muted">Cargar hasta 10 archivos</span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                    </div>
                                                    <!--end::Dropzone-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                        <span class="required">Nombre del proyecto:</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Specify project name" data-bs-original-title="Specify project name" data-kt-initialized="1">
														<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="Ingrese el nombre del proyecto"  name="settings_name">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Descripcion</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <textarea class="form-control form-control-solid" rows="3" placeholder="Ingresar descripcion del proyecto" name="settings_description"></textarea>
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="fv-row mb-15 fv-plugins-icon-container">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Label-->
                                                        <!--end::Label-->
                                                        <!--begin::Checkboxes-->
                                                        <!--end::Checkboxes-->
                                                    </div>
                                                    <!--begin::Wrapper-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex flex-stack">
                                                    <button type="button" class="btn btn-lg btn-light me-3" data-kt-element="settings-previous">atras</button>
                                                    <button type="button" class="btn btn-lg btn-primary" data-kt-element="settings-next">
                                                        <span class="indicator-label">Siguiente</span>
                                                        <span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Settings-->

                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--begin::Container-->
                            </div>
                            <!--end::Stepper-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>



            <!--end::Footer-->
        </div>
        <!--end::Body-->
    </div>

</div>

<?php
include_once __DIR__ . "/../templates/wrapper.php";
?>

