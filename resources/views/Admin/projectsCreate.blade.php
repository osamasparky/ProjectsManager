@extends('Admin.Layouts.Master')
@section('container')
    <div class="row heading-bg arabic-fonts">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">إنشاءمشروع جديد</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#"><span>Project</span></a></li>
                <li class="active"><span>New</span></li>
            </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>


    <div class="row arabic-fonts">
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">مدخلات المشروع</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form method="post" action="{{route('projects.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div id="example-basic">
                                <h3><span class="head-font capitalize-font">بيانات المشروع</span></h3>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">
                                                    اسم المشروع ( كما في العقد )
                                                </label>

                                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                    <input type="text" class="form-control"
                                                           placeholder="اسم المشروع" name="name" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">تصيف المشروع</label>
                                                <select class="form-control" name="sort">
                                                    <option>اختر التصنيف</option>
                                                    <option value="صناعي">حكومي</option>
                                                    <option value="سكني">تجاري</option>
                                                    <option value="سياحي او فندقي">افراد</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5">وصف المشروع</label>
                                                <textarea class="form-control" name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label mb-5">تاريخ بداية العقد</label>

                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-calendar-times"></i></span>
                                                    <input type="text" name="contract_starting" class="form-control" placeholder="" data-mask="99/99/9999" required>
                                                </div>
                                                <span class="text-muted">dd/mm/yyyy</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label mb-5">تاريخ نهاية العقد</label>

                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-calendar-times"></i></span>
                                                    <input type="text" name="contract_ending" class="form-control" placeholder="" data-mask="99/99/9999" required>
                                                </div>
                                                <span class="text-muted">dd/mm/yyyy</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label mb-5">المقاول</label>

                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                    <select name="contractor_id" class="form-control"
                                                            data-ajax--url="{{route('contractors.getEngineers')}}">
                                                        <option value="">اختار مقاول</option>
                                                        @foreach($contractors as $contractor)
                                                            <option value="{{$contractor->id}}">{{$contractor->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label mb-5">مالك المشروع</label>

                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                    <select name="owner_id" class="form-control"
                                                            data-ajax--url="{{route('owners.getEngineers')}}">
                                                        <option value="">اختار مالك</option>
                                                        @foreach($owners as $owner)
                                                            <option value="{{$owner->id}}">{{$owner->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row -->
                                    <div class="row mb-5">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label mb-5">رقم العقد بالنظام</label>

                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                    <input type="number" name="contract_no" class="form-control"
                                                           placeholder="رقم العقد بالنظام" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label mb-5">قيمه العقد </label>

                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                    <input type="number" name="contract_value" class="form-control"
                                                           placeholder="قيمه العقد" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label mb-5">مساحه المشروع</label>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <input type="text" name="distance" class="form-control"
                                                           placeholder="مساحه المشروع" required>
                                                </div>


                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label mb-5">المدينه</label>

                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                    <input type="text" name="city" class="form-control"
                                                           placeholder="المدينه" id="" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3><span class="head-font capitalize-font">طاقم hpl</span></h3>
                                <section>
                                    <div class="mb-20"></div>
                                    <div class="row" style="display: flex;">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-body">
                                                        <h6 class="txt-dark capitalize-font"><i
                                                                    class="fa fa-dot-circle-o"></i> طاقم الاستشاري</h6>
                                                        <hr class="light-grey-hr"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Row -->
                                            <div class="row mb-5">
                                                <div class="form-group">
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                </span>
                                                            <select class="form-control" name="engineer-consultant-role">
                                                                <option value="">اختار المهمة</option>
                                                                <option value="manager">مدير مشروع</option>
                                                                <option value="architect">مهندس معماري</option>
                                                                <option value="mechanical">مهندس ميكانيكا</option>
                                                                <option value="power">مهندس كهرباء</option>
                                                                <option value="quantum">مهندس كميات</option>
                                                                <option value="foreman">مراقب</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="input-group"><span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                            <select class="form-control" name="engineer-consultant-id">
                                                                <option value="">اختار مهندس</option>
                                                                @foreach($consultantEngineers as $consultantEngineer)
                                                                    <option value="{{$consultantEngineer->id}}">{{$consultantEngineer->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a class="btn btn-block btn-success" id="insert-row">
                                                            <i class="fa fa-plus-square-o"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-20">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-body">
                                                            <h6 class="txt-dark capitalize-font" style="margin-top: 15px;">
                                                                <i class="fa fa-dot-circle-o"></i> طاقم المقاول</h6>
                                                            <hr class="light-grey-hr"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Row -->
                                                <!-- Row -->
                                                <div class="row mb-5">
                                                    <div class="form-group">
                                                        <div class="col-md-5">
                                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                </span>
                                                                <select class="form-control" name="engineer-contractor-role">
                                                                    <option value="">اختار المهمة</option>
                                                                    <option value="manager">مدير مشروع</option>
                                                                    <option value="architect">مهندس معماري</option>
                                                                    <option value="mechanical">مهندس ميكانيكا</option>
                                                                    <option value="power">مهندس كهرباء</option>
                                                                    <option value="quantum">مهندس كميات</option>
                                                                    <option value="foreman">مراقب</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="input-group"><span class="input-group-addon"><i
                                                                            class="fa fa-user"></i></span>
                                                                <select class="form-control" name="engineer-contractor-id">
                                                                    <option value="">اختار مهندس</option>
                                                                    <optgroup label="-------------">

                                                                    </optgroup>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="btn btn-block btn-success" id="insert-contractor-row">
                                                                <i class="fa fa-plus-square-o"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-20">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-body">
                                                            <h6 class="txt-dark capitalize-font" style="margin-top: 15px;">
                                                                <i class="fa fa-dot-circle-o"></i>طاقم المالك
                                                            </h6>
                                                            <hr class="light-grey-hr"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div class="form-group">
                                                        <div class="col-md-5">
                                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                </span>
                                                                <select class="form-control" name="engineer-owner-role">
                                                                    <option value="">اختار المهمة</option>
                                                                    <option value="manager">مدير مشروع</option>
                                                                    <option value="architect">مهندس معماري</option>
                                                                    <option value="mechanical">مهندس ميكانيكا</option>
                                                                    <option value="power">مهندس كهرباء</option>
                                                                    <option value="quantum">مهندس كميات</option>
                                                                    <option value="foreman">مراقب</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="input-group"><span class="input-group-addon"><i
                                                                            class="fa fa-user"></i></span>
                                                                <select class="form-control" name="engineer-owner-id">
                                                                    <option value="">اختار مهندس</option>
                                                                    <optgroup label="-------------">

                                                                    </optgroup>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="btn btn-block btn-success" id="insert-owner-row">
                                                                <i class="fa fa-plus-square-o"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border-right: 1px solid #e6e6e6;">
                                            <div class="row">
                                                <table class="table mb-0" id="data-destiny">
                                                    <thead>
                                                    <tr>
                                                        <th>المهمة</th>
                                                        <th>اسم المهندس</th>
                                                        <th>يتبع الي</th>
                                                        <th>الشركة</th>
                                                        <th class="action">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="consultant-area">
                                                    </tbody>
                                                    <tbody id="contractor-area">
                                                    </tbody>
                                                    <tbody id="owner-area">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </section>
                                <h3><span class="head-font capitalize-font">الكميات</span></h3>
                                <section>
                                    <!-- Row -->
                                    <div class="row mb-5">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label mb-5">مراحل المشروع</label>

                                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                    <input type="text" name="steps" class="form-control"
                                                           placeholder="مراحل المشروع" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label mb-5">عدد المباني</label>

                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                    <input type="text" name="buildings_num" class="form-control"
                                                           placeholder="عدد المباني" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label mb-5">جدول الكميات</label>

                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                    <input type="text" name="quantity_table" class="form-control"
                                                           placeholder="جدول الكميات" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Row -->
                                    <!-- Row -->

                                    <!-- /Row -->
                                    <!-- Row -->
                                </section>
                                <h3><span class="head-font capitalize-font">اوراق المشروع</span></h3>
                                <section>
                                    <!-- Row -->
                                    <div class="mb-20">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-body">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                                class="fa fa-dot-circle-o"></i>اوراق المشروع</h6>
                                                    <hr class="light-grey-hr"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Row -->
                                        <!-- Row -->
                                        <div class="row mb-5">
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="">الاوراق </label>

                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-file-text"></i>
                                                    </div>
                                                    <select class="form-control" id="selectDocuments">
                                                        <option value="" selected>اختار ملف</option>
                                                        <option value="شهاده التامينات الاجتماعيه">شهاده التامينات
                                                            الاجتماعيه
                                                        </option>
                                                        <option value="الغرفه التجاريه">الغرفه التجاريه</option>
                                                        <option value="شهاده السعوده">شهاده السعوده</option>
                                                        <option value="شهاده التصنيف">شهاده التصنيف</option>
                                                        <option value="شهادة الزكاة">شهادة الزكاة</option>
                                                        <option value="شهادة الدخل">شهادة الدخل</option>
                                                        <option value="سبقه الاعمال">سبقه الاعمال</option>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="documents">
                                            <!-- documents rows -->
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="documentsInputs" style="display: none">
        <div class="row" data-sort-order="0">
            <div class="col-md-6">
                <div class="form-group mb-30">
                    <label class="control-label mb-10">نوع المستند</label>
                    <input type="text" class="form-control" value="" name="document_type[]" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-30">
                    <label class="control-label mb-10">المستند</label>

                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput">
                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                            <span class="fileinput-filename"></span>
                        </div>
                        <span class="input-group-addon fileupload btn btn-success btn-anim btn-file">
                            <i class="fa fa-upload"></i>
                            <span class="fileinput-new btn-text">اختار ملف</span>
                            <span class="fileinput-exists btn-text">تغيير</span>
                            <input type="file" name="document_file[]">
                        </span>
                        <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists"
                           data-dismiss="fileinput">
                            <i class="fa fa-trash"></i>
                            <span class="btn-text"> ازالة</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('additional-css')
    <link rel="stylesheet" href="{{asset('template/vendors/bower_components/jquery.steps/demo/css/jquery.steps.css')}}">
    <link href="{{asset('template/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')}}"
          rel="stylesheet" type="text/css"/>
@endsection
@section('additional-js')
    <script src="{{asset('template/vendors/bower_components/jquery.steps/build/jquery.steps.min.js')}}"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="{{asset('template/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')}}"></script>
    <script src="{{asset('template/dist/js/form-wizard-data.js')}}"></script>
    <script>
        $(function () {
            $("select[name='contractor_id']").change(function () {
                var idValue = $(this).val();
                var url = $(this).attr('data-ajax--url');
                var destiny = $('select[name="engineer-contractor-id"]');
                $("#data-destiny").find('tbody#contractor-area').empty();
                $.ajax({
                    url: url,
                    type: "get",
                    data: {id: idValue},
                    success: function (response) {
                        destiny.find('optgroup').remove();
                        destiny.append(response);
                    }

                });
            });
            $("select[name='owner_id']").change(function () {
                var idValue = $(this).val();
                var url = $(this).attr('data-ajax--url');
                var destiny = $('select[name="engineer-owner-id"]');
                $("#data-destiny").find('tbody#owner-area').empty();
                $.ajax({
                    url: url,
                    type: "get",
                    data: {id: idValue},
                    success: function (response) {
                        destiny.find('optgroup').remove();
                        destiny.append(response);
                    }

                });
            });
            $("a#insert-row").click(function (event) {
                event.preventDefault();
                addRow($(this), 'consultant', 'الاستشاري', 'الاستشاري');
            });
            $('a#insert-contractor-row').click(function (event) {
                event.preventDefault();
                addRow($(this), 'contractor', 'المقاول');
            });
            $('a#insert-owner-row').click(function (event) {
                event.preventDefault();
                addRow($(this), 'owner', 'المالك');
            });
        });
        function addRow(element, belongsTo, belongsToType, belongToName) {
            var engineerType = element.closest('.row').find('select[name="engineer-' + belongsTo + '-role"]');
            var engineerTypeText = engineerType.find('option:selected').text();
            var engineerTypeVal = engineerType.val();
            var engineerId = element.closest('.row').find('select[name="engineer-' + belongsTo + '-id"]');
            var engineerIdVal = engineerId.val();
            var engineerIdText = engineerId.find("option:selected").text();
            var optGroup = engineerId.find('optgroup');
            var tableDestiny = $("#data-destiny").find('tbody#' + belongsTo + '-area');

            var belongToRealName = (optGroup.length) ? optGroup.attr('label') : belongToName;
            if (engineerIdVal !== "" && engineerTypeVal !== "") {
                tableDestiny.append("<tr>" +
                        "<td>" + engineerTypeText + "</td>" +
                        "<td>" + engineerIdText + "</td>" +
                        "<td>" + belongsToType + "</td>" +
                        "<td>" + belongToRealName + "</td>" +
                        "<td>" +
                        "<input type='hidden' name='" + belongsTo + "_engineer_id[]' value='" + engineerIdVal + "'> " +
                        "<input type='hidden' name='" + belongsTo + "_engineer_position[]' value='" + engineerTypeVal + "'>" +
                        "<a href='#' id='removeRow'><i class='fas fa-trash-alt text-danger fa-lg'></i></a>" +
                        "</td>" +
                        "</tr>");
                removeRow();
                engineerType.prop('selectedIndex', 0);
                engineerId.prop('selectedIndex', 0);
            }
        }
        function removeRow() {
            $("a#removeRow").click(function (event) {
                event.preventDefault();
                var tr = $(this).closest('tr');
                tr.remove();

            });
        }
    </script>
    <script>
        $(function () {
            $("select#selectDocuments").change(function () {
                var value = $(this).val();
                var inputHtml = $("#documentsInputs");
                var inputDistention = $("#documents");
                sortInputsArray(inputHtml, value, inputDistention);
                inputDistention.append(inputHtml.html());
                var removeRow = $("a.fileinput-exists");
                removeRow.click(function (event) {
                    var linkRow = $(this).closest('.row');
                    linkRow.empty();
                });

            });
            function sortInputsArray(htmlContains, inputValue, inputDistention) {
                var inputType = htmlContains.find("input[name^='document_type']");
                var inputFile = htmlContains.find("input[name^='document_file']");
                var index = getIndex(inputDistention);
                htmlContains.find('.row').attr('data-sort-order', index);
                inputType.attr('value', inputValue);
                inputType.attr('name', "document_type[" + index + "]");
                inputFile.attr('name', "document_file[" + index + "]");
            }

            function getIndex(inputDistention) {
                var lastRow = inputDistention.find("div.row:last-of-type");
                var index = 0
                if (lastRow.length) {
                    index = parseInt(lastRow.attr('data-sort-order')) + 1;
                }
                return index;

            }

        });
    </script>
    <script>
        $(function () {
            $("a[href$='#finish']").click(function (event) {
                event.preventDefault();
                var form = $(this).closest('form');
                form.trigger('submit');
            });
        });
    </script>
@endsection