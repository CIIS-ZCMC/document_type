@extends('layouts.app',[
'page' => 'assessment details',
'title' => ''
])
 
@section('content')
    <section class="content content-not-print">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> Assessment Info</h3>
                @if ($assessment->status == 'for-approval' && Auth::user()->hasRole('administrator'))
                    <form method="POST" action="/assessments/update/status">
                        @csrf
                        <input type="hidden" name="id" value="{{ Crypt::encrypt($assessment->id) }}" />
                        <input type="hidden" name="status" value="approved" />
                        <button type="submit" class="btn btn-info btn-sm float-right mr-1">{{ _('Approve') }}</button>
                    </form>
                    <button type="button" data-toggle="modal" data-target="#mdl-disapprove"
                        class="btn btn-danger btn-sm float-right mr-1">{{ _('Disapproved') }}</button>
 
                @endif
 
                @if ($assessment->status == 'pending' || $assessment->status == 'inspecting')
                    <a href="/manage/assessments/inspecting/{{ Crypt::encrypt($assessment->id) }}"
                        class="btn btn-pink btn-sm float-right mr-1">{{ _('Start Inspecting') }}</a>
                @endif
                @if ($assessment->status == 'pending')
                <button type="button" data-toggle="modal" data-target="#mdl-un-verify"
                    class="btn btn-danger btn-sm float-right mr-1">{{ _('Unverify') }}</button>
                @endif
                {{-- @if (!$assessment->issued_on)
                    <a href="/assessments/{{ $assessment->id }}"
                        class="btn btn-success btn-sm float-right mr-1">{{ _('Update') }}</a>
                @endif --}}
                <a href="/manage/assessments/" class="btn btn-secondary btn-sm float-right mr-1">{{ _('Back') }}</a>
                <button type="button" class="btn btn-default float-right btn-sm mr-1" onclick="window.print()">Print</button>
            </div>
 
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="row pb-5">
                                <div class="col-md-3 bg-light">
                                    <label for="control_no" class="m-0">Control No.</label>
                                    <h3 type="text">{{ $assessment->control_no }}</h3>
                                </div>
                                <div
                                    class="col-md-4 bg-{{$assessment->status == 'approved' ? 'pink' : ($assessment->status == 'disapproved' || $assessment->status == 'un-verified' ? 'danger' : ($assessment->status == 'for-approval' ? 'warning' : 'primary'))}}">
                                    <label for="" class="m-0">Status <button class="btn btn-link text-white"
                                            data-toggle="modal" data-target="#mdl-timeline"><i
                                                class="fas fa-external-link-alt"></i></button> </label>
                                    <h3>{{ $assessment->status }}</span></h3>
 
                                </div>
                                <div class="col-md-5 bg-light">
                                    <label>Date Registered</label>
                                    <h3>{{ date('F j, Y, g:i a', strtotime($assessment->created_at)) }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4 w-100">
                                        <label>Establisment Name <a class="btn btn-link"><i
                                                    class="fas fa-external-link-alt"></i></a> </label>
                                        <h3>{{ $assessment->establishment->name }}</h3>
                                    </div>
                                    <div class="mb-4 w-100">
                                        <label>Nature of Establisment </label>
                                        <h3>{{ $assessment->establishment->nature }}</h3>
                                    </div>
                                    <div class="mb-4 w-100">
                                        <label>Person Incharged </label>
                                        <h3>{{ $assessment->establishment->personIncharged }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4 w-100">
                                        <label>Email Address</label>
                                        <h3>{{ $assessment->establishment->email ? $assessment->establishment->email : 'N/A' }}
                                        </h3>
                                    </div>
                                    <div class="mb-4 w-100">
                                        <label>Contact No.</label>
                                        <h3>{{ $assessment->establishment->contact_no ? $assessment->establishment->contact_no : 'N/A' }}
                                        </h3>
                                    </div>
                                    <div class="mb-4 w-100">
                                        <label>Complete Address</label>
                                        <h3>
                                            {{ $assessment->establishment->complete_address ? $assessment->establishment->complete_address . ',' : '' }}
                                            {{ $assessment->establishment->barangay ? $assessment->establishment->barangay->name : 'N/A' }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
 
                            <div class="row">
                                <div class="col-md-12"><br>
                                    <fieldset class="pl-3 pb-2 text-sm">
                                        <legend class="col-md-4 text-md">Attachments</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Business Permit -->
                                                <label>Business Permit: </label>
                                                <h3>
                                                    <a target="_blank"
                                                        href="{{ url('images/requirements/' . $assessment->establishment->control_no . '/' . $assessment->establishment->business_permit) }}">
                                                        {{ $assessment->establishment->business_permit ? $assessment->establishment->business_permit : 'N/A' }}</a>
                                                </h3>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Business Permit -->
                                                <label>Owner Valid ID: </label>
                                                <h3>
                                                    <a target="_blank"
                                                        href="{{ $assessment->establishment->owner_valid_id ? url('images/requirements/' . $assessment->establishment->control_no . '/' . $assessment->establishment->owner_valid_id) : '#' }}">
                                                        {{ $assessment->establishment->owner_valid_id ? $assessment->establishment->owner_valid_id : 'N/A' }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
 
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <label class="m-0">Inspected Last</label>
                                    <h5>{{ $assessment->inspectedBy ? $assessment->inspectedBy->fullName : 'N/A' }}</h5>
                                    <h6>{{ $assessment->inspected_at }}</h6>
                                </div>
                                @if ($assessment->encrypted_qr_data)
                                    <div class="col-md-6">
                                        <label class="m-0">Issued Last</label>
                                        <h5>{{ $assessment->issuedBy ? $assessment->issuedBy->fullName : '' }}
                                        </h5>
                                        <h6>{{ date('F j, Y, g:i a', strtotime($assessment->issued_on)) }}</h6>
                                        <label class="m-0">Valid Until</label>
                                        <h6>{{ date('F j, Y, g:i a', strtotime($assessment->valid_until)) }}</h6>
                                    </div>
                                @endif
                            </div>
 
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <label class="m-0">Registered On</label>
                                    <h5>{{ $assessment->created_at ? $assessment->created_at : '' }}</h5>
                                    <h5>{{ $assessment->createdBy ? $assessment->createdBy->fullName : '' }}</h5>
                                </div>
                                @if ($assessment->statusUpdatedBy)
                                    <div class="col-md-6">
                                        <label class="m-0">Updated Last</label>
                                        <h5>{{ date('F j, Y, g:i a', strtotime($assessment->status_updated_at)) }}</h5>
                                        <h6>{{ $assessment->statusUpdatedBy ? $assessment->statusUpdatedBy->fullName : '' }}</h6>
                                    </div>
                                @endif
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <label>Deficiencies</label><br>
                                    {!! $assessment->deficiencies !!}
                                    <br><br>
                                    <label>Recommendations</label><br>
                                    {!! $assessment->recommendations !!}
                                </div>
                            </div>
                        </div>
 
                    </div>
 
                    <div class="col-md-5">
                        <div class="card-body text-center" style="background-color: #f5faff">
                            @if (!$assessment->encrypted_qr_data)
                                <a href="{{ url('/img/no-safety-seal.png') }}" class="nav-link" data-toggle="dropdown">
                                    <img src="/img/no-safety-seal.png" class="user-image float-center w-100"
                                        alt="User Image">
                                </a>
                            @else
                                <canvas width="2480" height="3508" style="width:100%;" id="canvas_img"></canvas>
                                <div id="convert-image"></div>
 
                                <script src="../../../bower_components/jquery/src/qrcode/dist/jquery-qrcode.js"></script>
 
                                <script>
                                    let data = "{{ $assessment->encrypted_qr_data }}";
                                    const email_sent = "{{ $assessment->email_sent_at }}";
                                    const email = "{{ $assessment->establishment->email }}";
                                    const safety_seal_no = "{{ $assessment->safety_seal_no }}";
                                    const issued_on = "{{ date('F d, Y', strtotime($assessment->issued_on)) }}";
                                    const valid_until = "{{ date('F d, Y', strtotime($assessment->valid_until)) }}";
 
                                    $("#convert-image").qrcode({
                                        size: 1118,
                                        typeNumber: 8,
                                        text: data
                                    });
                                    var canvas = $('#convert-image canvas');
                                    $('#convert-image canvas').css("width", "550px");
                                    var qr_code = canvas.get(0).toDataURL("image/png");
 
                                    var myCanvas = $("#canvas_img");
                                    var ctx = myCanvas[0].getContext("2d");
 
                                    var img1 = loadImage("/img/safety-seal-certificate.png", main);
                                    var img2 = loadImage(qr_code, main);
                                    var img = "";
 
                                    var imagesLoaded = 0;
 
                                    function main() {
                                        imagesLoaded += 1;
 
                                        if (imagesLoaded == 2) {
                                            // composite now
                                            ctx.drawImage(img1, 0, 0, 2480, 3508);
                                            ctx.drawImage(img2, 340, 2958, 400, 420);
 
                                            ctx.font = "bold 70px Times New Roman";
                                            ctx.textAlign = "center";
                                            ctx.fillText(safety_seal_no, 1785, 3090);
 
                                            ctx.font = "bold 70px Times New Roman";
                                            ctx.textAlign = "center";
                                            ctx.fillText(issued_on, 1785, 3180);
 
                                            ctx.font = "bold 70px Times New Roman";
                                            ctx.textAlign = "center";
                                            ctx.fillText(safety_seal_no, 1785, 3090);
 
                                            ctx.font = "bold 70px Times New Roman";
                                            ctx.textAlign = "center";
                                            ctx.fillText(valid_until, 1785, 3270);
 
                                            ctx.font = "bold 70px Times New Roman";
                                            ctx.textAlign = "center";
                                            ctx.fillText("__________________", 1765, 3275);
 
                                            img = myCanvas.get(0).toDataURL("image/png");
                                            if (!email_sent && email) {
                                                sendQR(img, qr_code);
                                            }
                                        }
                                    }
 
                                    function loadImage(src, onload) {
                                        // http://www.thefutureoftheweb.com/blog/image-onload-isnt-being-called
                                        var img = new Image();
 
                                        img.onload = onload;
                                        img.src = src;
                                        return img;
                                    }
 
                                    function sendQR(loaded_img, qr_code_loaded) {
                                        const url = "{{ url('/safety-seal/send-email/') }}";
                                        swal.fire({
                                            title: 'Sending Email',
                                            allowEscapeKey: false,
                                            allowOutsideClick: false,
                                            onOpen: () => {
                                                swal.showLoading();
                                                $.ajax({
                                                    url: url,
                                                    type: 'POST',
                                                    data: {
                                                        "_token": "{{ csrf_token() }}",
                                                        "safety_seal": loaded_img,
                                                        "qrcode": qr_code_loaded,
                                                        "id": "{{ Crypt::encrypt($assessment->id) }}"
                                                    },
                                                    success: function(data) {
                                                        console.log(data);
                                                        if (data.success) {
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Sending email',
                                                                html: 'Email has been successfully sent'
                                                            })
                                                        } else {
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Sending email',
                                                                html: data.message
                                                            })
                                                        }
                                                    },
                                                    error: function(data) {
                                                        console.log(data);
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Sending email',
                                                            html: 'Error in sending email'
                                                        })
                                                    }
                                                });
                                            }
                                        }).then()
                                    }
 
                                </script>
 
 
                            @endif
                        </div>
                    </div>
 
                    <div class="card m-3">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title"><i class="fas fa-user"></i> Checklist Details</h3>
                        </div>
                        <div class="card-body">
 
                            @foreach ($assessment->checklist as $checklist)
                                <div class="row my-2">
                                    <div class="col-md-7 bg-light py-4 px-4">
                                        {{ $loop->index + 1 }}. {!! $checklist->requirement->question !!}
                                    </div>
                                    <div class="col-md-2 p-0" style="background-color: #c6f7ff;">
                                        <h6 class="bg-info p-2 text-center m-0 text-center">Client Answer</h6>
                                        <h3 class="text-center">
                                            @if ($checklist->answer == 'yes') <span
                                                    class="">YES</span> @endif
                                            @if ($checklist->answer == 'no') <span
                                                    class="">No</span>
                                            @endif
                                            @if ($checklist->answer == 'na') <span
                                                    class="">N/A</span> @endif
                                        </h3>
                                    </div>
                                    <div class="col-md-3 p-0" style="background-color: #ffc1072b;">
                                        <h6 class="bg-warning p-2 text-center m-0 text-center">Inspector Findings</h6>
                                        <h3 class="text-center float-left ml-4" style="width:15%">
                                            @if ($checklist->inspect_finding == 'yes')
                                                <span class="">YES</span>
                                            @endif
                                            @if ($checklist->inspect_finding == 'no') <span
                                                    class="">No</span>
                                            @endif
                                            @if ($checklist->inspect_finding == 'na') <span
                                                    class="">N/A</span> @endif
                                        </h3>
                                        <small class="pl-4 float-left" style="width: 70%;">
                                            @if($checklist->inspectedBy) 
                                                Inspected by: {{ $checklist->inspectedBy->fullName }}<br>
                                                Inspected at: {{ $checklist->inspected_at }}<br>
                                                Remarks: {{ $checklist->remarks }}
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <div class="modal" tabindex="-1" id="mdl-timeline" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assessment Log</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="timeline" style="
                                        height: 450px;
                                        overflow-x: auto;
                                    ">
                        <!-- timeline time label -->
                        @php
                            $date_current = '';
                        @endphp
                        @foreach ($assessment->logs as $log)
                            @if ($date_current != date('F j, Y', strtotime($log->created_at)))
                                <div class="time-label">
                                    <span class="bg-primary">{{ date('F j, Y', strtotime($log->created_at)) }}</span>
                                </div>
                            @endif
                            @php
                                $date_current = date('F j, Y', strtotime($log->created_at));
                            @endphp
 
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-pen-alt bg-pink"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        {{ date('g:i a', strtotime($log->created_at)) }}</span>
                                    <h3 class="timeline-header"><a
                                            href="#">{{ $log->actionedBy ? $log->actionedBy->fullName : '' }}</a></h3>
                                    <div class="timeline-body">
                                        {{ $log->action }}<br>
                                        <small>{!! $log->remarks !!}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- END timeline item -->
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
 
    <div class="modal" tabindex="-1" id="mdl-disapprove" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Assessment #{{ $assessment->control_no }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/assessments/update/status">
                    @csrf
                    <input type="hidden" name="id" value="{{ Crypt::encrypt($assessment->id) }}" />
                    <input type="hidden" name="status" value="disapproved" />
                    <div class="modal-body">
                        Deficiencies: <br>
                        {!! $assessment->deficiencies !!}
                        <h3>Are you sure you want to disapprove the request? If yes, why?</h3>
                        <small class="text-danger">Note: The recommendation will be sent tru email to the client</small>
                        <textarea id="recommendationEditor" name="recommendations" rows="5">
                                        {{ $assessment->recommendations }}
                                </textarea>
 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Confirm Disapproval</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
    <div class="modal" tabindex="-1" id="mdl-un-verify" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Assessment #{{ $assessment->control_no }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/assessments/update/status">
                    @csrf
                    <input type="hidden" name="id" value="{{ Crypt::encrypt($assessment->id) }}" />
                    <input type="hidden" name="status" value="un-verified" />
                    <div class="modal-body">
                        {{$assessment->deficiencies ? 'Deficiencies: ': '' }}<br>
                        {!! $assessment->deficiencies !!}
                        <h3>Are you sure you want to unverify the request? If yes, why?</h3>
                        <small class="text-danger">Note: The recommendation will be sent tru email to the client</small>
                        <textarea id="recommendation2Editor" name="recommendations" rows="5">
                                        {{ $assessment->recommendations }}
                                </textarea>
 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Confirm Unverification</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
    <div class="print">
        <div style="width:100%; text-align:center;">
            <h2>Safety Seal Certification Checklist</h2>
        </div>
        <div style="width:100%">
            <div style="width: 25%; float:left"> Control No.</div> 
            <div style="width: 75%; float:left">: <b>{{ $assessment->control_no }}</b></div> 
        </div>
        <div style="width:100%">
            <div style="width: 25%; float:left"> Safety Seal Control No.</div> 
            <div style="width: 75%; float:left">: <b>{{ $assessment->safety_seal_no }}</b></div> 
        </div>
        <div style="width:100%">
            <div style="width: 25%; float:left"> Name of Establishment</div> 
            <div style="width: 75%; float:left">: <b>{{ $assessment->establishment->name }}</b></div> 
        </div>
        <div style="width:100%">
            <div style="width: 25%; float:left"> Nature of Establishment</div> 
            <div style="width: 75%; float:left">: <b>{{ $assessment->establishment->nature }}</b></div> 
        </div>
        <div style="width:100%">
            <div style="width: 25%; float:left"> Name of Person in Charge</div> 
            <div style="width: 75%; float:left">: <b>{{ $assessment->establishment->personIncharged }}</b></div> 
        </div>
        <div style="width:100%">
            <div style="width: 25%; float:left"> Contact Details</div> 
            <div style="width: 75%; float:left">: <b>{{ $assessment->establishment->contact_no }}</b></div> 
        </div>
        <div style="width:100%; margin-top:10px;">
            <p>Instruction: (&#10003;) Check the appropriate box (Yes/No), if the following requirements is provided:</p> 
        </div>
        <table style="text-align: center; width:100%">
            <tr style="background-color: #ccc">
                <th style="border: 1px solid black; padding:5px;">
                    Requirements
                </th>
                <th style="border: 1px solid black; padding:5px; width:50px;">
                    Yes
                </th>
                <th style="border: 1px solid black; padding:5px; width:50px;">
                    No
                </th>
                <th style="border: 1px solid black; padding:5px; width:50px;">
                    N/A
                </th>
            </tr>
            @foreach ($assessment->checklist as $checklist)
            <tr>
                <td style="border: 1px solid black; padding:5px;text-align: left; ">
                    {{ $loop->index + 1 }}. {!! $checklist->requirement->question !!}
                </td>
                <td style="border: 1px solid black; padding:5px;">
                    @if ($checklist->answer == 'yes')
                        <span class="">&#10003;</span>
                    @endif
                </td>
                <td style="border: 1px solid black; padding:5px;">
                    @if ($checklist->answer == 'no')
                        <span class="">&#10003;</span>
                    @endif
                </td>
                <td style="border: 1px solid black; padding:5px;">
                    @if ($checklist->answer == 'na')
                        <span class="">&#10003;</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
 
    <script>
        $(function() {
 
            $('#recommendationEditor').summernote({
                height: 300,
            });
 
            $('#recommendation2Editor').summernote({
                height: 300,
            });
        });
 
    </script>
@endsection