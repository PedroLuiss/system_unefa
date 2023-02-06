		<!--begin::Modal - New Target-->
		<div class="modal fade modal_file" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-danger" data-bs-dismiss="modal">
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
                        <input type="hidden" name="url_add_file_faseone" id="url_add_file_faseone" value="{{route('faseone.file.store')}}">
						<form  enctype="multipart/form-data" class="row g-3 needs-validation" id="form-file-faseone" class="form" >
                            @csrf
                            <input type="hidden" class="form-control " id="id_grupo_form_file" name="id_grupo"  />
                            <input type="hidden" class="form-control " id="id_fase" name="fase"  />
                            {{-- <input type="hidden" class="form-control " id="fase_act" name="fase_n"  /> --}}
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<!--begin::Title-->
								<h1 class="mb-3">Cargar Archivo</h1>
								<!--end::Title-->
                                <!--begin::Description-->
                                <div class="text-muted fw-bold fs-5">Los campos con <span class="required"></span> son requerido
                                    .</div>
                                    <!--end::Description-->
							</div>
							<!--end::Heading-->
                            <div class="row mb-4" id="list_files_fase_one">
                                {{-- <div class="col-md-12">
                                    <h5 class="text-muted text-center">Sin Archivo</h5>
                                </div>
                                <div class="col-md-6 ">
                                    <!--begin::Card-->
                                    <div class="card h-100 border">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                            <!--begin::Name-->
                                            <a href="/metronic8/demo1/../demo1/apps/file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                                                <!--begin::Image-->
                                                <div class="symbol symbol-60px mb-5">
                                                   <img src="/m2/assets/media/svg/files/doc.svg" class="theme-light-show" alt="">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Title-->
                                                <div class="fs-5 fw-bold mb-2"> CRM App Docs.. </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Name-->
                                            <!--begin::Description-->
                                            <div class="fs-7 fw-semibold text-gray-400">
                                                3 days ago                        </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div> --}}
                            </div>
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

