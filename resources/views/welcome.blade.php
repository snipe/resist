<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Congress, US Congress, US House of Representatives, US Senate, legislation, committees, committee chair, representative contacts">
        <meta name="description" content="Look up your local representative in Congress.">

        <meta property="og:url"                content="https://resist.red" />
        <meta property="og:type"               content="website" />
        <meta property="og:title"              content="Resist.Red" />
        <meta property="og:description"        content="Look up your local representative in Congress and see their committee memberships." />
        <meta property="og:image"              content="https://resist.red/img/congress.jpg" />



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




        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css">

        <script src="https://use.fontawesome.com/266be36395.js"></script>


    </head>
    <body>


    <!-- Page Content -->
    <div class="container">

        <hr>

        <!-- First Featurette -->
        <div class="featurette" id="about">
            <h2 class="featurette-heading">Resist
                <span class="text-muted">Red</span>
            </h2>
            <p class="lead">Find the contact information for your local congress members and let them know what you think. Remember, they work for you.</p>
        </div>

        <hr>

        <table id="table" class="table table-striped"
               data-advanced-search="true"
                data-search="true"
               >
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
                Phone
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
                        @if ($rep->district!='At Lrg')
                        {{ $rep->district }}
                        @endif
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
                        <a href="tel:{{ $rep->phone }}">{{ $rep->phone }}</a>
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



        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Made with <i class="fa fa-heart text-danger"></i> and a deep commitment to the constitution and country by <a href="http://twitter.com/snipeyhead">@snipeyhead</a>. <a href="https://docs.google.com/spreadsheets/u/1/d/1gFXRkIsX0dQw7H1L-FVvf7Z6us9N7_xBltPLyAPbhg0/htmlview">Initial data</a> provided by <a href="https://twitter.com/robynburlingam1">@robynburlingam1</a>. Fork this project <a href="https://github.com/snipe/resist">here</a>. API coming soon. Corrections should be sent to <a href="mailto:resist@resist.red">resist@resist.red</a>.</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->



        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>


        <!-- Latest compiled and minified JavaScript -->

        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
        <script src="{{ asset('js/bootstrap-table-toolbar.js') }}"></script>
        <script src="{{ asset('js/bootstrap-table-export.js') }}"></script>
        <script src="//rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
        <script src="{{ asset('js/export/FileSaver.min.js') }}"></script>
        <script src="{{ asset('js/export/jspdf.plugin.autotable.js') }}"></script>
        <script src="{{ asset('js/export/jquery.base64.js') }}"></script>

        <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>

        <script>

            $('#table').bootstrapTable({
                classes: 'table table-responsive table-no-bordered',
                undefinedText: '',
                iconsPrefix: 'fa',
                showRefresh: false,
                search: true,
                pageSize: 100,
                pagination: true,
                sidePagination: 'client',
                sortable: true,
                cookie: true,
                cookieExpire: '2y',
                advancedSearch: true,
                mobileResponsive: true,
                showExport: true,
                showColumns: true,
                trimOnSearch: false,
                exportDataType: 'all',
                exportTypes: ['csv', 'excel', 'doc', 'txt','json', 'xml', 'pdf'],
                exportOptions: {
                    fileName: 'congress-' + (new Date()).toISOString().slice(0,10),
                    worksheetName: "Congress Members Export",
                    jspdf: {
                        autotable: {
                            styles: {
                                rowHeight: 20,
                                fontSize: 10,
                                overflow: 'linebreak',
                            },
                            headerStyles: {fillColor: 255, textColor: 0},
                        }
                    }
                },
                maintainSelected: true,
                paginationFirstText: "First",
                paginationLastText: "Last",
                paginationPreText: "Previous",
                paginationNextText: "Next",
                formatLoadingMessage: function () {
                    return '<h4><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Loading... please wait.... </h4>';
                },
                pageList: ['100','150','200','500','1000'],
                icons: {
                    paginationSwitchDown: 'fa-caret-square-o-down',
                    paginationSwitchUp: 'fa-caret-square-o-up',
                    columns: 'fa-columns',
                    export: 'fa-download',
                    sort: 'fa fa-sort-amount-desc',
                    plus: 'fa fa-plus',
                    minus: 'fa fa-minus',
                    refresh: 'fa-refresh'
                },


            });

            var $table = $('#table');
            $(function () {
                $('#toolbar').find('select').change(function () {
                    $table.bootstrapTable('destroy').bootstrapTable({
                        exportDataType: $(this).val()
                    });
                });
            })

        </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-73360507-2', 'auto');
        ga('send', 'pageview');

    </script>
    </body>
</html>
