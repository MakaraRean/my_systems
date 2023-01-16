@extends('dashboard.index')

@section('header')
    <style>
        .container-row {
            margin-inline-start: 25%;
            /* background-color: red; */
            width: auto;

        }

        .container-kk {
            background-color: #f4f4f4;
            /* color: red; */
            height: 80%;
            margin-left: 15%;
            margin-right: 15%;
            padding: 30px;
            border-radius: 25px;
        }

        .helper-text {
            font-size: 10px;
        }
    </style>
@endsection

@section('content')
    <h2 class="mb-4 pl-lg-5">Add New Categories</h2>
    <div class="container-kk">
        <div class="panel">
            <div class="panel-body">
                <br>

                <!-- general -->
                <form action="/addCategory" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group  ">
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if (session('exists_message'))
                                    <div class="alert alert-danger">
                                        {{ session('exists_message') }}
                                    </div>
                                @endif
                                <label for="name" class="control-label">ឈ្មោះ/Name</label>
                                <input autocomplete="off" class="form-control"id="name" name="name" type="text"
                                    placeholder="ថ្នាំគ្រាប់, ថ្នាំទឹក...">
                                <span class="helper-text">ឈ្មោះប្រភេទថ្នាំ ឧទាហរណ៍ ៖​ គ្រាប់, ទឹក, ម្សៅ, ចាក់, រាគ,
                                    រូស......</span>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="control-label">ពិពណ៌នា/Description</label>
                                <textarea placeholder="ផ្សេងៗ" autocomplete="off" class="form-control" id="description" name="description"
                                    style="resize:none;"></textarea>
                                <span class="helper-text">ផ្សេងៗ</span>

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('category') }}" class="btn btn-secondary">Cancel</a>
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
