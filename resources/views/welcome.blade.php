<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resist.Red</title>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/json2/20140204/json2.min.js"></script>
        <![endif]-->

        <!-- Fonts -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



        <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css">


    </head>
    <body>
        <div class="col-md-12">
            <div class="content">
                <h1 class="text-center">resist.red </h1>
                <table class="table table-striped"
                       data-toggle="table"
                       data-search="true"
                       data-show-toggle="true"
                       data-show-columns="true"
                       data-show-export="true"
                       data-pagination="true"
                       data-page-list="[100, ALL]"
                       data-page-size="100"
                       data-show-footer="false">
                    <thead>
                    <th data-field="name" data-sortable="true">
                        Name
                    </th>
                    <th data-sortable="true">
                        Chamber
                    </th>
                    <th data-sortable="true">
                        State
                    </th>
                    <th data-sortable="true">
                        District
                    </th>
                    <th data-sortable="true">
                        Party
                    </th>
                    <th data-sortable="true">
                        Twitter
                    </th>
                    <th data-sortable="true">
                        Term Ends
                    </th>
                    <th data-sortable="true">
                        Next Term Ends
                    </th>
                    <th data-sortable="true">
                        Committees
                    </th>
                    </thead>
               @foreach($reps as $rep)
                   <tr>
                       <td>{{ $rep->firstname }}
                   {{ $rep->lastname }}</td>
                       <td>
                           {{ $rep->congress }}
                       </td>

                       <td>
                           {{ $rep->rep_state }}
                       </td>

                       <td data-visible="false">
                           {{ $rep->district }}
                       </td>


                       <td>
                           @if ($rep->party=='R')
                               <span class="label label-danger">{{ $rep->party }}</span>
                           @elseif ($rep->party=='D')
                               <span class="label label-primary">{{ $rep->party }}</span>
                           @else
                               <span class="label label-default">{{ $rep->party }}</span>
                           @endif
                       </td>
                       <td>

                           @foreach ($rep->getTwitterLinks() as $index => $twitter_handle)
                               <a href="https://twitter.com/intent/user/?screen_name={{ $twitter_handle }}">{{ '@'.$twitter_handle }}</a><br>
                           @endforeach

                       </td>
                       <td>
                           {{ $rep->current_term_ends }}
                       </td>
                       <td>
                           {{ $rep->next_term_ends }}
                       </td>
                       <td>
                           @foreach ($rep->committees as $committee)
                               @if ($committee->pivot->membership_type=='C')
                                   <span class="label label-danger">Chairman {{ $committee->name }}</span>
                               @elseif ($committee->pivot->membership_type=='CE')
                                   <span class="label label-warning">{{ $committee->name }}</span>
                               @elseif ($committee->pivot->membership_type=='VC')
                                   <span class="label label-primary">{{ $committee->name }}</span>
                               @else
                                    <span class="label label-default">{{ $committee->name }}</span>
                               @endif

                           @endforeach
                       </td>
                   </tr>

               @endforeach
                </table>
            </div>
        </div>

        <script
                src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>

    </body>
</html>
