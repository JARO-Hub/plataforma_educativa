<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Educativa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/plugins/global/plugins.bundle.css">
    <link rel="stylesheet" href="/assets/css/style.bundle.css">

    <?php if (!empty($css)): ?>
        <?php foreach ($css as $stylesheet): ?>
            <link rel="stylesheet" href="<?php echo htmlspecialchars($stylesheet); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body id="kt-body" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true" data-kt-app-header-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default" data-kt-sticky-app-header-primary-sticky="on" data-kt-app-header-primary-sticky="on">
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header" style="height: auto;">
                <!--begin::Header primary-->
                <div class="app-header-primary" data-kt-sticky="true" data-kt-sticky-name="app-header-primary-sticky" data-kt-sticky-offset="{default: 'false', lg: '300px'}" style="animation-duration: 0.3s;">
                    <!--begin::Header primary container-->
                    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between">
                        <!--begin::Logo and search-->
                        <div class="d-flex flex-grow-1 flex-lg-grow-0">
                            <!--begin::Logo wrapper-->
                            <div class="d-flex align-items-center" id="kt_app_header_logo_wrapper">
                                <!--begin::Header toggle-->
                                <button class="d-lg-none btn btn-icon btn-color-white btn-active-color-primary ms-n4 me-sm-2" id="kt_app_header_menu_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                                <!--end::Header toggle-->
                                <!--begin::Logo-->
                                <a href="#" class="d-flex align-items-center mb-1 mb-lg-0 pt-lg-1">
                                    <img alt="Logo" src="assets/media/logos/default-small.svg" class="d-block d-sm-none">
                                    <img alt="Logo" src="assets/media/logos/default.svg" class="d-none d-sm-block">
                                </a>
                                <!--end::Logo-->
                            </div>
                            <!--end::Logo wrapper-->
                        </div>
                        <!--end::Logo and search-->
                        <?php
                        include  __DIR__ . '/templates/navbar.php';
                        ?>
                    </div>
                    <!--end::Header primary container-->
                </div>
                <!--end::Header primary-->

                <!--begin::Header secondary-->
                <div class="app-header-secondary">
                    <!--begin::Header secondary container-->
                    <div class="app-container container-xxl d-flex align-items-stretch ms-10 me-10 ">
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch flex-grow-1" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!--begin::Menu-->
                            <?php
                                $menu = [
                                        'inicio' => $_SERVER['REQUEST_URI']=== '/inicio' ? 'here' : '',
                                        'recursos' => $_SERVER['REQUEST_URI']=== '/servicios' ? 'here' : '',
                                        'identidad' => $_SERVER['REQUEST_URI']=== '/identidad' ? 'here' : '',
                                        'dominios_confianza' => $_SERVER['REQUEST_URI']=== '/dominios_confianza' ? 'here' : '',
                                        'configuracion_ldap' => $_SERVER['REQUEST_URI']=== '/configuracion_ldap' ? 'here' : '',
                                ];

                            ?>
                            <div class="d-flex justify-content-between align-items-center menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="<?= $menu['inicio'] ?> menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
											<span class="menu-title">Inicio</span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-600px" style="">
                                        <!--begin:Dashboards menu-->
                                        <div class="menu-state-bg menu-extended overflow-hidden overflow-lg-visible py-6" data-kt-menu-dismiss="true">
                                            <!--begin:Row-->
                                            <div class="row px-5">
                                                <!--begin:Col-->
                                                <div class="col-lg-6 py-1">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="#" class="menu-link">
																<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																	<i class="ki-duotone ki-basket text-primary fs-1">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																		<span class="path4"></span>
																	</i>
																</span>
                                                            <span class="d-flex flex-column">
																	<span class="d-flex align-items-center fs-6 fw-semibold text-gray-800">Default</span>
																	<span class="fs-7 fw-semibold text-muted">Reports &amp; statistics</span>
																</span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 py-1">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="#" class="menu-link">
																<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																	<i class="ki-duotone ki-abstract-44 text-info fs-1">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
                                                            <span class="d-flex flex-column">
																	<span class="d-flex align-items-center fs-6 fw-semibold text-gray-800">Projects
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
																	<span class="fs-7 fw-semibold text-muted">Tasts, graphs &amp; charts</span>
																</span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 py-1">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="#" class="menu-link">
																<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																	<i class="ki-duotone ki-element-11 text-danger fs-1">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																		<span class="path4"></span>
																	</i>
																</span>
                                                            <span class="d-flex flex-column">
																	<span class="d-flex align-items-center fs-6 fw-semibold text-gray-800">eCommerce
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
																	<span class="fs-7 fw-semibold text-muted">Sales reports</span>
																</span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 py-1">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="#" class="menu-link">
																<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																	<i class="ki-duotone ki-chart-simple text-dark fs-1">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																		<span class="path4"></span>
																	</i>
																</span>
                                                            <span class="d-flex flex-column">
																	<span class="d-flex align-items-center fs-6 fw-semibold text-gray-800">Marketing
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
																	<span class="fs-7 fw-semibold text-muted">Campaings &amp; conversions</span>
																</span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 py-1">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="#" class="menu-link">
																<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																	<i class="ki-duotone ki-abstract-39 text-success fs-1">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
                                                            <span class="d-flex flex-column">
																	<span class="d-flex align-items-center fs-6 fw-semibold text-gray-800">Social
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
																	<span class="fs-7 fw-semibold text-muted">Feeds &amp; Activities</span>
																</span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 py-1">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="#" class="menu-link">
																<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																	<i class="ki-duotone ki-switch text-warning fs-1">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
                                                            <span class="d-flex flex-column">
																	<span class="d-flex align-items-center fs-6 fw-semibold text-gray-800">Bidding
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
																	<span class="fs-7 fw-semibold text-muted">Deals &amp; stock exchange</span>
																</span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 py-1">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="#" class="menu-link">
																<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																	<i class="ki-duotone ki-color-swatch text-success fs-1">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																		<span class="path4"></span>
																		<span class="path5"></span>
																		<span class="path6"></span>
																		<span class="path7"></span>
																		<span class="path8"></span>
																		<span class="path9"></span>
																		<span class="path10"></span>
																		<span class="path11"></span>
																		<span class="path12"></span>
																		<span class="path13"></span>
																		<span class="path14"></span>
																		<span class="path15"></span>
																		<span class="path16"></span>
																		<span class="path17"></span>
																		<span class="path18"></span>
																		<span class="path19"></span>
																		<span class="path20"></span>
																		<span class="path21"></span>
																	</i>
																</span>
                                                            <span class="d-flex flex-column">
																	<span class="d-flex align-items-center fs-6 fw-semibold text-gray-800">Online Courses
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
																	<span class="fs-7 fw-semibold text-muted">Student progress</span>
																</span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 py-1">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="#" class="menu-link">
																<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																	<i class="ki-duotone ki-truck text-info fs-1">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																		<span class="path4"></span>
																		<span class="path5"></span>
																	</i>
																</span>
                                                            <span class="d-flex flex-column">
																	<span class="d-flex align-items-center fs-6 fw-semibold text-gray-800">Logistics
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
																	<span class="fs-7 fw-semibold text-muted">Shipments and delivery</span>
																</span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                            </div>
                                            <!--end:Row-->
                                        </div>
                                        <!--end:Dashboards menu-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="<?= $menu['recursos'] ?> menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
											<span class="menu-title">Recursos Compartidos</span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px" style="">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Overview</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Settings</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#" data-kt-page="pro">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Security
													<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#" data-kt-page="pro">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Activity
													<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#" data-kt-page="pro">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Billing
													<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#" data-kt-page="pro">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Statements
													<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#" data-kt-page="pro">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Referrals
													<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#" data-kt-page="pro">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">API Keys
													<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#" data-kt-page="pro">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Logs
													<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="<?= $menu['identidad'] ?> menu-item menu-lg-down-accordion me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
											<span class="menu-title">Identidad</span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px" style="">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">About</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Our Team</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">FAQ</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Contact Us</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Pricing</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Licenses</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                <span class="menu-title">Sitemap</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="<?= $menu['dominios_confianza'] ?> menu-item menu-lg-down-accordion me-lg-1">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
											<span class="menu-title">Dominios De Confianza</span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-lg-700px">
                                        <!--begin:Pages menu-->
                                        <div class="menu-state-bg p-4 p-lg-8">
                                            <!--begin:Row-->
                                            <div class="row">
                                                <!--begin:Col-->
                                                <div class="col-lg-4 mb-6 mb-lg-0">
                                                    <!--begin:Menu section-->
                                                    <div class="mb-0">
                                                        <!--begin:Menu heading-->
                                                        <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Login</h4>
                                                        <!--end:Menu heading-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
                                                                <span class="menu-title">Sign In Basic</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
                                                                <span class="menu-title">Sign Up Basic</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Sign Up Multi-steps
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
                                                                <span class="menu-title">Password Reset</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
                                                                <span class="menu-title">New Password</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Free Trial
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu section-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-4 mb-6 mb-lg-0">
                                                    <!--begin:Menu section-->
                                                    <div class="mb-0">
                                                        <!--begin:Menu heading-->
                                                        <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">General</h4>
                                                        <!--end:Menu heading-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Coming Soon
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Welcome Message
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Verify Email
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Password&nbsp;Confirmation
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Account Deactivation
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Error 404
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Error 500
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu section-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-4 mb-6 mb-lg-0">
                                                    <!--begin:Menu section-->
                                                    <div class="mb-0">
                                                        <!--begin:Menu heading-->
                                                        <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Email Templates</h4>
                                                        <!--end:Menu heading-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Verify Email
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Account Invitation
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Password Reset
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item p-0 m-0">
                                                            <!--begin:Menu link-->
                                                            <a href="#" class="menu-link">
																	<span class="menu-title">Password Changed
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu section-->
                                                </div>
                                                <!--end:Col-->
                                            </div>
                                            <!--end:Row-->
                                        </div>
                                        <!--end:Pages menu-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="<?= $menu['configuracion_ldap'] ?> menu-item  show menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
											<span class="menu-title">Configuracion LDAP</span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px">
                                        <!--begin:Menu item-->
                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
													<span class="menu-icon">
														<i class="ki-duotone ki-rocket fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</span>
													<span class="menu-title">Projects</span>
													<span class="menu-arrow"></span>
												</span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">My Projects</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">View Project
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Targets
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Budget
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Users
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Files
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Activity
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Settings
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
													<span class="menu-icon">
														<i class="ki-duotone ki-handcart fs-2"></i>
													</span>
													<span class="menu-title">eCommerce</span>
													<span class="menu-arrow"></span>
												</span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                <!--begin:Menu item-->
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                                    <!--begin:Menu link-->
                                                    <span class="menu-link">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Catalog</span>
															<span class="menu-arrow"></span>
														</span>
                                                    <!--end:Menu link-->
                                                    <!--begin:Menu sub-->
                                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Products</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Categories
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Add Product
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Edit Product
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Add Category
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Edit Category
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu sub-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion menu-sub-indention">
                                                    <!--begin:Menu link-->
                                                    <span class="menu-link">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Sales</span>
															<span class="menu-arrow"></span>
														</span>
                                                    <!--end:Menu link-->
                                                    <!--begin:Menu sub-->
                                                    <div class="menu-sub menu-sub-accordion">
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Orders Listing
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Order Details
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Add Order
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Edit Order
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu sub-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion menu-sub-indention">
                                                    <!--begin:Menu link-->
                                                    <span class="menu-link">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Customers</span>
															<span class="menu-arrow"></span>
														</span>
                                                    <!--end:Menu link-->
                                                    <!--begin:Menu sub-->
                                                    <div class="menu-sub menu-sub-accordion">
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Customers Listing</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Customers Details
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu sub-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion menu-sub-indention">
                                                    <!--begin:Menu link-->
                                                    <span class="menu-link">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Reports</span>
															<span class="menu-arrow"></span>
														</span>
                                                    <!--end:Menu link-->
                                                    <!--begin:Menu sub-->
                                                    <div class="menu-sub menu-sub-accordion">
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Products Viewed
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Sales
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Returns
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Customer Orders
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Shipping
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu sub-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Settings
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show menu-lg-down-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
													<span class="menu-icon">
														<i class="ki-duotone ki-shield-tick fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</span>
													<span class="menu-title">User Management</span>
													<span class="menu-arrow"></span>
												</span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                <!--begin:Menu item-->
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show menu-lg-down-accordion">
                                                    <!--begin:Menu link-->
                                                    <span class="menu-link">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Users</span>
															<span class="menu-arrow"></span>
														</span>
                                                    <!--end:Menu link-->
                                                    <!--begin:Menu sub-->
                                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link active" href="#">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Users List</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">View User
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu sub-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                                    <!--begin:Menu link-->
                                                    <span class="menu-link">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Roles</span>
															<span class="menu-arrow"></span>
														</span>
                                                    <!--end:Menu link-->
                                                    <!--begin:Menu sub-->
                                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">Roles List
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="#" data-kt-page="pro">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                                <span class="menu-title">View Roles
																	<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu sub-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Permissions
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
													<span class="menu-icon">
														<i class="ki-duotone ki-file-added fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</span>
													<span class="menu-title">File Manager</span>
													<span class="menu-arrow"></span>
												</span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Folders
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Files
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Blank Directory
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Settings
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
													<span class="menu-icon">
														<i class="ki-duotone ki-message-text-2 fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</span>
													<span class="menu-title">Chat</span>
													<span class="menu-arrow"></span>
												</span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Private Chat
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Group Chat
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="#" data-kt-page="pro">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                                        <span class="menu-title">Drawer Chat
															<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="#" data-kt-page="pro">
													<span class="menu-icon">
														<i class="ki-duotone ki-calendar-8 fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
															<span class="path4"></span>
															<span class="path5"></span>
															<span class="path6"></span>
														</i>
													</span>
                                                <span class="menu-title">Calendar
													<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Pro to get this" data-kt-initialized="1">Pro</span></span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::Header secondary container-->
                </div>
                <!--end::Header secondary-->


            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <?php
            include  __DIR__ . '/templates/wrapper.php';
            ?>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->




    <script src="/assets/plugins/global/plugins.bundle.js"></script>

    <script src="/assets/js/scripts.bundle.js"></script>
        <?php if (!empty($js)): ?>
            <?php foreach ($js as $script): ?>
                <script src="<?php echo htmlspecialchars($script); ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>



</body>
</html>