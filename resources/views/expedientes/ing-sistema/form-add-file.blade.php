		<!--begin::Modal - New Target-->
		<div class="modal fade modal_file" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
						<!--begin:Form-->
						<form id="kt_modal_new_target_form" class="form" action="#">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<!--begin::Title-->
								<h1 class="mb-3">Crear Archivo</h1>
								<!--end::Title-->
                                <!--begin::Description-->
                                <div class="text-muted fw-bold fs-5">Los campos con <span class="required"></span> son requerido
                                    .</div>
                                    <!--end::Description-->
							</div>
							<!--end::Heading-->
							<!--begin::Input group-->
							<div class="d-flex flex-column mb-8 fv-row">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Código:</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Es importante crear el código para su archivo."></i>
								</label>
								<!--end::Label-->
								<input type="text" class="form-control form-control-solid" placeholder="EIngrese el código" name="target_title" />
							</div>
							<!--end::Input group-->

                            <!--begin::Input group-->
							<div class="d-flex flex-column mb-8 fv-row">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Nombre:</span>

								</label>
								<!--end::Label-->
								<input type="text" class="form-control form-control-solid" placeholder="Ingrese un nombre" name="target_title" />
							</div>
							<!--end::Input group-->

							<!--begin::Input group-->
							<div class="d-flex flex-column mb-8">
								<label class="fs-6 fw-bold mb-2">Descripción:</label>
								<textarea class="form-control form-control-solid" rows="3" name="target_details" placeholder="Type Target Details"></textarea>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="d-flex flex-column mb-8 fv-row">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Cargar Archivo:</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Solo cargar archivo con extenciones PDF, DOC"></i>
								</label>
								<!--end::Label-->
								<input class="form-control form-control-solid" type="file" name="tags" />
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="reset" id="kt_modal_new_target_cancel" data-bs-dismiss="modal" class="btn btn-light btn-cancel-modal me-3">Cancel</button>
								<button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end:Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
<script>
            $('#kt_modal_new_target_submit).on('click',()=>{
                 console.log("hola");

             });
 </script>
