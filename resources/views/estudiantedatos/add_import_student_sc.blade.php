@extends('layouts.app')

@section('content')
    @if (session('mensaje'))
        <div class="alert alert-success">
            <strong>{{ session('mensaje') }}</strong>
        </div>
    @endif

    @can('isAdmin')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border-0 pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-2 h1 mb-1">Importar Estudiantes</span>

                                <span class="text-muted fw-semibold fs-7">Asegurese que el archivo sea formato Exel</span>
                            </h3>
                            <!--end::Title-->
                        </div>

                        <div class="card-body">
                            @if (isset($errors) && $errors->any())
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                            <form action="{{ route('studenimportsc.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control h-100" id="import_file" name="import_file">
                                    {{-- <label class="input-group-text" for="inputGroupFile02"> </label> --}}
                                    <button class="btn btn-primary btn-sm" id="btn_import_exel_student" type="submit">Importar</button>
                                </div>
                                {{-- <input type="file" name="import_file" /> --}}
                                {{-- <div class="text-center">
                              <button class="btn btn-primary" type="submit">Importar</button>
                          </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                var hostUrl = "/m2/assets/";
            </script>
            <script src="/m2/assets/plugins/global/plugins.bundle.js"></script>
            <script src="/m2/assets/js/scripts.bundle.js"></script>
            <!--end::Global Javascript Bundle-->
            <!--begin::Page Vendors Javascript(used by this page)-->
            <script src="/m2/assets/plugins/custom/datatables/datatables.bundle.js"></script>
            <!--end::Page Vendors Javascript-->
            <!--begin::Page Custom Javascript(used by this page)-->
            <script src="/m2/assets/js/custom/apps/user-management/users/list/table.js"></script>
            {{-- <script src="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.js"></script> --}}
            <script src="/m2/assets/js/custom/apps/user-management/users/list/add.js"></script>
            <script src="/m2/assets/js/widgets.bundle.js"></script>
            <script src="/m2/assets/js/custom/widgets.js"></script>
            <script src="/m2/assets/js/custom/apps/chat/chat.js"></script>
            <script src="/m2/assets/js/custom/intro.js"></script>
            <script>
                $('#btn_import_exel_student').on('click',(e)=>{
                    $('.loader').show();
                    console.log("Hola");
                });
            </script>
        @endpush
    @endcan
@endsection
