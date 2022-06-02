@extends('layouts.app')

@section('content')


@push('scripts')
<script src="/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
<script src="/metronic8/demo1/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="/m2/assets/js/custom/apps/user-management/users/list/table.js"></script>
<script src="/m2/assets/js/custom/apps/user-management/users/list/export-users.js"></script>
<script src="/m2/assets/js/custom/apps/user-management/users/list/add.js"></script>
<script src="/m2/assets/js/widgets.bundle.js"></script>
<script src="/m2/assets/js/custom/widgets.js"></script>
<script src="/m2/assets/js/custom/apps/chat/chat.js"></script>
<script src="/m2/assets/js/custom/intro.js"></script>
<script src="/m2/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="/m2/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="/m2/assets/js/custom/utilities/modals/users-search.js"></script>
@endpush
@endsection
