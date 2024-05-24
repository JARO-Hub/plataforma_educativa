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
                                        'usuarios' => $_SERVER['REQUEST_URI']=== '/usuarios' ? 'here' : '',

                                ];
                                $url = [
                                        'inicio' => 'http://' . $_SERVER['HTTP_HOST'] . '/inicio',
                                        'recursos' => 'http://' . $_SERVER['HTTP_HOST'] . '/servicios',
                                        'identidad' => 'http://' . $_SERVER['HTTP_HOST'] . '/identidad',
                                        'usuarios' => 'http://' . $_SERVER['HTTP_HOST'] . '/usuarios',
                                ]

                            ?>
                            <div class="d-flex justify-content-between align-items-center menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                                <!--begin:Menu item-->
                                <div class="<?= $menu['inicio'] ?> menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
											<span class="menu-title"><a class="text-gray-700" href="<?= $url['inicio'] ?>">Inicio</a></span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                    <!--end:Menu link-->

                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="<?= $menu['recursos'] ?> menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-title"><a class="text-gray-700" href="<?= $url['recursos'] ?>">Recursos Compartidos</a></span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                    <!--end:Menu link-->

                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="<?= $menu['identidad'] ?> menu-item menu-lg-down-accordion me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-title"><a class="text-gray-700" href="<?= $url['identidad'] ?>">Identidad</a></span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                    <!--end:Menu link-->

                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="<?= $menu['usuarios'] ?> menu-item menu-lg-down-accordion me-lg-1">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-title"><a class="text-gray-700" href="<?= $url['usuarios'] ?>">Usuarios</a></span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                    <!--end:Menu link-->

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