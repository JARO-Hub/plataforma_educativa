<?php
    foreach($alertas as $key => $mensajes):
        foreach($mensajes as $mensaje):
?>

    <!--begin::Alert-->
    <div class="alert alert-primary d-flex align-items-center p-5">
        <!--begin::Icon-->
        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
        <!--end::Icon-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column">
            <!--begin::Title-->
            <h4 class="mb-1 text-dark">Alerta</h4>
            <!--end::Title-->

            <!--begin::Content-->
            <span><?php echo $mensaje; ?></span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Alert-->
<?php
        endforeach;
    endforeach;
?>

