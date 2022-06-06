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
                        <input type="hidden" name="url_add_file_ing_sistema" id="url_add_file_ing_sistema" value="{{route('expedientes.file.store')}}">
						<form  enctype="multipart/form-data" class="row g-3 needs-validation" id="form-file-expediente-ing-sistema" class="form" >
                            @csrf
                            <input type="hidden" class="form-control " id="id_estudiantes" name="id_estudiantes"  />
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
                                <select class="form-select rounded-start-0" data-control="select2"
                                data-placeholder="Seleccionar códigos" id="selet_code" name="code">
                                <option value="001-RAE">001-RAE</option>
                                <option value="002-CBG">002-CBG</option>
                                <option value="003-SAA">003-SAA</option>
                                <option value="004-ATG">004-ATG</option>
                                <option value="005-APP">005-APP</option>
                                <option value="006-CPP">006-CPP</option>
                                <option value="007-PCE">007-PCE</option>
                                <option value="008-CSC">008-CSC</option>
                                <option value="009-CSE">009-CSE</option>
                                <option value="010-RCE">010-RCE</option>
                                <option value="011-CIM">011-CIM</option>
                                <option value="012-TBC">012-TBC</option>
                                <option value="013-CCB">013-CCB</option>
                                <option value="014-CIU">014-CIU</option>
                            </select>
                            <div id="error-code" class="invalid-feedback">Campo es requerido.</div>
							</div>
							<!--end::Input group-->

                            <!--begin::Input group-->
							<div class="d-flex flex-column mb-8 fv-row">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Nombre:</span>

								</label>
								<!--end::Label-->
								<input type="text" class="form-control form-control-solid" id="name" name="name" placeholder="Ingrese un nombre"  />
							</div>
							<!--end::Input group-->

							<!--begin::Input group-->
							<div class="d-flex flex-column mb-8">
								<label class="fs-6 fw-bold mb-2">Descripción:</label>
								<textarea class="form-control form-control-solid" rows="3" id="description" name="description" placeholder="Type Target Details"></textarea>
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
								<input class="form-control form-control-solid" type="file" id="file" name="file" />
                                <div id="error-file" class="invalid-feedback">Campo es requerido.</div>
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="reset" id="kt_modal_new_target_cancel" data-bs-dismiss="modal" class="btn btn-light btn-cancel-modal me-3"> Cerrar</button>
								<button type="submit" id="btn_add_files_expedientes" class="btn btn-primary">
									<span class="indicator-label"><i id="btn_loader" class=""></i> Guardar</span>
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

