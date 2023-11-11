@extends('layouts.vertical', ['title' => 'Activity Reports'])

@section('content')

<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<style>
/* #buttons-div {
    margin-bottom: -15px;
}     */
.entries{
    width:auto;
    display: inline-block;
}
 div.dataTables_filter{ display: none !important;}
</style>
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Monez</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                        <li class="breadcrumb-item active">Activity Reports</li>
                    </ol>
                </div>
                <h4 class="page-title">Activity Reports</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="row mb-3 justify-content-end">
                        <div class="col-auto">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" accept=".csv">
                                        <label class="btn btn-primary" for="customFile">Export CSV</label>
                                    </div>
                                </div>
                                <div class="col-auto dropleft" style="min-width: 160px">
                                    <button class="btn btn-secondary waves-effect waves-light dropdown-toggle" type="button" data-toggle="dropdown" data-target="#show-columns-dropdown" aria-haspopup="true" aria-expanded="false">
                                        Show Columns
                                    </button>
                                                                       
                                    <div id="show-columns-dropdown" class="dropdown-menu">
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="channel-path">
                                                <label class="custom-control-label w-100" for="channel-path" data-column="0">Channel Path</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="referer">
                                                <label class="custom-control-label w-100" for="referer" data-column="1">Referer</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="location">
                                                <label class="custom-control-label w-100" for="location" data-column="2">Location</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="latency">
                                                <label class="custom-control-label w-100" for="latency" data-column="3">Latency (seconds)</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="useragent">
                                                <label class="custom-control-label w-100" for="useragent" data-column="4">UserAgent</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="screen-resolution">
                                                <label class="custom-control-label w-100" for="screen-resolution" data-column="5">Screen Resolution</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="device">
                                                <label class="custom-control-label w-100" for="device">Device</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="os">
                                                <label class="custom-control-label w-100" for="os">OS</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="browser">
                                                <label class="custom-control-label w-100" for="browser">Browser</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> -->
                    <div class="row mb-2 align-items-center justify-content-between">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-auto" style="min-width: 170px;">
                                    <select class="form-control" name="partener-type" id="partner-type" data-toggle="select2">
                                        <option selected disabled>Select Type</option>
                                        <option value="publishers">Publishers</option>
                                        <option value="advertisers">Advertisers</option>
                                    </select>
                                </div>
                                <div class="col-auto" style="min-width: 200px;">
                                    <select class="form-control" name="parteners" disabled id="partners" data-target-dropdown="#partners-dropdown" data-toggle="select2">
                                        <option value="" selected disabled></option>
                                        <option value="all">All</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                    <div id="partners-dropdown" class="dropdown-menu w-100" data-searchable="true">
                                        <div class="px-2">
                                            <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                        </div>
                                        <div class="advertiser-dd">
                                            @php($i=0)
                                            @foreach ($advertisers as $advertiser)   
                                            @php($i++)                                  
                                            <div class="dropdown-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="advertisersId" id="customCheckAd{{$i}}" value="{{$advertiser->id}}">
                                                    <label class="custom-control-label w-100" for="customCheckAd{{$i}}">{{$advertiser->company_name}}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="publishers-dd">
                                            @php($i=0)
                                            @foreach ($publishers as $publisher)   
                                            @php($i++)                                      
                                            <div class="dropdown-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="publishersId" id="customCheckPub{{$i}}" value="{{$publisher->id}}">
                                                    <label class="custom-control-label w-100" for="customCheckPub{{$i}}">{{$publisher->company_name}}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto" style="min-width: 200px;">
                                    <select class="form-control" disabled id="feeds-channels" data-target-dropdown="#types-dropdown" data-toggle="select2">
                                        <option value="" selected disabled></option>
                                        <option value="all">All</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                    <div id="types-dropdown" class="dropdown-menu w-100" data-searchable="true">
                                        <div class="px-2">
                                            <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                        </div>
                                        <div id="checkboxes">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto" style="min-width: 200px;">
                                    <select class="form-control selectperiod" id="select-period" disabled name="period" data-toggle="select2" required>
                                        <option>Select Period</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="today">Today</option>
                                        <option value="md">Month to Date</option>
                                        <option value="prevmonth">Previous Month</option>
                                        <option value="custom-range">Custom Range</option>
                                    </select>
                                    <input type="text" id="range-datepicker" style="width: 0; height: 0; overflow: hidden;" class="form-control border-0 p-0 custom-range-date-picker" placeholder="Start Date to End Date">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" id="go">Go</button>
                        </div>
                    </div>
                    <!-- <div id="filters" class="row"></div> -->
                    <div id="buttons-div" class="mt-2 row">
                        <div class="col-sm-9" id="page-count"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">                          
                            <thead>
                                <tr>
                                    <th>Date & Time Of Search</th>
                                    <th>Query</th>
                                    <th>Advertiser</th>
                                    <th>Feed</th>
                                    <th>Publisher</th>
                                    <th>Channel</th>
                                    <th>SubId</th>
                                    <th>Channel Path</th>
                                    <th>Referer</th>
                                    <th>No. of redirects</th>
                                    <th>Alert</th>
                                    <th>IP Address</th>
                                    <!-- Location = City + Country  -->
                                    <th>Location</th>
                                    <th>GEO</th>
                                    <th>Latency (Seconds)</th>
                                    <th>UserAgent</th>
                                    <th>Screen Resolution</th>
                                    <th>Device</th>
                                    <th>OS</th>
                                    <th>Browser</th>

                                </tr>
                            </thead>
                            <tbody id='search_data'>
                                @foreach ($channelSearchs as $channelSearch)
                                    <tr>
                                        <td>{{$channelSearch->created_at}}</td>
                                        <td>{{$channelSearch->query}}</td>
                                        <td>{{$channelSearch->advertiser ? $channelSearch->advertiser->company_name : '--'}}</td>
                                        <td>{{$channelSearch->feed}}</td>
                                        <td>{{$channelSearch->channel->publisher->company_name}}</td>
                                        <td>{{$channelSearch->channel->channelId}}</td>
                                        <td>{{$channelSearch->subid}}</td>
                                        <td>{{$channelSearch->channel->channelpath->channel_path}}</td>
                                        <td>{{$channelSearch->referer}}</td>
                                        <td>{{$channelSearch->no_of_redirects}}</td>
                                        <td>{{$channelSearch->alert}}</td>
                                        <td>{{$channelSearch->ip_address}}</td>
                                        <td>{{$channelSearch->location}}</td>
                                        <td>{{$channelSearch->geo}}</td>
                                        <td>{{$channelSearch->latency}}</td>
                                        <td>{{$channelSearch->user_agent}}</td>
                                        <td>{{$channelSearch->screen_resolution}}</td>
                                        <td>{{$channelSearch->device}}</td>
                                        <td>{{$channelSearch->os}}</td>
                                        <td>{{$channelSearch->browser}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="pagination" class="mt-2 row">
                        <div class="col-sm-9" id=""></div>
                    </div>                    
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container -->


@endsection

@section('script')
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/js/custom/custom-multiselect-dropdown.js')}}"></script>

<!-- Page js-->
<script src="{{asset('assets/js/pages/form-pickers.init.js')}}"></script>
<script src="{{asset('assets/js/modal-init.js')}}"></script>

<!-- dataTables scripts -->

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>


<script type="text/javascript">
    let table = $('#products-datatable').DataTable({
        orderCellsTop: true,
        // responsive: true,
        dom: 'lBfrtip',  
        paging: true,
        pagingType: 'simple',
        iDisplayLength: 10,
        fixedHeader: true,
        buttons: [
            {
                extend: 'colvis',
                columns: ':not(.noVis)',
                text: 'Show Columns'            
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                },
                text:'Export CSV'
            }
            ],            
        searching: true,
        filter: true,
        info: true,
        order: [], 
        language: {
        searchPlaceholder: "Search records",
        search: "",
      },       
           
        "lengthMenu": [
            [10, 50, 100, 250, 500],
            [10, 50, 100, 250, 500]
        ],
  } );

  table.buttons().container().appendTo( '#buttons-div' );
  $('#products-datatable_length').detach().prependTo('#page-count')
  $(".dt-buttons").addClass("col-sm-3");     
  $(".dataTables_length select").addClass('form-control');
  $(".dataTables_length select").addClass('entries');
  
    $(".selectperiod").on("select2:close", function() {
        let value = $(this).val()
        if (value === "custom-range") {
            setTimeout(() => {
                $(".custom-range-date-picker").flatpickr({
                    mode: "range"
                }).toggle()
            }, 0);
            $(".custom-range-date-picker").change((e) => {
                let renderedContainer = $(this).siblings(".select2-container")
                    .find(".select2-selection__rendered");
                renderedContainer.text("Custom Range " + `( ${$(e.target).val()} )`);
            });
        }
    })

    //Filters Flow

    $("#partner-type").on("change", (e) => {
        
        if ($(e.target).val() !== "") {
            let selectedText = $("#partner-type option:selected").text();
            
            let partnersRenderContainer = $("#partners")
                .removeProp("disabled")
                .siblings(".select2-container")
                .find(".select2-selection__rendered");
            partnersRenderContainer.text("Select " + selectedText);

            let fchRenderContainer = $("#feeds-channels")
                .siblings(".select2-container")
                .find(".select2-selection__rendered");
            fchRenderContainer.text("Select " + ($("#partner-type").val() === "advertisers" ? "Feeds" : "Channels"));
            if($("#partner-type").val() == "advertisers")
            {   
                $(".publishers-dd").css('display','none');
                $(".advertiser-dd").css('display','block');
            }
            else{
                $(".publishers-dd").css('display','block');
                $(".advertiser-dd").css('display','none');
            }
            $("#partners").val("");
            $("#feeds-channels").val("");
            $('input:checkbox').removeAttr('checked');            
        }
    });

    $("#partners").change((e) => {
        if ($(e.target).val() !== "") {
            $("#feeds-channels")
                .removeProp("disabled")

            var inputVal = $(e.target).val();

            }                
    });
    $("#feeds-channels").change((e) => {
        if ($(e.target).val() !== "") {
            $("#select-period")
                .removeProp("disabled");

                var partnerType = $('#partner-type').find(":selected").val();
                var inputVal = $('#partners').find(":selected").val();
            console.log(partnerType);

            if (partnerType == 'advertisers')
            {
                if(inputVal == 'select-custom')
                {   
                    ids = ''; 
                    $("input:checkbox[name=advertisersId]:checked").each(function() { 
                        ids=ids+','+$(this).val();
                    }); 
                }   
                else{
                    ids = 'all';
                }
            $.ajax({
                    url: "{{route('feeds.getAllFeeds')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "ids" : ids
                    },
                    
                    success: function(response) {
                        if (response.status === 'error') {
                            console.log('error')
                        } else {
                            var i = 0;
                            $('#checkboxes').empty();
                            $.each(response.data,function(key,value){  
                                i++;
                                    $('#checkboxes').
                                    append($('<div class="dropdown-item">'
                                                +'<div class="custom-control custom-checkbox">'
                                                    +'<input type="checkbox" name="feeds-channels" class="custom-control-input" id="feed'+i+'" value="'+value.id+'">'
                                                    +'<label class="custom-control-label w-100" for="feed'+i+'">'+value.feedId+'</label>'
                                                +'</div>'
                                            +'</div>'));
                                });  
                        }
                    },
                    error: function(response) {
                        console.log(response)
                    }
                });               
            }
            else if(partnerType == 'publishers'){
                if(inputVal == 'select-custom')
                {   
                    ids = ''; 
                    $("input:checkbox[name=publishersId]:checked").each(function() { 
                        ids=ids+','+$(this).val();
                    }); 
                }   
                else{
                    ids = 'all';
                }             
            $.ajax({
                    url: "{{route('channel.getAllChannels')}}",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "ids" : ids
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'error') {
                            console.log('error')
                        } else {
                            var i = 0;
                            $('#checkboxes').empty();
                            $.each(response.data,function(key,value){  
                                i++;
                                    $('#checkboxes').
                                    append($('<div class="dropdown-item">'
                                                +'<div class="custom-control custom-checkbox">'
                                                    +'<input type="checkbox" name="feeds-channels" class="custom-control-input" id="feed'+i+'" value="'+value.id+'">'
                                                    +'<label class="custom-control-label w-100" for="feed'+i+'">'+value.channelId+'</label>'
                                                +'</div>'
                                            +'</div>'));
                                });  
                        }
                    },
                    error: function(response) {
                        console.log(response)
                    }
                });               
            }                
        }
    });    

    $('#go').on('click', (e) => {
        console.log(e.target);
        var partnerType = $('#partner-type').find(":selected").val();
        partners = '';
        if($('#partners').find(":selected").val() == 'all' )
            partners = 'all';
        else{
            partners = ids;
                }        
        feeds = '';
        if($('#feeds-channels').find(":selected").val() == 'all')
            feeds = 'all';
        else{
        $("input:checkbox[name=feeds-channels]:checked").each(function() { 
                        feeds=feeds+','+$(this).val();
                    });
                }
        date = $('#select-period').find(":selected").val();
        range = '';
        if (date == 'custom-range')
        {   
            date = 'range';
            range = $('#range-datepicker').val();
        }

        console.log('1 : '+partnerType + ' 2 : '+partners + ' 3 : '+feeds);

            // $('#products-datatable').dataTable( {
            // "ajax": {
            //     "url": "{{route('activity')}}",
            //     "data": {
            //         "_token": "{{ csrf_token() }}",
            //             "partnerType" : partnerType,
            //             "partners" : partners,
            //             "feeds" : feeds,
            //             "date" : date,
            //             "range" : range
            //     },
            //     "type": 'POST',
            //     "dataType": 'json',
            //     success: function(response) {

            //     }
            // }
            // } );        
        $.ajax({
                    url: "{{route('activity')}}",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "partnerType" : partnerType,
                        "partners" : partners,
                        "feeds" : feeds,
                        "date" : date,
                        "range" : range
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'error') {
                            console.log('error')
                        } else {
                            
                            table.clear();
                            $.each(response.data,function(key,value){
                            // $.each(result, function(i, item) {
                                            var a =  table.row.add([
                                                value.created_at
                                                ,value.query 
                                                ,value.advertiser_id
                                                ,value.feed
                                                ,value.publisher
                                                ,value.channel_id
                                                ,value.subid
                                                ,value.channel
                                                ,value.referer
                                                ,value.no_of_redirects
                                                ,value.alert
                                                ,value.ip_address
                                                ,value.location
                                                ,value.geo
                                                ,value.latency
                                                ,value.user_agent
                                                ,value.screen_resolution
                                                ,value.device
                                                ,value.os
                                                ,value.browser
                                                                    ]);
                                                                });
                                                table.draw();                     
                        }
                    },
                    error: function(response) {
                        console.log(response)
                    }
                        

        })
    });
    $("[data-toggle='dropdown']").click(function() {
        $($(this).attr("data-target")).toggleClass("d-block");
    })

    $(document).on('click', (e) => {
        console.log(e.target)
        $('.dropdown-menu').each((_, searchDrop) => {
            if (!searchDrop.parentNode.contains(e.target)) {
                $(searchDrop).removeClass("d-block");
            }
        })
    })
</script>
@endsection
