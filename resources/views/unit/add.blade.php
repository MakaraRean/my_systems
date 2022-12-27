@extends('dashboard.index')

@section('header')
    <style>
        .container-row {
            margin-inline-start: 25%;
            background-color: red;
            width: auto;

        }

        .container-kk {
            background-color: #f4f4f4;
            color: red;
            height: 80%;
            margin-left: 15%;
            margin-right: 15%;
            padding: 30px;
            border-radius: 25px;
        }
    </style>
@endsection

@section('content')
    <h2 class="mb-4 pl-lg-5">Add New Unit</h2>
    <div class="container-kk">
        <div class="panel">
            <div class="panel-body">
                <br>

                <!-- general -->
                <form action="{{ route('add_unit') }}" method="post">
                    @csrf
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="org_code" class="control-label">ខ្នាត</label>
                                <input class="form-control" id="base_unit" name="base_unit" type="text"
                                    placeholder="ប្រអប់ កំប៉ុង...">
                                <!---->
                                <span class="helper-text">ប្រអប់/កំប៉ុង</span>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">

                                <label for="name" class="control-label">ចំនួនបន្ទះក្នុងមួយប្រអប់</label>


                                <input autocomplete="off" class="form-control" data-val="true"
                                    data-val-required="សូមបញ្ចូលទិន្នន័យ" id="blister" name="blister" type="number"
                                    value="">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="name"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">

                                <label for="name" class="control-label">ចំនួនគ្រាប់ក្នុងមួយបន្ទះ/កំប៉ុង</label>


                                <input autocomplete="off" class="form-control" data-val="true"
                                    data-val-required="សូមបញ្ចូលទិន្នន័យ" id="tablet" name="tablet" type="number"
                                    value="">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="name"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="" class="btn btn-secondary">Cancel</a>
                </form>

                <!-- end general -->
            </div>
        </div>

    </div>

    {{-- <script>
        function checkboxOnClick() {
            var quantity_div = document.getElementById('quantity-div');
            var checkbox_stock = document.getElementById('checkbox_stock');
            if (checkbox_stock.checked == true) {
                quantity_div.style = "display: Block";
            } else {
                quantity_div.style = 'display: None';
            }

        }

        window.onload = function() {
            var code = document.getElementById('code');
            let length = 5;
            const characters = 'abcdefghijklmnopqrstuvwxyz';
            let result = ' ';
            const charactersLength = characters.length;
            for (let i = 0; i < length; i++) {
                result +=
                    characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            code.value = result.toUpperCase();
        }
    </script> --}}
@endsection
