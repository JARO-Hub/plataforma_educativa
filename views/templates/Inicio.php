
    <!--begin::Inicio-->
        <div id=InicioContenido class="pt-lg-9 pt-6">
                <div class="app-container container-xxl d-flex flex-row flex-column-fluid">
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Configuración del servicio</h1>
                        <h5>Estado actual:<?php echo $estadoSamba;?></h5>
                        <h5>Después de escribir la configuración:</h5>
                        <div>
                        <select class="selector_de_barra">
                            <option value="opcion Parar">Parar</option>
                            <option value="opcion Reiniciar">Reiniciar</option>
                            <option value="opcion Recargar">Recargar</option>
                            <option value="opcion Mantener estado actual">Mantener estado actual</option>
                        </select>
                        </div>
                        <h5>Después de reiniciar</h5>
                        <div>
                            <select class="selector_de_barra">
                            <option value="opcion Iniciar durrante el arranque">Iniciar durrante el arranque</option>
                            <option value="opcion No iniciar el servicio">No iniciar el servicio</option>
                            </select>
                        </div>
                        <div>
                            <button type="button" class="Botones_accion btn btn-success" id="Boton_ayuda" data-bs-toggle="modal" data-bs-target="#kt_modal_1">Ayuda</button>
                            <button type="button" class="Botones_accion btn btn-danger" id=Boton_cancelar>Cancelar</button> 
                            <button type="button" class="Botones_accion btn btn-primary" id=Boton_aceptar>Aceptar</button>  
                        </div>  
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
            </div>
        </div>
    <!--end::Inicio-->
    <!--begin::Modal Inicio-->
        <div class="modal fade" id="kt_modal_1" tabindex="-1" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ayuda</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <h1>Configuración del servicio</h1>
                        <h4>Estado actual</h4>
                        Muestra el estado actual del servicio.
                        <h4>Después de escribir la configuración</h4>
                        Permite el cambio del estado del servicio inmediatamente después de aceptar los cambios. Las opciones disponibles dependen del estado actual. La acción especial Mantener estado actual deja el estado del servicio intacto.
                        <h4>Después de reiniciar</h4>
                        Permite elegir si el servicio se debe iniciar automáticamente al reiniciar. Algunos servicios se podrían configurar a petición, lo que implica que el socket asociado se ejecutará y se iniciará el servicio en caso necesario. 
                        <h4>Configuración del cortafuegos</h4>
                        Active Puerto abierto en el cortafuegos para abrir el cortafuegos de forma que permita el acceso al servicio desde equipos remotos.
                        Pulse Detalles del cortafuegos para seleccionar las interfaces en las que desea abrir el puerto.
                        </br>
                        Esta opción está disponible sólo si el cortafuegos está habilitado.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
            </div>
    <!--end::Modal Inicio-->
