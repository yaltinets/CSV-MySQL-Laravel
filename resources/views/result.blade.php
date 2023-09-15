<!DOCTPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Result</title>
    <style>
        .table {
            border: 1px solid #eee;
            table-layout: fixed;
            width: 100%;
            margin-bottom: 20px;
        }

        .table th {
            font-weight: bold;
            padding: 5px;
            background: #efefef;
            border: 1px solid #dddddd;
        }

        .table td {
            padding: 5px 10px;
            border: 1px solid #eee;
            text-align: left;
        }

        .table tbody tr:nth-child(odd) {
            background: #fff;
        }

        .table tbody tr:nth-child(even) {
            background: #F7F7F7;
        }
    </style>
</head>
<body>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Код</th>
        <th>Наименование</th>
        <th>Уровень1</th>
        <th>Уровень2</th>
        <th>Уровень3</th>
        <th>Цена</th>
        <th>ЦенаСП</th>
        <th>Количество</th>
        <th>Поля свойств</th>
        <th>Совместные покупки</th>
        <th>Единица измерения</th>
        <th>Картинка</th>
        <th>Выводить на главной</th>
        <th>Описание</th>
    </tr>
    @foreach ($showData as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->code }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->lvl1 }}</td>
            <td>{{ $data->lvl2 }}</td>
            <td>{{ $data->lvl3 }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $data->price_sp }}</td>
            <td>{{ $data->total }}</td>
            <td>{{ $data->field_property }}</td>
            <td>{{ $data->joint_purchase }}</td>
            <td>{{ $data->unit }}</td>
            <td>{{ $data->picture }}</td>
            <td>{{ $data->main_view }}</td>
            <td>{{ $data->description }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
