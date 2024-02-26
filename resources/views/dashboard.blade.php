@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1>This is my dashboard</h1>
        <div class="container">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    var over= [12,20,30];
    var arr = [
        {
            "team" : "Pakistan",
            "runsPerOver" : [
                {
                    "over" : 1,
                    "runs" : 12
                },
                {
                    "over" : 2,
                    "runs" : 14
                },
                {
                    "over" : 3,
                    "runs" : 8
                },
                {
                    "over" : 4,
                    "runs" : 15
                },
                {
                    "over" : 5,
                    "runs" : 22
                },
                {
                    "over" : 6,
                    "runs" : 22
                }
            ]
        },
        {
            "team" : "India",
            "runsPerOver" : [
                {
                    "over" : 1,
                    "runs" : 12
                },
                {
                    "over" : 2,
                    "runs" : 14
                },
                {
                    "over" : 3,
                    "runs" : 8
                },
                {
                    "over" : 4,
                    "runs" : 15
                },
                {
                    "over" : 5,
                    "runs" : 22
                },
                {
                    "over" : 6,
                    "runs" : 12
                },
                {
                    "over" : 7,
                    "runs" : 14
                }
            ]
        }
    ];
    var len = arr[0]["runsPerOver"].length;
    var overLables =  [];
    var pakRuns = [];
    var IndRuns = [];
    for(let i=0;i<arr[1]["runsPerOver"].length;i++)
    {
        overLables.push(arr[1]["runsPerOver"][i]["over"]);
    }
    for(let i=0;i<arr[0]["runsPerOver"].length;i++)
    {
        pakRuns.push(arr[0]["runsPerOver"][i]["runs"]);
    }
    for(let i=0;i<arr[1]["runsPerOver"].length;i++)
    {
        IndRuns.push(arr[1]["runsPerOver"][i]["runs"]);
    }
    console.log(arr[0]["runsPerOver"][0]["over"]);
    // var a={
    //     "cricket":[
    //         {
    //             "over":5,
    //             "run":1
    //         },
    //         {
    //             "over":5,
    //             "run":22
    //         },
    //         {
    //             "over":5,
    //             "run":10
    //         }
    //     ]
    // };
    const ctx = document.getElementById('myChart');
    new Chart(
        ctx,
        {
        type: 'bar',
        data : {
            labels: overLables,
            datasets: [{
                    data: pakRuns,
                    label : arr[0]["team"],
                    backgroundColor: "green",
                },
                {
                    label : arr[1]["team"],
                    data: IndRuns,
                    backgroundColor : "blue"
                },
            ],
        },
        options: {
            layout: {
                padding:{
                    left: 30,
                    top : 20,
                    right : 40
                },
            },
        },
    });
</script>
@endpush