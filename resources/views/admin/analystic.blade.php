@extends('admin.layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper row admin-content">
        <div class="col-lg-12 filter_content">
			<div class="col-lg-6">
				<form method="POST" action="" id="filter_form">
                    {{ csrf_field() }}
                    <p>Select Timeframe</p>
                    <div class="row">
                        <div class='col-md-5'>
                            <div class="form-group">
                                <input type='text' class="form-control" name="startdate" id='startdate' value="{{$startdate}}"/>
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class="form-group">
                                <input type='text' class="form-control" name="enddate" id='enddate' value="{{$enddate}}"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
        <div class="col-lg-12 row">
            <div class="col-lg-6">
                <div class="user_info data_items">
                    <p class="userdata_title">User Info</p>
                    <div class="data_item">
                        <span class="data_description">Total Signups</span>
                        <span class="data_info">{{$user_count}}</span>
                    </div>
                    <div class="data_item">
                        <span class="data_description">Total Time Spent on 2HEX</span>
                        <span class="data_info">{{floor($total_time/3600)}}:{{floor(($total_time%3600)/60)}}:{{floor($total_time%60)}}</span>
                    </div>
                    <div class="data_item">
                        <span class="data_description">Total Uploaded File</span>
                        <span class="data_info">{{$filecount}}</span>
                    </div>
                    <div class="data_item">
                        <span class="data_description">Total Uploaded File Size</span>
                        <span class="data_info">{{$totalsize}}</span>
                    </div>
                    <div class="data_item">
                        <span class="data_description">Total Orders Saved</span>
                        <span class="data_info">{{$order_count}}</span>
                    </div>
                </div>
                <div class="user_session data_items">
                    <p class="userdata_title"></p>
                    <div style="height: 300px">
                      <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="m-grid__item m-grid__item--fluid">
                    <input type="text" id="generalSearch" class="form-control col-4" placeholder="Type to filter ....">
                    <table class="m-datatable m-datatable--scroll" width="100%">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Click</th>
                            <th>Upload</th>
                            <th>Saved Order</th>
                            <th>Saved Batch</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activeDatas as $key => $activeData)
                            @if(isset($activeData))
                                <tr>
                                    <td><a href="mailto:{{ isset($activeData['email'])?$activeData['email']:'' }}">{{ isset($activeData['email'])?$activeData['email']:'' }}</a></td>
                                    <td>{{ isset($activeData['name'])?$activeData['name']:'' }}</td>
                                    <td>{{ isset($activeData['click'])?$activeData['click']:0 }}</td>
                                    <td>{{ isset($activeData['upload'])?$activeData['upload']:0 }}</td>
                                    <td>{{ isset($activeData['saved_order'])?$activeData['saved_order']:0 }}</td>
                                    <td>{{ isset($activeData['saved_batch'])?$activeData['saved_batch']:0 }}</td>
                                </tr>
                                
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        
    </div>
@endsection
@section('footer_scripts')
    <script src="../../../asset/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            $('.btn-user-delete').on('click', function (event) {
                var button = $(this) 
                var recipient = button.data('whatever') 
                $('#btn-delete').attr('href', recipient)
            })
        })
        
    </script>
    <script type="text/javascript">
        $(document).ready(function(){

            var labels = [], labelcount = 0;
            var data = [], datacount = 0;
            @foreach($signupByDays as $signupByDay)
                labels[labelcount++] = "{{$signupByDay['date']}}";
                data[datacount++] = "{{$signupByDay['counts']}}";
            @endforeach

            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Sign Ups',
                        data: data, // Specify the data values array
                        fill: false,
                        borderColor: '#2196f3', // Add custom color border (Line)
                        backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                        borderWidth: 1 // Specify bar border width
                    }]},
                options: {
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
                }
            });
        });
        
    </script>

@stop