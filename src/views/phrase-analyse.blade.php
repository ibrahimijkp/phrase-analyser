<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phrase Analyser</title>
    <style>
        html {
            font-family: 'helvetica neue', helvetica, arial, sans-serif;
        }

        th {
            letter-spacing: 2px;
        }

        td {
            letter-spacing: 1px;
        }

        tbody td {
            text-align: center;
        }

        tfoot th {
            text-align: right;
        }

        table.center {
    margin-left:auto;
    margin-right:auto;
  }

    </style>
</head>

<body style="text-align:center;">
    <table class="center" border=1>
        <caption>Phrase Analyser ({{$phrase}})</caption>
        <thead>
            <tr>
                <th>Character</th>
                <th>Count</th>
                <th>Before</th>
                <th>After</th>
                <th>Max Distance Chars</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phraseAnalysis as $analysis)
                <tr>
                    <td>{{ $analysis['char'] }}</td>
                    <td>{{ $analysis['count'] }}</td>
                    <td>{{ implode(', ', $analysis['before']) }}</td>
                    <td>{{ implode(', ', $analysis['after']) }}</td>
                    <td>{{ $analysis['max_distance'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
