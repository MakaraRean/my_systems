@extends('dashboard.index')

@section('content')
    <div class="row" style="color: red; background-color:#00A0DFf">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-body">
                    <!-- barcode -->
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="text-center" style="padding: 15px 0; background: #f5f5f5;">
                                <img id="code_barcode"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE8AAAAoCAYAAAC/xadkAAAAAXNSR0IArs4c6QAAASZJREFUaEPtmtEWgjAMQ8f/f7Qe2KpZzEDl9fKijjlGTtu06bbW2qP1axvf98/9qvG6V2M6T+foPP1/rTeWPdZdPavG/Zn//vZ3qz3onnQ/q3dwfI51fbO1EOBlA5qABrzuYcnikwEB3gArhRHc1mK4h6cEEJZnRJdCEoQhlpVYPTGsAonlSdxSsBxMUpUfLA3wboAFeIA3l33FcqnEO7OWK0K4uk/Mu2GJgAd4b8dFVbFiepW5e0JKzBPdDz3PCmnE0DnEqFchSSFJdQGTPC/0UZRozgp/wAO87kLelSJVMe2M1uOo2+me0T2bQgYy/JcyO2wL28K2r6MH6g6esMK2sO2r+uesyoJgkOGR4ZHhP051oiSjJHO4MYmjEAaEAWFAGNqvfgK+oHAuzU8eRgAAAABJRU5ErkJggg==">
                                <h5 class="text-center no-margin-bottom" style="margin-top: 3px;">9278-0002</h5>
                            </div>
                        </div>
                    </div>
                    <!-- end barcode -->
                    <br>
                    <!-- general -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="org_code" class="control-label">លេខកូដ</label>


                                <input autocomplete="off" class="form-control" clear_top="" data-val="true"
                                    data-val-required="សូមបញ្ចូលទិន្នន័យ" id="org_code" name="org_code" type="text"
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
                                    <select type="hidden" id="category_id-editor" {render_kw}=""
                                        class="form-control select2-hidden-accessible" placeholder="" tabindex="-1"
                                        aria-hidden="true">
                                        <option value=""> </option>
                                    </select><span
                                        class="select2 select2-container select2-container--default select2-container--below"
                                        dir="ltr" style="width: 244px;"><span class="selection"><span
                                                class="select2-selection select2-selection--single" role="combobox"
                                                aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-labelledby="select2-category_id-editor-container"><span
                                                    class="select2-selection__rendered"
                                                    id="select2-category_id-editor-container"><span
                                                        class="select2-selection__placeholder"></span></span><span
                                                    class="select2-selection__arrow" role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <input type="hidden" name="category_id" id="category_id" value=""
                                        class="form-control" style="display:none;">
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {

                                        var sources = [{
                                            id: '',
                                            text: ' '
                                        }];
                                        var selected = '';


                                        $('#category_id-editor').select2({
                                                multiple: false,
                                                minimumInputLength: 0,
                                                maximumSelectionLength: 3,
                                                placeholder: '',
                                                data: sources,
                                                ajax: {
                                                    url: '/itemcategory/suggestion',
                                                    dataType: 'json',
                                                    delay: 250,
                                                    data: function(params) {
                                                        return {
                                                            term: params.term, // search term
                                                            page: params.page
                                                        };
                                                    },
                                                    processResults: function(data, params) {
                                                        var results = []
                                                        if (!data.results) {
                                                            results = [{
                                                                id: '-1',
                                                                text: 'No result found! <AddNew>'
                                                            }];
                                                        } else {
                                                            results = data.results;

                                                            results.unshift({
                                                                id: '__None',
                                                                text: 'ប្រភេទផលិតផល'
                                                            })

                                                        }

                                                        results.push({
                                                            id: '-1',
                                                            text: '- បន្ថែមថ្មី -'
                                                        });

                                                        return {
                                                            results: results
                                                        }
                                                    }
                                                }
                                            })
                                            .on('change', function(e) {
                                                var val = $(this).val();
                                                val = Array.isArray(val) ? val.join(";") : val;
                                                if (val && val.indexOf('-1') >= 0) {

                                                    $(this).val(null).trigger('change');

                                                    $(this).trigger('select2:addnew');
                                                }
                                                $("#category_id-wrap #category_id").val(val).change();
                                            })
                                            .on('select2:addnew', function(e) {
                                                //alert('new');
                                            });
                                        if (sources) {
                                            $('#category_id-editor').val(selected).trigger('change');
                                        }
                                        $("#category_id-wrap #category_id").val('');
                                    });
                                </script>

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="category_id"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group  ">

                                <label for="purchase_price" class="control-label">ថ្លៃដើម</label>


                                <input autocomplete="off" class="form-control" id="purchase_price" name="purchase_price"
                                    type="text" value="">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="purchase_price"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group  ">

                                <label for="sale_price" class="control-label">តម្លៃ</label>


                                <input autocomplete="off" class="form-control" data-val="true"
                                    data-val-required="សូមបញ្ចូលទិន្នន័យ" id="sale_price" name="sale_price"
                                    type="text" value="">

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="sale_price"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group  ">

                                <label for="description" class="control-label">ពិពណ៌នា</label>


                                <textarea autocomplete="off" class="form-control" id="description" name="description" style="resize:none;"></textarea>

                                <!---->

                                <span class="field-validation-valid" data-valmsg-for="description"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                    </div>

                    <!-- end general -->
                    <!-- pictures -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well no-margin-bottom">
                                <h5 class="text-center no-margin-top" style="color: #aaa;">
                                    Browse pictures to upload.
                                </h5>
                                <hr>
                                <div class="form-group  ">



                                    <style>
                                        .loader-btn {
                                            margin: 0 auto;
                                            position: relative;
                                            top: 2px;
                                            border: 2px solid #f3f3f3;
                                            border-radius: 50%;
                                            border-top: 2px solid #00A0DF;
                                            width: 15px;
                                            height: 15px;
                                            -webkit-animation: spin 2s linear infinite;
                                            animation: spin 2s linear infinite;
                                        }
                                    </style>
                                    <div class="form-group upload-wrap" id="ext__pictures-wrap">
                                        <input type="hidden" name="ext__pictures" id="ext__pictures" value=""
                                            class="form-control" style="display:none;">
                                        <div class="upload-input">
                                            <!--<a id="open-image-dialog">Upload Image</a>-->
                                            <button id="open-image-dialog" type="button" class="btn btn-default">
                                                <span class="glyphicon glyphicon-picture"
                                                    style="margin-right:5px;"></span>
                                                Browse...
                                            </button>

                                            <input type="file" name="file[]" multiple="" style="display:none;">
                                        </div>
                                        <!--<button class="btn btn-sm upload-btn" id="ext__pictures-add-file">Add</button>-->
                                        <div class="row image-gallery"></div>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            var valid_types = ["image/gif", "image/jpeg", "image/png"];

                                            // Load all images on edit page
                                            var ext__pictures = $("#ext__pictures").val();
                                            $("#ext__pictures").val(encodeURI(ext__pictures));


                                            if (ext__pictures) {
                                                ext__pictures = ext__pictures.split(";");
                                                for (var i = 0; i < ext__pictures.length; i++) {
                                                    var url = ext__pictures[i];
                                                    var filename = ext__pictures[i].substr(ext__pictures[i].indexOf("files/") + 6);
                                                    display_image(url = url, filename = filename, is_delete_on_cancel = false);
                                                }
                                            }

                                            // when cancel need to delete file
                                            $("[title='Cancel']").die("click").live("click", function(e) {
                                                //var delete_files = $(".image-gallery").find('.delete-file');
                                                var delete_files = $(".image-gallery").find("a[data-delete-on-cancel='true']");
                                                console.log(delete_files.length);
                                                if (delete_files.length > 0) {
                                                    for (var i = 0; i < delete_files.length; i++) {
                                                        $(delete_files[i]).click();
                                                    }
                                                }
                                            });

                                            // limit-multiple
                                            $("#ext__pictures-add-file").click(function() {
                                                $("#ext__pictures-wrap .upload-input").append(
                                                    '<input type="file" name="file[]" multiple />');
                                                return false;
                                            }).toggle('multiple' == 'multiple');

                                            var form = $('#ext__pictures').closest("form");
                                            var display_area = "";

                                            $("#ext__pictures-wrap  #open-image-dialog").click(function() {
                                                $(this).siblings("input:file").val("");
                                                $(this).siblings("input:file").click();
                                            });

                                            $("#ext__pictures-wrap #open-image-dialog").siblings("input:file").change(function() {
                                                display_area = $(this).parent().siblings(".image-gallery");
                                                submit_form();
                                            });

                                            // Delete image
                                            $(".delete-image").die("click").live("click", function(e) {
                                                e.preventDefault();
                                                var filename = $(this).attr("data-filename");
                                                var data_url = $(this).attr("data-url");
                                                var url = /delete_file/ + filename + '?url=' + data_url;

                                                var input_data = $("#ext__pictures").val().split(";");
                                                if (input_data.length > 0) {
                                                    for (var i = 0; i < input_data.length; i++) {
                                                        if (input_data[i].includes(encodeURI(filename))) {
                                                            input_data.splice(i, 1);
                                                            $("#ext__pictures").val(input_data.join(";"));
                                                        }
                                                    }
                                                }

                                                $(this).closest("figure").remove();
                                                $.ajax({
                                                    url: url,
                                                    type: 'GET',
                                                    data: '',
                                                    success: function(data) {
                                                        //$(this).remove();
                                                    },
                                                    async: false,
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false
                                                });
                                                //return False;
                                            });

                                            // Functions
                                            // Form submit function
                                            async function submit_form() {
                                                var formData = new FormData();
                                                $("#ext__pictures-wrap [name='file[]']").each(function() {
                                                    var files = $(this)[0].files
                                                    for (var i = 0; i < files.length; i++) {
                                                        if ($.inArray(files[i].type, valid_types) > 0) {
                                                            formData.append("file[]", files[i]);
                                                        }
                                                    }
                                                });
                                                $.ajax({
                                                    url: '/upload_file',
                                                    type: 'POST',
                                                    data: formData,
                                                    beforeSend: function(e) {
                                                        $('#open-image-dialog span').addClass('loader-btn');
                                                        $('#open-image-dialog span').removeClass('glyphicon-picture');
                                                    },
                                                    success: function(data) {
                                                        var url = JSON.parse(data).url;
                                                        var filename = JSON.parse(data).filename;
                                                        var files = JSON.parse(data).files;

                                                        if ("multiple" === "") {
                                                            $("#ext__pictures").val("");
                                                        }

                                                        $("#ext__pictures").val($.grep([$("#ext__pictures").val().trim(), url],
                                                            Boolean).join(";"));
                                                        //$("#ext__pictures").val(url);
                                                        //alert(url);

                                                        if (files.length > 0) {
                                                            for (var i = 0; i < files.length; i++) {
                                                                var url = files[i].url;
                                                                var filename = files[i].filename;
                                                                display_image(url = url, filename = filename);
                                                            }
                                                        }
                                                        $('#open-image-dialog span').removeClass('loader-btn');
                                                        $('#open-image-dialog span').addClass('glyphicon-picture');
                                                    },
                                                    async: true,
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false
                                                });
                                            }

                                            // Display image function
                                            function display_image(url, filename, is_delete_on_cancel = true) {
                                                var html = "<figure class='col-xs-6 col-sm-4 col-md-3'>" +
                                                    "<div class='dummy'></div>" +
                                                    "<div class='thumbnail'>" +
                                                    "<div class='image'>" +
                                                    "<img src='" + url + "' alt=''>" +
                                                    "<div class='image-modal'>" +
                                                    "<a data-ajax='false' data-url='" + url + "' data-filename='" + filename +
                                                    "' class='delete-image' data-delete-on-cancel='" + is_delete_on_cancel + "'>" +
                                                    "<i class='fa fa-trash fa-2x' style='font-family:FontAwesome !important;'></i>" +
                                                    "</a>" +
                                                    "</div>" +
                                                    "</div>" +
                                                    "</div>" +
                                                    "</figure>";

                                                //$("#ext__pictures-wrap > .image-gallery").append(html);
                                                var wrap = $("#ext__pictures-wrap > .image-gallery");
                                                if ("multiple" === "") {
                                                    wrap.html(html);
                                                } else {
                                                    wrap.append(html);
                                                }
                                            }
                                        });
                                    </script>


                                    <!---->

                                    <span class="field-validation-valid" data-valmsg-for="ext__pictures"
                                        data-valmsg-replace="true"></span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end pictures -->
                </div>
            </div>
        </div>
    </div>
@endsection
