@extends('dashboard.index')

@section('content')
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center mb-4 justify-content-flex-end" style="position:absolute">
                <h1 class="h3 mb-0 text-gray-800">Categories</h1>
            </div>
            <div style="float:right;">
                <a href="{{ route('add_category') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Add</a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
        </div>
        <br>
        <hr>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length"><label>Show <select
                                            name="dataTable_length" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                            class="form-control form-control-sm" placeholder=""
                                            aria-controls="dataTable"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending" style="width: 30px;">
                                                ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 75px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 53px;">Description</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 31px;">Created Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 69px;">Updated Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $cat)
                                            <tr class="odd">
                                                <td class="sorting_1">{{ $cat->id }}</td>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->description }}</td>
                                                <td>{{ $cat->created_at }}</td>
                                                <td>{{ $cat->updated_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                    Showing {{ $first_row }} to {{ $last_row }} of {{ $number_of_category }} entries
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous" id="previous"><a
                                                href="{{ route('category', ['page' => $page_active - 1]) }}"
                                                aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a></li>
                                        <input type="hidden" id="current_page" value="{{ $page_active }}">
                                        <input type="hidden" id="all_page" value="{{ $all_page }}">
                                        @for ($i = 1; $i <= $all_page; $i++)
                                            <li id="page-{{ $i }}"
                                                class="paginate_button page-item
                                            @if ($i == $page_active) active @endif">
                                                <a href="{{ route('category', ['page' => $i]) }}"
                                                    aria-controls="dataTable" data-dt-idx="{{ $i }}"
                                                    tabindex="0" class="page-link">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="paginate_button page-item next" id="next"><a
                                                href="{{ route('category', ['page' => $page_active + 1]) }}"
                                                aria-controls="dataTable" data-dt-idx="7" tabindex="0"
                                                class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/category.js"></script>
    <script>
        // function previousOnClick() {
        //     var previous = document.getElementById('previous');
        //     var next = document.getElementById('next');
        //     var current_page = document.getElementById('current_page');
        //     if (current_page.value <= 1) {
        //         previous.setAttribute("class", "paginate_button page-item previous disabled");
        //     }
        // }

        // function nextOnClick() {
        //     var previous = document.getElementById('previous');
        //     var next = document.getElementById('next');
        //     var current_page = document.getElementById('current_page');
        //     if (current_page.value >= 1 && current_page.value > $all_page) {
        //         previous.setAttribute("class", "paginate_button page-item previous");
        //     } else
        //         previous.setAttribute("class", "paginate_button page-item next disabled");
        // }

        window.onload = function() {
            var previous = document.getElementById('previous');
            var next = document.getElementById('next');
            var current_page = document.getElementById('current_page');
            var all_page = document.getElementById('all_page');
            if (current_page.value <= 1) {
                previous.setAttribute("class", "paginate_button page-item previous disabled");
            }
            if (current_page.value == all_page.value) {
                next.setAttribute("class", "paginate_button page-item next disabled");
            }
        }
    </script>
@endsection
