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
    <h2 class="mb-4 pl-lg-5">Add New Product</h2>
    <div class="container-kk">
        <div class="panel">
            <div class="panel-body">
                <br>

                <!-- general -->
                <form action="{{ route('add_product') }}" method="post">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-success">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="org_code" class="control-label">លេខកូដ</label>
                                <input autocomplete="off" class="form-control" id="code" name="code" type="text"
                                    value="">
                                <!---->
                                <span class="field-validation-valid" data-valmsg-for="org_code"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">

                                <label for="name" class="control-label">ឈ្មោះ</label>


                                <input autocomplete="off" class="form-control" data-val="true"
                                    data-val-required="សូមបញ្ចូលទិន្នន័យ" id="name" name="name" type="text"
                                    value="">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="name"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">

                                <label for="category_id" class="control-label">ប្រភេទផលិតផល</label>
                                <div class="form-group" id="category_id-wrap" %s="">
                                    <select type="hidden" id="category_id" name="category_id"
                                        class="form-control select2-hidden-accessible" placeholder="" tabindex="-1"
                                        aria-hidden="true">
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <!---->

                                <span class="helper-text">មិនមានក្នុងបញ្ជីរ? <a
                                        href="{{ route('add_category') }}">ថែមប្រភេទថ្មី</a></span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="purchase_price" class="control-label">ថ្លៃដើម</label>


                                <input autocomplete="off" class="form-control" id="purchase_price" name="purchase_price"
                                    type="number" value="">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="purchase_price"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group  ">

                                <label for="sale_price" class="control-label">តម្លៃ</label>


                                <input autocomplete="off" class="form-control" data-val="true"
                                    data-val-required="សូមបញ្ចូលទិន្នន័យ" id="sell_price" name="sell_price" type="number"
                                    value="">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="sale_price"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                        <div class="col-md-6" id="quantity-div">
                            <div class="form-group  ">

                                <label for="sale_price" class="control-label">ខ្នាត</label>


                                <input autocomplete="off" class="form-control" id="unit" name="unit" type="text"
                                    placeholder="ប្រអប់, កំប៉ុង...">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="sale_price"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>

                        <div class="col-md-6" id="quantity-div">
                            <div class="form-group  ">

                                <label for="sale_price" class="control-label">ចំនួន</label>


                                <input autocomplete="off" class="form-control" id="quantity" name="quantity"
                                    type="number" placeholder="គិតជាកំប៉ុង ឬ ប្រអប់...">

                                <!---->

                                <span class="helper-text" data-valmsg-for="sale_price" data-valmsg-replace="true">Base on
                                    unit</span>

                            </div>
                        </div>
                        <div class="col-md-6" id="quantity-div">
                            <div class="form-group  ">

                                <label for="sale_price" class="control-label">បន្ទះក្នុងមួយប្រអប់</label>


                                <input autocomplete="off" class="form-control" id="blister_per_base"
                                    name="blister_per_base" type="number" placeholder="ទទេរប្រសិនបើខ្នាតមិនមែនជាប្រអប់">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="sale_price"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="tablet_per_blister_div">
                                <div class="form-group  ">

                                    <label for="sale_price" class="control-label">គ្រាប់ក្នុងមួយបន្ទះ</label>


                                    <input autocomplete="off" class="form-control" id="tablet_per_blister"
                                        name="tablet_per_blister" type="number" value="">

                                    <!---->

                                    <span class="field-validation-valid" data-valmsg-for="sale_price"
                                        data-valmsg-replace="true"></span>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 mb-4" id="quantity-div" onclick="onRadioSelectedChanged()">
                            <div class="form-check">
                                <input id="sell_as_tablet" name="sell_as" type="radio" value="sell_as_tablet" checked>
                                <label for="sell_as_tablet" class="control-label">លក់រាយគិតគ្រាប់</label>
                            </div>



                            <div class="form-check">
                                <input id="sell_as_blister" name="sell_as" type="radio" value="sell_as_blister">
                                <label for="sell_as_blister" class="control-label">លក់រាយគិតប្រអប់</label>
                            </div>

                            <div class="form-check">
                                <input id="sell_as_other" name="sell_as" type="radio" value="sell_as_other">
                                <label for="sell_as_other" class="control-label">ផ្សេងៗ</label>
                            </div>
                        </div>



                        <div class="col-md-12" id="sell_as_other_div" style="display: none">
                            <div class="form-group">
                                <label for="sell_as_other" class="control-label">លក់រាយគិតជា ៖ </label>


                                <input autocomplete="on" class="form-control" id="sell_as_other_textbox"
                                    name="sell_as_other_textbox" type="text" placeholder="ឧទាហរណ៍ ៖ បំពង់, កែវ...">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="description"
                                    data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="control-label">ការពិពណ៌នា</label>


                                <textarea autocomplete="on" class="form-control" id="description" name="description" placeholder="Optional"></textarea>

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="description"
                                    data-valmsg-replace="true"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('product') }}" class="btn btn-secondary">Cancel</a>
                </form>

                <!-- end general -->
            </div>
        </div>

    </div>

    <script>
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
            onRadioSelectedChanged();
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

        function onRadioSelectedChanged() {
            var sell_as_blister = document.getElementById('sell_as_blister');
            var sell_as_tablet = document.getElementById('sell_as_tablet');
            var sell_as_other = document.getElementById('sell_as_other');

            var tablet_per_blister_div = document.getElementById('tablet_per_blister_div');
            var sell_as_other_div = document.getElementById('sell_as_other_div');
            if (sell_as_blister.checked) {
                tablet_per_blister_div.style = "display: None";
                sell_as_other_div.style = "display: None";
            } else if (sell_as_tablet.checked) {
                tablet_per_blister_div.style = "display: Block";
                sell_as_other_div.style = "display: none";
            } else if (sell_as_other.checked) {
                sell_as_other_div.style = "display: Block";
            }
        }
    </script>
@endsection
