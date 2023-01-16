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

            height: 80%;
            margin-left: 15%;
            margin-right: 15%;
            padding: 30px;
            border-radius: 25px;
        }

        .helper-text {
            font-size: 10px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
@endsection


@section('content')
    <h2 class="mb-4 pl-lg-5">New Order</h2>
    <div class="container-kk">
        <div class="panel">
            <div class="panel-body">
                <br>
                <!-- general -->
                <form action="{{ route('add_order') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 hideMeAfter5Seconds">
                            <div class="form-group">
                                @if (session('error_message'))
                                    <div class="alert alert-danger">
                                        {{ session('error_message') }}
                                    </div>
                                @endif
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="product" class="control-label">Product</label>
                            <input oninput="check_prodct()" autocomplete="off" class="form-control"id="product_id"
                                name="product_id" type="text" placeholder="Product ID">
                            <span id="result_message"></span>

                        </div>

                        <div class="col-md-1" id="loader" style="display: none">
                            <img src="{{ asset('img/loading-thinking.gif') }}" width="50px" style="margin-top: 50%">
                        </div>

                        <div class="col-md-4">
                            <label for="qty" class="control-label">Quantity</label>
                            <input autocomplete="off" class="form-control"id="qty" name="qty" type="number"
                                placeholder="Product Quantity (default: 1)">
                        </div>
                        <div class="col-md-2" style="text-align: center">
                            <button style="position:relative;
                            margin-top:25%;" type="submit"
                                class="btn btn-primary" id="bt_add" disabled="true">Add</button>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                    </tr>
                                    <tr>
                                        <td>Alfreds Futterkiste</td>
                                        <td>Maria Anders</td>
                                        <td>Germany</td>
                                        <td>Germany</td>
                                    </tr>
                                    <tr>
                                        <td>Centro comercial Moctezuma</td>
                                        <td>Francisco Chang</td>
                                        <td>Mexico</td>
                                        <td>Germany</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- end general -->
            </div>
            <div style="float: right">
                <b>Total</b>
                <input disabled="true" class="form-control" type="text" value="10000$">
            </div>
        </div>

    </div>



    <script>
        async function check_prodct() {
            let id = document.getElementById('product_id');
            var result_message = document.getElementById('result_message');
            var btAdd = document.getElementById('bt_add');
            var loader = document.getElementById('loader');

            // $.ajax({
            //     url: "{{ route('add_order') }}",
            //     data: {
            //         "product_id": id.value
            //     },
            //     type: 'post',
            //     success: function(result) {
            //         console.log(result)
            //     }
            // });

            const url = "https://laravel.reanmakara.xyz/api/check_product?product_id=" + id.value;
            // const url = "https://localhost:8000/api/check_product?product_id=" + id.value;
            loader.style.display = "block";
            const response = await fetch(url);
            loader.style.display = "none";
            // var data = await response.json();
            console.log(response);
            if (response.status == 200) {
                result_message.innerHTML = "This product is available.";
                result_message.style.color = "green";
                btAdd.disabled = false;
            } else {
                result_message.innerHTML = "This product is unavailable.";
                result_message.style.color = "red";
                btAdd.disabled = true;
            }
        }
    </script>
@endsection
