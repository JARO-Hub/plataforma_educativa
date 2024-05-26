<!--begin::Form-->
<div class="app-content pb-0 m-12" id="kt_modal_add_share">
    <form id="kt_modal_add_share_form" method="POST" enctype="multipart/form-data"
          class="form fv-plugins-bootstrap5 fv-plugins-framework" action="<?php echo $action_form ?>">
        <!--begin::Scroll-->
        <div class="d-flex flex-column scroll-y me-n7 pe-7"
             id="kt_modal_add_share_scroll" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}"
             data-kt-scroll-max-height="auto"
             data-kt-scroll-dependencies="#kt_modal_add_share_header"
             data-kt-scroll-wrappers="#kt_modal_add_share_scroll"
             data-kt-scroll-offset="300px" style="max-height: 449px;">

            <!--begin::Input group-->
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fw-semibold fs-6 mb-2">Nombre del recurso compartido</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="shareName" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre del recurso compartido" required>
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fw-semibold fs-6 mb-2">Comentario del recurso compartido</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="shareComment" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Comentario del recurso compartido" required>
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fw-semibold fs-6 mb-2">Ruta del directorio a compartir</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="sharePath" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Ruta del directorio" required>
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Escribible</label>
                <select class="form-select form-select-solid" name="writable" required>
                    <option value="yes">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Visible</label>
                <select class="form-select form-select-solid" name="browseable" required>
                    <option value="yes">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Acceso de invitados</label>
                <select class="form-select form-select-solid" name="guestOk" required>
                    <option value="yes">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Máscara de creación</label>
                <select class="form-select form-select-solid" name="createMask" required>
                    <option value="0700">0700</option>
                    <option value="0755">0755</option>
                    <option value="0777">0777</option>
                </select>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Máscara de directorio</label>
                <select class="form-select form-select-solid" name="directoryMask" required>
                    <option value="0700">0700</option>
                    <option value="0755">0755</option>
                    <option value="0777">0777</option>
                </select>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Solo lectura</label>
                <select class="form-select form-select-solid" name="readOnly" required>
                    <option value="true">Sí</option>
                    <option value="false">No</option>
                </select>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class=" fv-row mb-7 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fw-semibold fs-6 mb-2">Contraseña del Sistema Requerida</label>
                <!--begin::Input group-->
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                        </svg>
                    </span>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña del sistema" aria-label="Contraseña del sistema" aria-describedby="basic-addon1" required/>
                </div>
                <!--end::Input-->
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Scroll-->

        <!--begin::Actions-->
        <div class="text-center pt-15">
            <a type="reset" href="<?php echo $cancel_url ?>" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cancelar</a>
            <button type="submit" class="btn btn-success" data-kt-users-modal-action="submit">
                <span class="indicator-label">Guardar</span>
                <span class="indicator-progress">Por favor espere...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
</div>
<!--end::Form-->

<script>
    // Aquí puedes agregar la inicialización de Select2 si es necesario
    $(document).ready(function() {
        $('.form-select').select2();
    });
</script>