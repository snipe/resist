<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>

    </head>
    <body>
        <div class="col-md-12">
            <div class="content">
                <h1 class="text-center">resist.red </h1>
                <table class="table table-striped">
                    <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Congress
                    </th>
                    <th>
                        State
                    </th>
                    <th>
                        Party
                    </th>
                    <th>
                        Twitter
                    </th>
                    <th>
                        Current Term Ends
                    </th>
                    <th>
                        Next Term Ends
                    </th>
                    <th>
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
    </body>
</html>
