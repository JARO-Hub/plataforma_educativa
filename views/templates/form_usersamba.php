
<!--begin::Form-->
<div class="app-content pb-0 m-12" id="kt_modal_add_user">
<form id="kt_modal_add_user_form" method="POST" enctype="multipart/form-data"
      class="form fv-plugins-bootstrap5 fv-plugins-framework" action="<?php echo $action_form ?>">
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
                   placeholder="Nombre" value="<?php echo $user->getSambauser() ?? '' ?>">
            <!--end::Input-->
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>

        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7 fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Contraseña</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="password" name="smbpassword"
                   class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="*******" >
            <!--end::Input-->
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class=" fv-row mb-7 fv-plugins-icon-container">
            <!--begin::Label-->
            <!--begin::Input group-->
            <label class="required fw-semibold fs-6 mb-2">Contraseña Del Sistema Requerido</label>
            <div class="input-group">
                                                                                        <span class="input-group-text" id="basic-addon1">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                                                                              <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                                                                                            </svg>
                                                                                        </span>
                <input type="password" class="form-control" name="password" placeholder="" aria-label="Contraseña del sistema" aria-describedby="basic-addon1"/>
            </div>
            <!--end::Input-->
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <!--end::Input group-->

    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cancelar</button>
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
<script>
    var usersamba_update_get_web = '<?php echo $url_update.'|id|'; ?>';
    var usersamba_delete_get_web = '<?php echo $url_delete.'|id|'; ?>';
</script>