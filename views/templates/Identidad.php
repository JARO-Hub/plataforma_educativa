<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identidad</title>
    <script>
        $(document).ready(function() {
            // Realizar la solicitud AJAX para obtener el grupo de trabajo
            $.ajax({
                url: '/identidad/workgroup', // Asegúrate de que la URL coincida con tu ruta
                method: 'GET',
                success: function(response) {
                    if (response.workgroup) {
                        $('#workgroup-input').val(response.workgroup); // Establecer el valor del input
                    } else if (response.error) {
                        alert('Error: ' + response.error); // Mostrar mensaje de error si hay
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error al recuperar el grupo de trabajo: ' + error); // Manejo de errores
                }
            });

            // Manejar el evento de clic del botón Aplicar
            $('#BotonAplicar').click(function() {
                var workgroup = $('#workgroup-input').val();
                // Aquí puedes añadir la lógica para guardar el workgroup si es necesario
                alert('Grupo de trabajo actualizado a: ' + workgroup);
            });
        });
    </script>

</head>

<body>
        <div id=ConfiguraciónContenido>
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
                                                    Configuración Básica</h1>
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
                                                        <i class="text-gray-700 fw-bold lh-1">Nombre de grupo de trabajo o dominio</i>
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
                                                    
                                                    <!--begin::Card toolbar-->
                                                    <div class="card-toolbar">
                                                        
                                                    <!--begin::Identidad-->
                                                    <h2>Nombre de grupo de trabajo o dominio</h2>
                                                    <input type="text" id="workgroup-input" class="form-control" placeholder="" value="">
                                                        <button type="button" id=BotonAplicar class="btn btn-success">
                                                        Aplicar
                                                        </button>
                                                     <!--end::Identidad-->    
                                                    
                                                        
                                                    </div>
                                                    <!--end::Card toolbar-->
                                                </div>
                                            <!--end::Card header-->
                                           
                                        </div>
                                    <!--end::Card-->
                                </div>
                            <!--end::Content-->
                            </div>    
                        <!--end::Content wrapper-->
                       
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
        </div>
</body>

</html>

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar pt-lg-9 pt-6">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                        <!--begin::Toolbar wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column gap-3 me-3">
                                <!--begin::Title-->
                                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">
                                    Configuración Básica</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
            <!--end::Toolbar-->
           