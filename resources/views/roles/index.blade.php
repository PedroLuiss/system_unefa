@extends('layouts.app')

@section('content')
    @push('css')
    <link rel="stylesheet" type="text/css"
        href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('m2/assets/plugins/global/plugins.bundle.css') }}">

    @endpush
@if (session('mensaje'))
<div class="alert alert-success">
    <strong>{{ session('mensaje') }}</strong>
</div>
@endif
<div >

    <div class="card">

        <!--begin::Card header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Lista De Roles Del Sistema</span>
                <span class="text-muted mt-1 fw-bold fs-7">Aqui se mostrara el listado de los Roles del sistema</span>
            </h3>
        </div>
        <div class="card-header border-0 pt-6">

            <!--begin::Card toolbar-->
            <div class="card-toolbar" data-select2-id="select2-data-133-a0zo">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base"
                    data-select2-id="select2-data-132-co2t">
                    <!--begin::Filter-->

                    <!--begin::Add user-->
                    @can('role_create')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                    rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                    fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Agregar Un Nuevo Roll
                    </a>
                    <!--end::Add user-->
                    @endcan
                </div>

            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead class="text-primary">
                            <th> ID </th>
                            <th> Nombre </th>
                            <th> Guard </th>
                            <th> Fecha de creación </th>
                            <th> Permisos </th>
                            <th class="text-right"> Acciones </th>
                          </thead>
                          <tbody>
                            @forelse ($roles as $role)
                            <tr>
                              <td>{{ $role->id }}</td>
                              <td>{{ $role->name }}</td>
                              <td>{{ $role->guard_name }}</td>
                              <td class="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                              <td>
                                @forelse ($role->permissions as $permission)
                                    <span class="badge badge-info">{{ $permission->name }}</span>
                                @empty
                                    <span class="badge badge-danger">No permission added</span>
                                @endforelse
                              </td>
                              <td class="td-actions text-right">
                                    <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="bi bi-three-dots fs-3"></i>
                                    </button>

                                <!--begin::Menu 3-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                    data-kt-menu="true">
                                    <!--begin::Heading-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                            Menú
                                        </div>
                                    </div>
                                    <!--end::Heading-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a  href="{{ route('roles.edit', $role->id) }}" class="menu-link px-3">
                                            Editar
                                        </a>
                                    </div>
                                    <!--end::Menu item-->


                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-1">

                                        @can('role_destroy')
                                        <a href="#" onclick=""
                                        data-id="{{ $role->id }}" class="menu-link px-3">
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                            @csrf
                                            @method('DELETE')
                                                <button class="btn w-100" type="submit" rel="tooltip">
                                                Eliminar
                                                </button>
                                            </form>
                                        </a>
                                        @endcan
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 3-->
                              {{-- @can('role_show')
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info"> <i
                                    class="material-icons">person</i> </a>
                              @endcan
                              @can('role_edit')
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success"> <i
                                    class="material-icons">edit</i> </a>
                              @endcan
                              @can('role_destroy')
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                                  onsubmit="return confirm('areYouSure')" style="display: inline-block;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" rel="tooltip" class="btn btn-danger">
                                    <i class="material-icons">close</i>
                                  </button>
                                </form>
                              @endcan --}}
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="2">Sin registros.</td>
                            </tr>
                            @endforelse
                          </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
        @include('servicio-comunitario.cargar_file_faseone')
    </div>
</div>
@push('scripts')
<script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="/m2/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script src="{{ asset('js/axios.min.js') }}"></script>
<script>
            $('#kt_table_users').dataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                "order": [
                    [1, 'asc']
                ],
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
</script>
@endpush
@endsection
