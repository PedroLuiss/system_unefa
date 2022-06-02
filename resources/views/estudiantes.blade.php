@extends('layouts.app')

@section('content')
<div>
    <div class="table-responsive table-loading">
        <div class="table-loading-message">
         Loading...
        </div>

        <table class="table table-row-bordered gy-5">
         <thead>
          <tr class="fw-bolder fs-6 text-gray-800">
           <th>Name</th>
           <th>Position</th>
           <th>Office</th>
           <th>Age</th>
           <th>Start date</th>
           <th>Salary</th>
          </tr>
         </thead>
         <tbody>
          <tr>
           <td>Tiger Nixon</td>
           <td>System Architect</td>
           <td>Edinburgh</td>
           <td>61</td>
           <td>2011/04/25</td>
           <td>$320,800</td>
          </tr>
          <tr>
           <td>Garrett Winters</td>
           <td>Accountant</td>
           <td>Tokyo</td>
           <td>63</td>
           <td>2011/07/25</td>
           <td>$170,750</td>
          </tr>
         </tbody>
        </table>
       </div>
</div>
@endsection
