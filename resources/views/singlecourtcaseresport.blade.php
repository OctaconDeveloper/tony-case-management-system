<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Court Notice Report</title>
    <style>
        #body{
            width: 100%; 
            /* border:0.02em solid black; */
            font-size: 16px;
        }
        #suit_number{
            float: right;
            text-align: right;
            margin-right: 15px;
            font-weight: bolder;
            font-size: 18px;
            width: 100%;
        }

        #users{
            float: left;
            text-align: left;
            font-weight: bolder;
            margin-left: 15px;
            font-size: 18px;
            width: 100%;
            margin-bottom: 70px;
        }

        #sub_title{
            margin-top: 10px;
            text-align: center;
            font-weight: bolder;
            font-size: 20px;
            text-decoration: underline;
            width: 100%;
        }
        .p{
            text-align: justify;
            margin: 15px;
            font-size: 18px;
            line-height: 35px;
        }
        #date{
            float: left;
            text-align: left;
            margin-left: 15px;
            font-weight: bolder;
            font-size: 18px;
            width: 100%;
            margin-bottom: 40px;
        }
        #regsitrar{
            float: right;
            text-align: right;
            margin-right: 15px;
            font-weight: bolder;
            font-size: 18px;
            width: 100%;
            margin-bottom: 40px;
        }
        #summary{
            float: left;
            text-align: left;
            /* font-weight: bolder; */
            margin-left: 15px;
            font-size: 18px;
            width: 100%;

        }
        img{
            /* margin-top:5%; */
            width: 75px;
            height: 75px;
        }
        #plaintiff_counsel{
            /* float: left; */
            text-align: left;
            margin-left: 15px;
            font-weight: bolder;
            font-size: 18px;
            width: 100%;
            line-height: 25px;
        }

        #defedant_counsel{
            /* float: right; */
            text-align: left;
            margin-left: 15px;
            font-weight: bolder;
            font-size: 18px;
            width: 100%;
            line-height: 25px;

        }
    </style>
</head>
<body> 
    <div id="body" align="center">
        <div id="image">
            <img src="{{asset('coat_of_arms.png')}}" />
        </div>
        <br/>
        <div id="title">
            <h2>IN THE {{strtoupper(str_replace("-", " ", $id->court_name->type))}} </h2>
            <h2>HOLDEN AT  {{strtoupper(str_replace("-", " ", $id->court_name->town))}}, {{strtoupper(str_replace("-", " ", $id->court_name->state))}}</h2>
        </div>
        
        <div id="suit_number">
            CASE NO: {{$id->court_file_no}}
        </div>
        <br/>
        <div id="users">
            BETWEEN <br/>
            <br/>

            <small>PLAINTIFFS</small><br/>
            <span style="float: left; text-align:left">
                @php
                foreach(explode(",",$id->plaintiffs) as $key => $plaintiff)
                {
                    print_r(($key+1).". ".ucwords($plaintiff)."<br/>"); 
                }
            @endphp
            </span>
            
            <br/>
            <br/>
            <br/>
    
            AND 
            <br/>
            <br/>

            <small>DEFENDANT</small><br/>
    
            <span style="float: left; text-align:left">
                @php
                foreach(explode(",",$id->defendants) as $key => $defendant)
                {
                    print_r(($key+1).". ".ucwords($defendant)."<br/>"); 
                }
                @endphp 
            </span>
        </div>
       
        <div id="sub_title"> 
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            {{ strtoupper($id->title_of_notice)}} 
        </div>
        <p class="p">
            <b>TAKE NOTE</b> that this Honourable court has summoned you on {{ \Carbon\Carbon::createFromTimeStamp(strtotime($id->date_of_appearance))->format('jS')}} day of {{ \Carbon\Carbon::createFromTimeStamp(strtotime($id->date_of_appearance))->format('F')}} {{ \Carbon\Carbon::createFromTimeStamp(strtotime($id->date_of_appearance))->format('Y') }} at {{ \Carbon\Carbon::createFromTimeStamp(strtotime($id->date_of_appearance))->format('h')}}' Oclock in the forenoon or soon thereafter as the Applicant's 
            Counsel may be heard praying the court for the following: <br/>
            @php
            foreach(explode(",",$id->description) as $key => $desc)
            {
                print_r(($key+1).". ".ucfirst($desc)."<br/>"); 
            }
        @endphp 

            
        </p>
       <div id="date">

        <b>DATE:</b> {{ \Carbon\Carbon::parse(strtotime($id->update_at))->format('jS')}} day of {{ \Carbon\Carbon::parse(strtotime($id->update_at))->format('F')}} {{ \Carbon\Carbon::parse(strtotime($id->update_at))->format('Y') }}

       </div>
        <br/>

       <div id="regsitrar">
        ___________________<br/>
        {{  ucwords($id->registrar->first_name)}}  {{  ucwords($id->registrar->last_name)}}
       </div>

        <br/>

        <div id="plaintiff_counsel">
            COUNSEL TO PLAINTIFF<br/>
            @php
            foreach(explode(",",$id->plaintiffs_counsel) as $key => $counsel)
            {
                print_r(($key+1).". ".ucwords($counsel)."<br/>"); 
            }
            @endphp 
            {{ strtoupper($id->plaintiffs_counsel_chanber) }}
        </div>
            <br/>
            <br/>
            <div id="defedant_counsel">
                    COUNSEL TO DEFENDANT<br/>
                @php
                foreach(explode(",",$id->defendants_counsel) as $key => $counsel)
                {
                    print_r(($key+1).". ".ucwords($counsel)."<br/>"); 
                }
                @endphp 
                {{ strtoupper($id->defendants_counsel_chanber) }}
            </div>
 
            <h3>SUMMARY OF COURT HEARING(S)</h3>
            <div id="summary">
                @foreach ($id->summary as $item)
                    <b> DATE: {{ \Carbon\Carbon::parse(strtotime($item->created_at))->format('jS')}} day of {{ \Carbon\Carbon::parse(strtotime($item->created_at))->format('F')}} {{ \Carbon\Carbon::parse(strtotime($item->created_at))->format('Y') }}</b>
                    <br/>
                    <b> PRESIDING JUDGE: {{ ucwords($id->judge->last_name)}} {{ ucwords($id->judge->first_name)}}</b> 
                    <br/>
                    <p class="p">{{ ucfirst($item->description)}}</p>
                @endforeach
                <br/>

            </div>
    </div>
</body>
</html>