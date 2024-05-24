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
                        <!--begin::Search-->
                        <div class="d-flex align-items-center w-100 w-lg-225px pt-5 pt-lg-0">
                            <!--begin::Search-->
                            <div id="kt_header_search" class="header-search d-flex align-items-center w-100 w-lg-225px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start" data-kt-search="true">
                                <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
                                <form data-kt-search-element="form" class="w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                                    <!--begin::Hidden input(Added to disable form autocomplete)-->
                                    <input type="hidden">
                                    <!--end::Hidden input-->
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <!--end::Icon-->
                                    <!--begin::Input-->
                                    <input type="text" class="search-input form-control ps-13" name="search" value="" placeholder="Search..." data-kt-search-element="input">
                                    <!--end::Input-->
                                    <!--begin::Spinner-->
                                    <span class="search-spinner position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
											<span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
										</span>
                                    <!--end::Spinner-->
                                    <!--begin::Reset-->
                                    <span class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
											<i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</span>
                                    <!--end::Reset-->
                                </form>
                                <!--end::Form-->
                                <!--begin::Menu-->
                                <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown py-7 px-7 overflow-hidden w-300px w-md-350px" data-kt-menu="true">
                                    <!--begin::Wrapper-->
                                    <div data-kt-search-element="wrapper">
                                        <!--begin::Recently viewed-->
                                        <div data-kt-search-element="results" class="d-none">
                                            <!--begin::Items-->
                                            <div class="scroll-y mh-200px mh-lg-350px">
                                                <!--begin::Category title-->
                                                <h3 class="fs-5 text-muted m-0 pb-5" data-kt-search-element="category-title">Users</h3>
                                                <!--end::Category title-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
                                                        <img src="assets/media/avatars/300-6.jpg" alt="">
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">Karina Clark</span>
                                                        <span class="fs-7 fw-semibold text-muted">Marketing Manager</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
                                                        <img src="assets/media/avatars/300-2.jpg" alt="">
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">Olivia Bold</span>
                                                        <span class="fs-7 fw-semibold text-muted">Software Engineer</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
                                                        <img src="assets/media/avatars/300-9.jpg" alt="">
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">Ana Clark</span>
                                                        <span class="fs-7 fw-semibold text-muted">UI/UX Designer</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
                                                        <img src="assets/media/avatars/300-14.jpg" alt="">
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">Nick Pitola</span>
                                                        <span class="fs-7 fw-semibold text-muted">Art Director</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
                                                        <img src="assets/media/avatars/300-11.jpg" alt="">
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">Edward Kulnic</span>
                                                        <span class="fs-7 fw-semibold text-muted">System Administrator</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Category title-->
                                                <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">Customers</h3>
                                                <!--end::Category title-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/brand-logos/volicity-9.svg" alt="">
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">Company Rbranding</span>
                                                        <span class="fs-7 fw-semibold text-muted">UI Design</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/brand-logos/tvit.svg" alt="">
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">Company Re-branding</span>
                                                        <span class="fs-7 fw-semibold text-muted">Web Development</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/misc/infography.svg" alt="">
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">Business Analytics App</span>
                                                        <span class="fs-7 fw-semibold text-muted">Administration</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/brand-logos/leaf.svg" alt="">
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">EcoLeaf App Launch</span>
                                                        <span class="fs-7 fw-semibold text-muted">Marketing</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/brand-logos/tower.svg" alt="">
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                                        <span class="fs-6 fw-semibold">Tower Group Website</span>
                                                        <span class="fs-7 fw-semibold text-muted">Google Adwords</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Category title-->
                                                <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">Projects</h3>
                                                <!--end::Category title-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-notepad fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																	<span class="path5"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <span class="fs-6 fw-semibold">Si-Fi Project by AU Themes</span>
                                                        <span class="fs-7 fw-semibold text-muted">#45670</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-frame fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <span class="fs-6 fw-semibold">Shopix Mobile App Planning</span>
                                                        <span class="fs-7 fw-semibold text-muted">#45690</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-message-text-2 fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <span class="fs-6 fw-semibold">Finance Monitoring SAAS Discussion</span>
                                                        <span class="fs-7 fw-semibold text-muted">#21090</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-profile-circle fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <span class="fs-6 fw-semibold">Dashboard Analitics Launch</span>
                                                        <span class="fs-7 fw-semibold text-muted">#34560</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Recently viewed-->
                                        <!--begin::Recently viewed-->
                                        <div class="" data-kt-search-element="main">
                                            <!--begin::Heading-->
                                            <div class="d-flex flex-stack fw-semibold mb-4">
                                                <!--begin::Label-->
                                                <span class="text-muted fs-6 me-2">Recently Searched:</span>
                                                <!--end::Label-->
                                                <!--begin::Toolbar-->
                                                <div class="d-flex" data-kt-search-element="toolbar">
                                                    <!--begin::Preferences toggle-->
                                                    <div data-kt-search-element="preferences-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-2 data-bs-toggle=" title="Show search preferences">
                                                        <i class="ki-duotone ki-setting-2 fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Preferences toggle-->
                                                    <!--begin::Advanced search toggle-->
                                                    <div data-kt-search-element="advanced-options-form-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-n1" data-bs-toggle="tooltip" aria-label="Show more search options" data-bs-original-title="Show more search options" data-kt-initialized="1">
                                                        <i class="ki-duotone ki-down fs-2"></i>
                                                    </div>
                                                    <!--end::Advanced search toggle-->
                                                </div>
                                                <!--end::Toolbar-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Items-->
                                            <div class="scroll-y mh-200px mh-lg-325px">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-laptop fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">BoomApp by Keenthemes</a>
                                                        <span class="fs-7 text-muted fw-semibold">#45789</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-chart-simple fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Kept API Project Meeting</a>
                                                        <span class="fs-7 text-muted fw-semibold">#84050</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-chart fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"KPI Monitoring App Launch</a>
                                                        <span class="fs-7 text-muted fw-semibold">#84250</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-chart-line-down fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Project Reference FAQ</a>
                                                        <span class="fs-7 text-muted fw-semibold">#67945</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-sms fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"FitPro App Development</a>
                                                        <span class="fs-7 text-muted fw-semibold">#84250</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-bank fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Shopix Mobile App</a>
                                                        <span class="fs-7 text-muted fw-semibold">#45690</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-chart-line-down fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Landing UI Design" Launch</a>
                                                        <span class="fs-7 text-muted fw-semibold">#24005</span>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Recently viewed-->
                                        <!--begin::Empty-->
                                        <div data-kt-search-element="empty" class="text-center d-none">
                                            <!--begin::Icon-->
                                            <div class="pt-10 pb-10">
                                                <i class="ki-duotone ki-search-list fs-4x opacity-50">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Message-->
                                            <div class="pb-15 fw-semibold">
                                                <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
                                                <div class="text-muted fs-7">Please try again with a different query</div>
                                            </div>
                                            <!--end::Message-->
                                        </div>
                                        <!--end::Empty-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Preferences-->
                                    <form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
                                        <!--begin::Heading-->
                                        <h3 class="fw-semibold text-dark mb-7">Advanced Search</h3>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" class="form-control form-control-sm form-control-solid" placeholder="Contains the word" name="query">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <!--begin::Radio group-->
                                            <div class="nav-group nav-group-fluid">
                                                <!--begin::Option-->
                                                <label>
                                                    <input type="radio" class="btn-check" name="type" value="has" checked="checked">
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">All</span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <label>
                                                    <input type="radio" class="btn-check" name="type" value="users">
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Users</span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <label>
                                                    <input type="radio" class="btn-check" name="type" value="orders">
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Orders</span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <label>
                                                    <input type="radio" class="btn-check" name="type" value="projects">
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Projects</span>
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Radio group-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" name="assignedto" class="form-control form-control-sm form-control-solid" placeholder="Assigned to" value="">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" name="collaborators" class="form-control form-control-sm form-control-solid" placeholder="Collaborators" value="">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <!--begin::Radio group-->
                                            <div class="nav-group nav-group-fluid">
                                                <!--begin::Option-->
                                                <label>
                                                    <input type="radio" class="btn-check" name="attachment" value="has" checked="checked">
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">Has attachment</span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <label>
                                                    <input type="radio" class="btn-check" name="attachment" value="any">
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Any</span>
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Radio group-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select name="timezone" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="date_period" class="form-select form-select-sm form-select-solid select2-hidden-accessible" data-select2-id="select2-data-1-5wgl" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                <option value="next" data-select2-id="select2-data-3-v3r7">Within the next</option>
                                                <option value="last">Within the last</option>
                                                <option value="between">Between</option>
                                                <option value="on">On</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-2-0mhv" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-timezone-30-container" aria-controls="select2-timezone-30-container"><span class="select2-selection__rendered" id="select2-timezone-30-container" role="textbox" aria-readonly="true" title="Within the next">Within the next</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <input type="number" name="date_number" class="form-control form-control-sm form-control-solid" placeholder="Lenght" value="">
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <select name="date_typer" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="Period" class="form-select form-select-sm form-select-solid select2-hidden-accessible" data-select2-id="select2-data-4-s7ll" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                    <option value="days" data-select2-id="select2-data-6-k9p4">Days</option>
                                                    <option value="weeks">Weeks</option>
                                                    <option value="months">Months</option>
                                                    <option value="years">Years</option>
                                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-5-aidf" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-date_typer-zj-container" aria-controls="select2-date_typer-zj-container"><span class="select2-selection__rendered" id="select2-date_typer-zj-container" role="textbox" aria-readonly="true" title="Days">Days</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="advanced-options-form-cancel">Cancel</button>
                                            <a href="#" class="btn btn-sm fw-bold btn-primary" data-kt-search-element="advanced-options-form-search">Search</a>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Preferences-->
                                    <!--begin::Preferences-->
                                    <form data-kt-search-element="preferences" class="pt-1 d-none">
                                        <!--begin::Heading-->
                                        <h3 class="fw-semibold text-dark mb-7">Search Preferences</h3>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="pb-4 border-bottom">
                                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Projects</span>
                                                <input class="form-check-input" type="checkbox" value="1" checked="checked">
                                            </label>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="py-4 border-bottom">
                                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Targets</span>
                                                <input class="form-check-input" type="checkbox" value="1" checked="checked">
                                            </label>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="py-4 border-bottom">
                                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Affiliate Programs</span>
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </label>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="py-4 border-bottom">
                                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Referrals</span>
                                                <input class="form-check-input" type="checkbox" value="1" checked="checked">
                                            </label>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="py-4 border-bottom">
                                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Users</span>
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </label>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end pt-7">
                                            <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="preferences-dismiss">Cancel</button>
                                            <button type="submit" class="btn btn-sm fw-bold btn-primary">Save Changes</button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Preferences-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Search-->
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