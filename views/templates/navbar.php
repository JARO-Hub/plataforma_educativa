<?php

?>
<!--begin::Navbar-->
<div class="app-navbar">
    <!--begin::Notifications-->
    <div class="app-navbar-item ms-1">
        <!--begin::Menu- wrapper-->
        <div class="btn btn-icon btn-color-white btn-active-color-primary" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <i class="ki-duotone ki-graph-3 fs-1">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
            <!--begin::Heading-->
            <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('../../public/assets/media/misc/menu-header-bg.jpg')">
                <!--begin::Title-->
                <h3 class="text-white fw-semibold px-9 mt-10 mb-6">Notifications
                    <span class="fs-8 opacity-75 ps-3">24 reports</span></h3>
                <!--end::Title-->
                <!--begin::Tabs-->
                <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_1" aria-selected="false" tabindex="-1" role="tab">Alerts</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_2" aria-selected="true" role="tab">Updates</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_3" aria-selected="false" tabindex="-1" role="tab">Logs</a>
                    </li>
                </ul>
                <!--end::Tabs-->
            </div>
            <!--end::Heading-->
            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab panel-->
                <div class="tab-pane fade" id="kt_topbar_notifications_1" role="tabpanel">
                    <!--begin::Items-->
                    <div class="scroll-y mh-325px my-5 px-8">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-35px me-4">
                                    <span class="symbol-label bg-light-primary">
                                        <i class="ki-duotone ki-abstract-28 fs-2 text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="mb-0 me-2">
                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Alice</a>
                                    <div class="text-gray-400 fs-7">Phase 1 development</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">1 hr</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-35px me-4">
                                    <span class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-information fs-2 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="mb-0 me-2">
                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">HR Confidential</a>
                                    <div class="text-gray-400 fs-7">Confidential staff documents</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">2 hrs</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-35px me-4">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-briefcase fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="mb-0 me-2">
                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Company HR</a>
                                    <div class="text-gray-400 fs-7">Corporeate staff profiles</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">5 hrs</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-35px me-4">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-abstract-12 fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="mb-0 me-2">
                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Redux</a>
                                    <div class="text-gray-400 fs-7">New frontend admin theme</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">2 days</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-35px me-4">
                                    <span class="symbol-label bg-light-primary">
                                        <i class="ki-duotone ki-colors-square fs-2 text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="mb-0 me-2">
                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Breafing</a>
                                    <div class="text-gray-400 fs-7">Product launch status update</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">21 Jan</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-35px me-4">
                                    <span class="symbol-label bg-light-info">
                                        <i class="ki-duotone ki-picture fs-2 text-info"></i>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="mb-0 me-2">
                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Banner Assets</a>
                                    <div class="text-gray-400 fs-7">Collection of banner images</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">21 Jan</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-35px me-4">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-color-swatch fs-2 text-warning">
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
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="mb-0 me-2">
                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Icon Assets</a>
                                    <div class="text-gray-400 fs-7">Collection of SVG icons</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">20 March</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                    <!--begin::View more-->
                    <div class="py-3 text-center border-top">
                        <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">View All
                            <i class="ki-duotone ki-arrow-right fs-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i></a>
                    </div>
                    <!--end::View more-->
                </div>
                <!--end::Tab panel-->
                <!--begin::Tab panel-->
                <div class="tab-pane fade show active" id="kt_topbar_notifications_2" role="tabpanel">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column px-9">
                        <!--begin::Section-->
                        <div class="pt-10 pb-0">
                            <!--begin::Title-->
                            <h3 class="text-dark text-center fw-bold">Get Pro Access</h3>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="text-center text-gray-600 fw-semibold pt-1">Outlines keep you honest. They stoping you from amazing poorly about drive</div>
                            <!--end::Text-->
                            <!--begin::Action-->
                            <div class="text-center mt-5 mb-9">
                                <a href="#" class="btn btn-sm btn-primary px-6" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade</a>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Illustration-->
                        <div class="text-center px-4">
                            <img class="mw-100 mh-200px" alt="image" src="assets/media/illustrations/sketchy-1/1.png">
                        </div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Tab panel-->
                <!--begin::Tab panel-->
                <div class="tab-pane fade" id="kt_topbar_notifications_3" role="tabpanel">
                    <!--begin::Items-->
                    <div class="scroll-y mh-325px my-5 px-8">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">New order</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">Just now</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">New customer</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">2 hrs</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Payment process</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">5 hrs</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Search query</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">2 days</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">API connection</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">1 week</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Database restore</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">Mar 5</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">System update</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">May 15</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Server OS update</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">Apr 3</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">API rollback</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">Jun 30</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Refund process</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">Jul 10</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Withdrawal process</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">Sep 10</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Code-->
                                <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                <!--end::Code-->
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Mail tasks</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light fs-8">Dec 10</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                    <!--begin::View more-->
                    <div class="py-3 text-center border-top">
                        <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">View All
                            <i class="ki-duotone ki-arrow-right fs-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i></a>
                    </div>
                    <!--end::View more-->
                </div>
                <!--end::Tab panel-->
            </div>
            <!--end::Tab content-->
        </div>
        <!--end::Menu-->
        <!--end::Menu wrapper-->
    </div>
    <!--end::Notifications-->
    <!--begin::Quick links-->
    <div class="app-navbar-item ms-1">
        <!--begin::Menu- wrapper-->
        <div class="btn btn-icon btn-color-white btn-active-color-primary" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <i class="ki-duotone ki-notification-status fs-1">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
            </i>
        </div>
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
            <!--begin::Heading-->
            <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background-image:url('../../public/assets/media/misc/menu-header-bg.jpg')">
                <!--begin::Title-->
                <h3 class="text-white fw-semibold mb-3">Quick Links</h3>
                <!--end::Title-->
                <!--begin::Status-->
                <span class="badge bg-primary text-inverse-primary py-2 px-3">25 pending tasks</span>
                <!--end::Status-->
            </div>
            <!--end::Heading-->
            <!--begin:Nav-->
            <div class="row g-0">
                <!--begin:Item-->
                <div class="col-6">
                    <a href="#" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                        <i class="ki-duotone ki-dollar fs-3x text-primary mb-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Accounting</span>
                        <span class="fs-7 text-gray-400">eCommerce</span>
                    </a>
                </div>
                <!--end:Item-->
                <!--begin:Item-->
                <div class="col-6">
                    <a href="#" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
                        <i class="ki-duotone ki-sms fs-3x text-primary mb-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Administration</span>
                        <span class="fs-7 text-gray-400">Console</span>
                    </a>
                </div>
                <!--end:Item-->
                <!--begin:Item-->
                <div class="col-6">
                    <a href="#" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
                        <i class="ki-duotone ki-abstract-41 fs-3x text-primary mb-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Projects</span>
                        <span class="fs-7 text-gray-400">Pending Tasks</span>
                    </a>
                </div>
                <!--end:Item-->
                <!--begin:Item-->
                <div class="col-6">
                    <a href="#" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
                        <i class="ki-duotone ki-briefcase fs-3x text-primary mb-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Customers</span>
                        <span class="fs-7 text-gray-400">Latest cases</span>
                    </a>
                </div>
                <!--end:Item-->
            </div>
            <!--end:Nav-->
            <!--begin::View more-->
            <div class="py-2 text-center border-top">
                <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">View All
                    <i class="ki-duotone ki-arrow-right fs-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i></a>
            </div>
            <!--end::View more-->
        </div>
        <!--end::Menu-->
        <!--end::Menu wrapper-->
    </div>
    <!--end::Quick links-->
    <!--begin::Chat-->
    <div class="app-navbar-item ms-1">
        <!--begin::Menu wrapper-->
        <div class="btn btn-icon btn-color-white btn-active-color-primary" id="kt_drawer_chat_toggle">
            <i class="ki-duotone ki-abstract-36 fs-1">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Chat-->
    <!--begin::User menu-->
    <div class="app-navbar-item ms-3 me-6" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <img class="symbol symbol-35px" src="../../public/assets/media/avatars/300-3.jpg" alt="user">
        </div>
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="../../public/assets/media/avatars/300-3.jpg">
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">Max Smith
                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5">My Profile</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5">
                    <span class="menu-text">My Projects</span>
                    <span class="menu-badge">
                        <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                    </span>
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                <a href="#" class="menu-link px-5">
                    <span class="menu-title">My Subscription</span>
                    <span class="menu-arrow"></span>
                </a>
                <!--begin::Menu sub-->
                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-5">Referrals</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-5">Billing</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-5">Payments</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link d-flex flex-stack px-5">Statements
                            <span class="ms-2 lh-0" data-bs-toggle="tooltip" aria-label="View your statements" data-bs-original-title="View your statements" data-kt-initialized="1">
                                <i class="ki-duotone ki-information-5 fs-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator my-2"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content px-3">
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications">
                                <span class="form-check-label text-muted fs-7">Notifications</span>
                            </label>
                        </div>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu sub-->
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5">My Statements</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                <a href="#" class="menu-link px-5">
                    <span class="menu-title position-relative">Mode
                    <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                        <i class="ki-duotone ki-night-day theme-light-show fs-2">
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
                        </i>
                        <i class="ki-duotone ki-moon theme-dark-show fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span></span>
                </a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2 active" data-kt-element="mode" data-kt-value="light">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-duotone ki-night-day fs-2">
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
                                </i>
                            </span>
                            <span class="menu-title">Light</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-duotone ki-moon fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dark</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-duotone ki-screen fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">System</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                <a href="#" class="menu-link px-5">
                    <span class="menu-title position-relative">Language
                    <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                    <img class="w-15px h-15px rounded-1 ms-2" src="../../public/assets/media/flags/united-states.svg" alt=""></span></span>
                </a>
                <!--begin::Menu sub-->
                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link d-flex px-5 active">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="../../public/assets/media/flags/united-states.svg" alt="">
                        </span>English</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link d-flex px-5">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="../../public/assets/media/flags/spain.svg" alt="">
                        </span>Spanish</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu sub-->
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5 my-1">
                <a href="#" class="menu-link px-5">Account Settings</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5">Sign Out</a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::User account menu-->
        <!--end::Menu wrapper-->
    </div>
    <!--end::User menu-->
    <!--begin::Primary button-->
    <a href="#" class="btn btn-flex btn-center btn-success btn-sm align-self-center p-3 px-lg-4 h-35px" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
        <i class="ki-duotone ki-plus-square fs-2 p-0 m-0">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
        </i>
        <span class="ms-2 d-none d-lg-block">Invite</span>
    </a>
    <!--end::Primary button-->
    <!--begin::Header menu toggle-->
    <!--end::Header menu toggle-->
</div>
<!--end::Navbar-->


