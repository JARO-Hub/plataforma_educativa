<?php

?>

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <!--begin::Wrapper container-->
    <div class="app-container container-xxl d-flex flex-row flex-column-fluid">
        <!--begin::Main-->
        <!-- Configurar usuario FTP -->
        <h1>Configurar Usuario FTP</h1>
        <form method="post" action="/configurar-ftp">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>
            <input type="submit" value="Configurar Usuario">
        </form>

        <?php if (isset($message)): ?>
            <div class="message <?php echo $success ? 'success' : 'error'; ?>">
                <?php echo nl2br(htmlspecialchars($message)); ?>
            </div>
        <?php endif; ?>
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->

            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Content-->


            <!--end::Content wrapper-->
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
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end:::Main-->
    </div>
    <!--end::Wrapper container-->
</div>


